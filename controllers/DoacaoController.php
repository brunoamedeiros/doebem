<?php

namespace app\controllers;

use app\models\InstituicaoRedeSocial;
use app\models\Item;
use app\models\Resultado;
use app\models\Contribuicao;
use Yii;
use app\models\Doacao;
use app\models\Instituicao;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DoacaoController implements the CRUD actions for Doacao model.
 */
class DoacaoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Doacao models.
     * @return mixed
     */
    public function actionIndex()
    {
        $instituicao = Yii::$app->user->identity;

        $dataProvider = new ActiveDataProvider([
            'query' => Doacao::find()->where(['id_instituicao' => $instituicao->getId()]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'instituicao' => $instituicao
        ]);
    }

    /**
     * Displays a single Doacao model.
     * @param integer $id_doacao
     * @param integer $id_instituicao
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
      $doacao = $this->findModel($id);
      $instituicao = Yii::$app->user->identity;
      $contribuicoes = $doacao->getContribuicoes()->all();
      $itens = $doacao->getItems()->all();
      $resultados = $doacao->getResultados()->all();

      $total = 0;
      foreach ($itens as $item) {
        $total += $item->valor * $item->quantidade;
      }

      $totalArrecadado = 0;
      foreach ($contribuicoes as $contribuicao) {
        $totalArrecadado += $contribuicao->valor;
      }

      $progress = round(($totalArrecadado / $total) * 100);

      $total = number_format($total, 2);

      return $this->render('view', [
          'model' => $doacao,
          'instituicaoModel' => $instituicao,
          'contribuicoes' => $contribuicoes,
          'total' => $total,
          'progress' => $progress,
          'itens' => $itens,
          'totalArrecadado' => $totalArrecadado,
          'resultados' => $resultados
      ]);
    }

    /**
     * Creates a new Doacao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Doacao();
        $model->_items = [new Item()];
        $instituicao = Yii::$app->user->identity;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {        
            $model->id_instituicao = $instituicao->getId();
            $model->save();

            $itens = Yii::$app->request->post()['Item'];
            
            foreach($itens as $item) {
                $novoItem = new Item();

                $novoItem->id_doacao = $model->id_doacao;
                $novoItem->descricao = $item['descricao'];
                $novoItem->quantidade = $item['quantidade'];
                $novoItem->valor = $item['valor'];

                $novoItem->save();
            }

            return $this->redirect(['view', 'id' => $model->id_doacao]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Doacao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_doacao
     * @param integer $id_instituicao
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_doacao, $id_instituicao)
    {
        $model = $this->findModel($id_doacao, $id_instituicao);
        $model->_items = $model->items;

        $post = Yii::$app->request->post();
        
        if ($model->load($post) && $model->validate()) {

            if(isset($post['Item'])){
                $itens = $post['Item'];
                
                if(sizeof($itens) > 0) {
                    foreach($itens as $item) {
                        $novoItem = Item::findOne($item["id_item"]);
                        
                        $novoItem->descricao = $item['descricao'];
                        $novoItem->quantidade = $item['quantidade'];
                        $novoItem->valor = $item['valor'];
        
                        $novoItem->save();
                    };
                };
            };            
            
            if(isset( $post['deletar'])){
                $itensDeletar = $post['deletar'];
                
                if(sizeof($itensDeletar) > 0) {
                    foreach($itensDeletar as $item) {
                        Item::findOne($item)->delete();
                    };
                };
            };

            $model->save();

            return $this->redirect(['index', 'id' => $model->id_doacao]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Doacao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_doacao
     * @param integer $id_instituicao
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_doacao)
    {
        $this->findModel($id_doacao)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Doacao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_doacao
     * @param integer $id_instituicao
     * @return Doacao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Doacao::findOne(['id_doacao' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

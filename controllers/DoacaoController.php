<?php

namespace app\controllers;

use app\models\InstituicaoRedeSocial;
use app\models\Item;


use app\models\Resultado;
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
            'query' => Doacao::find(),
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
      $instituicao = $doacao->getInstituicao()->one();

      return $this->render('view', [
          'model' => $doacao,
          'instituicaoModel' => $instituicao
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_doacao' => $model->id_doacao, 'id_instituicao' => $model->id_instituicao]);
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
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

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

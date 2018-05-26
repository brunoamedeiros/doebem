<?php

namespace app\controllers;

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
        $dataProvider = new ActiveDataProvider([
            'query' => Doacao::find(),
        ]);


        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Doacao model.
     * @param integer $id_doacao
     * @param integer $id_instituicao
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_doacao, $id_instituicao)
    {
        $instituicao = new Instituicao();

        $instituicaoModel = $instituicao->findOne($id_instituicao);

        return $this->render('view', [
            'model' => $this->findModel($id_doacao, $id_instituicao),
            'instituicaoModel' => $instituicaoModel
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
        $instituicao = new Instituicao();
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->id_instituicao = $instituicao->findOne(1)->id_instituicao;
            $model->data_publicacao = date('d/m/y');
            $model->save();

            return $this->redirect(['view', 'id_doacao' => $model->id_doacao, 'id_instituicao' => $model->id_instituicao]);
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
    public function actionDelete($id_doacao, $id_instituicao)
    {
        $this->findModel($id_doacao, $id_instituicao)->delete();

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
    protected function findModel($id_doacao, $id_instituicao)
    {
        if (($model = Doacao::findOne(['id_doacao' => $id_doacao, 'id_instituicao' => $id_instituicao])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

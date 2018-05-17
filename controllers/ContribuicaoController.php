<?php

namespace app\controllers;

use Yii;
use app\models\Contribuicao;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ContribuicaoController implements the CRUD actions for Contribuicao model.
 */
class ContribuicaoController extends Controller
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
     * Lists all Contribuicao models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Contribuicao::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Contribuicao model.
     * @param integer $id_contribuicao
     * @param integer $id_contribuinte
     * @param integer $id_doacao
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_contribuicao, $id_contribuinte, $id_doacao)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_contribuicao, $id_contribuinte, $id_doacao),
        ]);
    }

    /**
     * Creates a new Contribuicao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Contribuicao();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_contribuicao' => $model->id_contribuicao, 'id_contribuinte' => $model->id_contribuinte, 'id_doacao' => $model->id_doacao]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Contribuicao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_contribuicao
     * @param integer $id_contribuinte
     * @param integer $id_doacao
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_contribuicao, $id_contribuinte, $id_doacao)
    {
        $model = $this->findModel($id_contribuicao, $id_contribuinte, $id_doacao);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_contribuicao' => $model->id_contribuicao, 'id_contribuinte' => $model->id_contribuinte, 'id_doacao' => $model->id_doacao]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Contribuicao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_contribuicao
     * @param integer $id_contribuinte
     * @param integer $id_doacao
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_contribuicao, $id_contribuinte, $id_doacao)
    {
        $this->findModel($id_contribuicao, $id_contribuinte, $id_doacao)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Contribuicao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_contribuicao
     * @param integer $id_contribuinte
     * @param integer $id_doacao
     * @return Contribuicao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_contribuicao, $id_contribuinte, $id_doacao)
    {
        if (($model = Contribuicao::findOne(['id_contribuicao' => $id_contribuicao, 'id_contribuinte' => $id_contribuinte, 'id_doacao' => $id_doacao])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace app\controllers;

use Yii;
use app\models\Resultado;
use app\models\Doacao;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ResultadoController implements the CRUD actions for Resultado model.
 */
class ResultadoController extends Controller
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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['?', '@']
                    ],
                    [
                        'actions' => ['index', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
            ],
        ];
    }

    /**
     * Lists all Resultado models.
     * @return mixed
     */
    public function actionIndex($id_doacao)
    {

        $doacao = Doacao::find()->where(['id_doacao' => $id_doacao])->one();
        $instituicao = Yii::$app->user->identity;

        $dataProvider = new ActiveDataProvider([
            'query' => Resultado::find()->where(['id_doacao' => $id_doacao]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'doacao' => $doacao,
            'instituicao' => $instituicao
        ]);
    }

    /**
     * Displays a single Resultado model.
     * @param integer $id_resultado
     * @param integer $id_doacao
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_resultado, $id_doacao)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_resultado, $id_doacao),
        ]);
    }

    /**
     * Creates a new Resultado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_doacao)
    {
        $model = new Resultado();
        $doacao = Doacao::find()->where(['id_doacao' => $id_doacao])->one();
        $model->scenario = 'insert-photo-upload';
        $model->id_doacao = $doacao->id_doacao;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

          if($model->save()) {
            return $this->redirect(['index', 'id_doacao' => $model->id_doacao]);
          }
        }

        return $this->render('create', [
            'model' => $model,
            'doacao' => $doacao
        ]);
    }

    /**
     * Updates an existing Resultado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_resultado
     * @param integer $id_doacao
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_resultado, $id_doacao)
    {
        $model = $this->findModel($id_resultado, $id_doacao);
        $doacao = $model->getDoacao()->one();
        $model->scenario = 'update-photo-upload';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          return $this->redirect(['index', 'id_doacao' => $model->id_doacao]);
        }

        return $this->render('update', [
            'model' => $model,
            'doacao' => $doacao
        ]);
    }

    /**
     * Deletes an existing Resultado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_resultado
     * @param integer $id_doacao
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_resultado, $id_doacao)
    {
        $this->findModel($id_resultado, $id_doacao)->delete();

        return $this->redirect(['index', 'id_doacao' => $id_doacao]);
    }

    /**
     * Finds the Resultado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_resultado
     * @param integer $id_doacao
     * @return Resultado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_resultado, $id_doacao)
    {
        if (($model = Resultado::findOne(['id_resultado' => $id_resultado, 'id_doacao' => $id_doacao])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

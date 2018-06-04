<?php

namespace app\controllers;

use Yii;
use app\models\InstituicaoRedeSocial;
use app\models\Instituicao;
use app\models\Doacao;
use app\models\InstituicaoForm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use PagSeguro\Configuration\Configure;
use PagSeguro\Library;

Library::initialize();
Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");

Configure::setCharset('UTF-8');// UTF-8 or ISO-8859-1
Configure::setLog(true, '/logpath/logFilename.log');

/**
 * InstituicaoController implements the CRUD actions for Instituicao model.
 */
class InstituicaoController extends Controller
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
     * Lists all Instituicao models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Instituicao::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Instituicao model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $instituicao = $this->findModel($id);
        $projetos = Doacao::find()->where(['id_instituicao' => $id])->All();
        $redesSociais = InstituicaoRedeSocial::find()->where(['id_instituicao' => $id])->All();

        Configure::setEnvironment('sandbox');//production or sandbox
        Configure::setAccountCredentials(
            $instituicao->email,
            $instituicao->vinculo_api
        );

        return $this->render('view', [
            'model' => $instituicao,
            'projetosModel' => $projetos,
            'redesSociais' => $redesSociais
        ]);
    }

    /**
     * Creates a new Instituicao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InstituicaoForm();
        $model->instituicao = new Instituicao;
        $model->instituicao->loadDefaultValues();
        $post = Yii::$app->request->post();
        $model->setAttributes($post);

        if ($post && $model->save()) {
          return $this->redirect(['index', 'id' => $model->instituicao->id_instituicao]);
        }

        return $this->render('create', ['model' => $model]);
    }

    /**
     * Updates an existing Instituicao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
      $model = new InstituicaoForm();
      $model->instituicao = $this->findModel($id);
      $model->setAttributes(Yii::$app->request->post());

      if (Yii::$app->request->post() && $model->save()) {
        return $this->redirect(['index', 'id' => $model->instituicao->id_instituicao]);
      }

      return $this->render('update', ['model' => $model]);
    }

    /**
     * Deletes an existing Instituicao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $socials = $this->findModel($id)->getInstituicaoRedeSocial();

        foreach ($socials->all() as $social) {
          $social->delete();
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionVisualizar($id) {
        $instituicao = Instituicao::findOne($id);

        return $this->render('visualizar', ['instituicao' => $instituicao]);
    }

    /**
     * Finds the Instituicao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Instituicao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Instituicao::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace app\controllers;

use app\models\InstituicaoRedeSocial;
use Yii;
use app\models\Instituicao;
use app\models\Doacao;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        $projetos = Doacao::find()->where(['id_instituicao' => $id])->All();
        $redesSociais = InstituicaoRedeSocial::find()->where(['id_instituicao' => $id])->All();

        return $this->render('view', [
            'model' => $this->findModel($id),
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
        $model = new Instituicao();
        $post = Yii::$app->request->post();

        if ($model->load($post) && $model->validate()) {

            $login = strtolower(str_replace(" ", "_", $model->nome));
            $model->login = $login;
            $model->senha = Yii::$app->getSecurity()->generateRandomString(8);

            $model->save();

            $redesSociais = array_combine($post['redes-socias'], $post['value-_redes-sociais']);

            foreach ($redesSociais as $key => $value) {
              $sociais = new InstituicaoRedeSocial();

              $sociais->id_instituicao = $model->id_instituicao;
              $sociais->nome = $key;
              $sociais->url = $value;

              $sociais->save();
            }

            return $this->redirect(['index', 'id' => $model->id_instituicao]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
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
        $model = $this->findModel($id);
        $post = Yii::$app->request->post();

        if ($model->load($post) && $model->validate()) {

            $redesSociais = array_combine($post['redes-socias'], $post['value-_redes-sociais']);

            foreach ($redesSociais as $key => $value) {
              $sociais = new InstituicaoRedeSocial();
              $sociais->load($post);

              $sociais->id_instituicao = $model->id_instituicao;
              $sociais->nome = $key;
              $sociais->url = $value;

              $sociais->save();
            }

            if($model->save()) {
              return $this->redirect(['index', 'id' => $model->id_instituicao]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
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

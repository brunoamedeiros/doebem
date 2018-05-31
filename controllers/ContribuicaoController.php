<?php

namespace app\controllers;

use Yii;
use app\models\Contribuinte;
use app\models\Contribuicao;
use app\models\Doacao;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use PagSeguro\Domains\Requests\Payment;
use PagSeguro\Configuration\Configure;
use PagSeguro\Services\Session;
use PagSeguro\Library;

Library::initialize();
Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");

Configure::setCharset('UTF-8');// UTF-8 or ISO-8859-1
Configure::setLog(true, '../logs/logFilename.log');
Configure::setEnvironment('sandbox');//production or sandbox

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
    public function actionCreate($id_doacao)
    {

      $post = Yii::$app->request->post();

      $contribuicao = new Contribuicao();
      $contribuinte = new Contribuinte();
      $doacao = Doacao::find()->where(['id_doacao' => $id_doacao])->one();
      $instituicao = $doacao->getInstituicao()->one();

      if ($contribuicao->load($post) && $contribuinte->load($post) && $contribuicao->validate() && $contribuinte->validate()) {
        $contribuinte->save();

        $contribuicao->id_doacao = $id_doacao;
        $contribuicao->id_contribuinte = $contribuinte->id_contribuinte;
        $contribuicao->save();

        Configure::setAccountCredentials(
            $instituicao->email,
            $instituicao->vinculo_api
        );

        $payment = new Payment();

        $payment->addItems()->withParameters(
            $contribuicao->id_contribuicao,
            'Doação para o projeto: '. $doacao->titulo,
            1,
            $contribuicao->valor
        );

        $payment->setCurrency("BRL");

        $payment->setSender()->setName($contribuinte->nome);
        $payment->setSender()->setEmail($contribuinte->email);

        $phone = preg_replace("~[^0-9]~", "", $contribuinte->telefone);
        $payment->setSender()->setPhone()->withParameters(
            substr($phone,0,2),
            substr($phone,2,9)
        );

        $payment->setSender()->setDocument()->withParameters(
            'CPF',
            $contribuinte->cpf
        );

        $payment->setShipping()->setAddressRequired()->withParameters('false');

        try {

          $onlyCheckoutCode = true;
          $result = $payment->register(
              Configure::getAccountCredentials(),
              $onlyCheckoutCode
          );

          Yii::$app->session->set('token', $result->getCode());

        } catch (Exception $e) {
          die($e->getMessage());
        }
      }

        return $this->render('create', [
            'contribuicao' => $contribuicao,
            'contribuinte' => $contribuinte,
            'doacao' => $doacao,
            'instituicao' => $instituicao
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

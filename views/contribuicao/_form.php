<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Contribuicao */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="row">
	<div class="form-contribuicao col-12">
		<div class="row">
			<div class="col-sm-6">
				<?php $form = ActiveForm::begin([
					'options' => [
						'class' => 'needs-validation',
						'novalidate' => 'novalidate'
					],
					'fieldConfig' => [
						'template' => "{label}{input}{error}",
						'options' => [
							'class' => ''
						],
					],
				]);

				?>

				<div class="form-group sugestao-pagamento">
					<button type="button" class="btn rounded-50 col-sm-3 col-5" data-valor="10">R$ 10.00</button>
					<button type="button" class="btn rounded-50 col-sm-3 col-5" data-valor="20">R$ 20.00</button>
					<button type="button" class="btn rounded-50 col-sm-3 col-5" data-valor="30">R$ 30.00</button>
					<button type="button" class="btn rounded-50 col-sm-3 col-5" data-valor="40">R$ 40.00</button>
					<button type="button" class="btn rounded-50 col-sm-3 col-5" data-valor="50">R$ 50.00</button>
				</div>

				<div class="form-group">
					<?= $form->field($contribuinte, 'nome')->textInput() ?>
				</div>

				<div class="form-group">
					<?= $form->field($contribuinte, 'email')->textInput() ?>
				</div>

				<div class="form-group">
					<?= $form->field($contribuinte, 'cpf')->textInput(['class' => 'form-control cpf']) ?>
				</div>

				<div class="form-group">
					<?= $form->field($contribuinte, 'telefone')->textInput(['class' => 'form-control fone']) ?>
				</div>

				<div class="form-group">
					<?= $form->field($contribuicao, 'valor')->textInput(['class' => 'form-control real']) ?>
				</div>

				<div class="form-group">
	        <?= $form->field($contribuinte, 'anonimo')->checkbox() ?>
				</div>

				<div class="control d-flex">
					<?php if(!empty(Yii::$app->session->get('token'))): ?>
						<script>PagSeguroLightbox('<?= Yii::$app->session->get('token') ?>');</script>
					<?php
							Yii::$app->session->set('token', null);
						endif;
					?>
					<?= Html::submitButton('Contribuir', ['class' => 'btn btn-primary style-btn-primary rounded-50 center btn-lg float-right col-12 col-md-5 ml-auto']) ?>
				</div>
				<?php ActiveForm::end(); ?>
			</div>

			<div class="col-sm-6 d-none d-sm-block">
				<img src="<?= Yii::getAlias('@web') ?>/imagens/banner-contribuicao.png" alt="banner" class="float-right">
			</div>
		</div>
	</div>
</div>

<?php

	$this->registerCssFile("@web/css/contribuicao.css");

?>

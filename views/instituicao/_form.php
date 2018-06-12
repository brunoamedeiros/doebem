<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Instituicao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row margin-top-30">
	<div class="col-lg-12">
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

		<div class="row">
			<div class="form-group col-lg-5">
				<?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

				<div class="invalid-feedback">
					Por favor, insira o nome da instituição.
				</div>
			</div>

			<div class="form-group col-lg-4">
      			<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

				<div class="invalid-feedback">
					Por favor, insira o e-mail da instituição.
				</div>
			</div>

			<div class="form-group col-lg-3">
       			<?= $form->field($model, 'cnpj')->textInput(['maxlength' => 18,
		        'pattern' => '[0-9]{2}.[0-9]{3}.[0-9]{3}/[0-9]{4}-[0-9]{2}', 'class' => 'form-control cnpj']) ?>

				<div class="invalid-feedback">
					Por favor, insira o CNPJ.
				</div>
			</div>
		</div>

		<div class="row">
			<div class="form-group col-lg-5">
        		<?= $form->field($model, 'endereco')->textInput(['maxlength' => true]) ?>

				<div class="invalid-feedback">
					Por favor, insira o endereço.
				</div>
			</div>

			<div class="form-group col-lg-3">
        		<?= $form->field($model, 'bairro')->textInput(['maxlength' => true]) ?>

				<div class="invalid-feedback">
					Por favor, insira o bairro.
				</div>
			</div>

			<div class="form-group col-lg-2">
        		<?= $form->field($model, 'cep')->textInput(['maxlength' => 8,
		        'pattern' => '[0-9]{5}-[0-9]{3}', 'class' => 'form-control cep']) ?>

				<div class="invalid-feedback">
					Por favor, insira o CEP.
				</div>
			</div>

			<div class="form-group col-lg-2">
        		<?= $form->field($model, 'telefone')->textInput(['maxlength' => true,
		        'pattern' => '\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$', 'class' => 'form-control fone']) ?>

				<div class="invalid-feedback">
					Por favor, insira o telefone.
				</div>
			</div>
		</div>

		<div class="form-group">
      		<?= $form->field($model, 'descricao')->textarea(['rows' => 3, 'id' => 'mytextarea']) ?>

			<div class="invalid-feedback">
				Por favor, insira uma descrição.
			</div>
		</div>

		<div class="share">
			<div class="row">
				<div class="col-lg-4 margin-top-30">
					<div class="upload form-group col-lg-12 float-left">
            			<?= $form->field($model, 'file')->fileInput(['accept' => 'image/*', 'class' => 'custom-file-input']) ?>
					</div>
				</div>

				<div class="col-lg-4">
          			<?= $form->field($model, 'video')->textInput(['maxlength' => true, "placeholder" => "Apenas link do youtube"]) ?>
				</div>

				<div class="col-lg-4">
          			<?= $form->field($model, 'vinculo_api')->textInput(['maxlength' => true]) ?>

					<div class="invalid-feedback">
						Por favor, insira a chave de ativação do PagSeguro.
					</div>
				</div>
			</div>
		</div>

		<h3 class="style-text-secondary style-color-blue-03 mt-20 margin-top-30">
            Redes sociais
        </h3>

		<div class="form-group col-sm-6 redes-sociais p0 float-left">
			<div class="col-12">
				<?= $form->field($model, 'instagram')->textInput(['maxlength' => true, "placeholder" => "Apenas link do seu perfil"]) ?>
			</div>

			<div class="col-12">
				<?= $form->field($model, 'facebook')->textInput(['maxlength' => true, "placeholder" => "Aplenas o link do seu perfil"]) ?>
			</div>
		</div>

		<div class="form-group col-sm-6 redes-sociais p0 float-left">
			<div class="col-12">
				<?= $form->field($model, 'youtube')->textInput(['maxlength' => true, "placeholder" => "Aplenas o link do seu canal"]) ?>
			</div>

			<div class="col-12">
				<?= $form->field($model, 'twitter')->textInput(['maxlength' => true, "placeholder" => "Aplenas o link do seu perfil"]) ?>
			</div>
		</div>

		<div class="control button-submit clear-both">
			<?= Html::a('Cancelar', ['doacao/index'], ['class' => 'btn style-btn-line radius-5 mt-4 float-left']) ?>
			<?= Html::submitButton('Salvar', ['class' => 'btn btn-primary mt-4']) ?>
		</div>

		<?php ActiveForm::end(); ?>
	</div>
</div>

<?php
	$this->registerCssFile("@web/css/cadastrar-instituicao.css");
?>
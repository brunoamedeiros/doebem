<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\InstituicaoRedeSocial

/* @var $this yii\web\View */
/* @var $model app\models\Instituicao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row margin-top-30">
	<div class="col-lg-12">
		<?php $form = ActiveForm::begin([
			'enableClientValidation' => false,
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
				<?= $form->field($model->instituicao, 'nome')->textInput(['maxlength' => true]) ?>

				<div class="invalid-feedback">
					Por favor, insira o nome da instituição.
				</div>
			</div>

			<div class="form-group col-lg-4">
      			<?= $form->field($model->instituicao, 'email')->textInput(['maxlength' => true]) ?>

				<div class="invalid-feedback">
					Por favor, insira o e-mail da instituição.
				</div>
			</div>

			<div class="form-group col-lg-3">
       			<?= $form->field($model->instituicao, 'cnpj')->textInput(['maxlength' => 18,
		        'pattern' => '[0-9]{2}.[0-9]{3}.[0-9]{3}/[0-9]{4}-[0-9]{2}', 'class' => 'form-control cnpj']) ?>

				<div class="invalid-feedback">
					Por favor, insira o CNPJ.
				</div>
			</div>
		</div>

		<div class="row">
			<div class="form-group col-lg-5">
        		<?= $form->field($model->instituicao, 'endereco')->textInput(['maxlength' => true]) ?>

				<div class="invalid-feedback">
					Por favor, insira o endereço.
				</div>
			</div>

			<div class="form-group col-lg-3">
        		<?= $form->field($model->instituicao, 'bairro')->textInput(['maxlength' => true]) ?>

				<div class="invalid-feedback">
					Por favor, insira o bairro.
				</div>
			</div>

			<div class="form-group col-lg-2">
        		<?= $form->field($model->instituicao, 'cep')->textInput(['maxlength' => 8,
		        'pattern' => '[0-9]{5}-[0-9]{3}', 'class' => 'form-control cep']) ?>

				<div class="invalid-feedback">
					Por favor, insira o CEP.
				</div>
			</div>

			<div class="form-group col-lg-2">
        		<?= $form->field($model->instituicao, 'telefone')->textInput(['maxlength' => true,
		        'pattern' => '\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$', 'class' => 'form-control fone']) ?>

				<div class="invalid-feedback">
					Por favor, insira o telefone.
				</div>
			</div>
		</div>

		<div class="form-group">
      		<?= $form->field($model->instituicao, 'descricao')->textarea(['rows' => 3]) ?>

			<div class="invalid-feedback">
				Por favor, insira uma descrição.
			</div>
		</div>

		<div class="share">
			<div class="row">
				<div class="form-group col-sm-6 redes-sociais">
					<label for="redes">Rede sociais</label>

					<?php echo Html::a('Nova Rede Social', 'javascript:void(0);', [
              'id' => 'instituicao-new-socials-button',
              'class' => 'float-right btn btn-default btn-xs'
          ]); ?>

					<br>
					<div class="select-redes-sociais d-none">
						<?php
            // parcel table
            $sociais = new InstituicaoRedeSocial();
            $sociais->loadDefaultValues();

            echo $this->render('_form-instituicao-social', [
                'key' => '__id__',
                'form' => $form,
                'sociais' => $sociais,
            ]);
            ?>
					</div>

					<?php

            foreach ($model->sociais as $key => $_sociais) {
              echo $this->render('_form-instituicao-social', [
                  'key' => $_sociais->isNewRecord ? (strpos($key, 'new') !== false ? $key : 'new' . $key) : $_sociais->id_rede_social,
                  'form' => $form,
                  'sociais' => $_sociais,
              ]);
            }

            ob_start(); // output buffer the javascript to register later
					?>
					<script>

              // add parcel button
              var social_k = <?php echo isset($key) ? str_replace('new', '', $key) : 0; ?>;

              $('#instituicao-new-socials-button').on('click', function () {
                  social_k += 1;
                  $('.redes-sociais').append($('.select-redes-sociais').html().replace(/__id__/g, 'new' + social_k));
              });

              // remove parcel button
              $(document).on('click', '.instituicao-remove-socials-button', function () {
                  $(this).closest('.redes-sociais .social-block').remove();
              });

					</script>
          <?php $this->registerJs(str_replace(['<script>', '</script>'], '', ob_get_clean())); ?>
				</div>

				<div class="form-group col-lg-6">
					<div class="form-group col-lg-6 margin-top-20 float-left">
						<div class="input-group field-doacao-imagem_capa required">
				          <div class="custom-file">
				            <?= $form->field($model, 'file')->textInput(['type'=>'file', 'accept' => 'image/*', 'class' => 'custom-file-input'])->label('Imagem',['class'=>'custom-file-label']) ?>
				          </div>
				        </div>
					</div>

					<div class="col-5 float-left p0 d-none">
						<img src="" alt="Nenhuma foto adicionada" title="foto capa" class="img-thumbnail ">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
          			<?= $form->field($model->instituicao, 'video')->textInput(['maxlength' => true, "placeholder" => "Apenas link do youtube"]) ?>
				</div>

				<div class="col-lg-6">
          			<?= $form->field($model->instituicao, 'vinculo_api')->textInput(['maxlength' => true]) ?>

					<div class="invalid-feedback">
						Por favor, insira a chave de ativação do PagSeguro.
					</div>
				</div>
			</div>
		</div>

		<div class="control button-submit">
			<?= Html::a('Cancelar', ['index'], ['class' => 'btn style-btn-line radius-5 mt-4 float-left']) ?>
			<?= Html::submitButton('Salvar', ['class' => 'btn btn-primary mt-4']) ?>
		</div>

		<?php ActiveForm::end(); ?>
	</div>
</div>

<?php

	$this->registerCssFile("@web/css/cadastrar-instituicao.css");

?>

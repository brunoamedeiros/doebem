<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Resultado */
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
			<div class="form-group col-sm-12">
        <?= $form->field($model, 'descricao')->textarea(['rows' => 3]) ?>

				<div class="invalid-feedback">
					Por favor, insira uma descrição.
				</div>
			</div>
		</div>

		<div class="row">
			<div class="form-group col-sm-6">
				<?= $form->field($model, 'data')->textInput(['class' => 'form-control data', 'value' => date('d/m/Y')]) ?>
			</div>

			<div class="form-group col-lg-6">
				<div class="form-group col-lg-6 float-left">
          <?= $form->field($model, 'file')->fileInput(['accept' => 'image/*']) ?>
				</div>

				<div class="col-5 float-left p0 d-none">
					<img src="" alt="Nenhuma foto adicionada" title="foto capa" class="img-thumbnail ">
				</div>
			</div>
		</div>

		<div class="control button-submit">
      <?= Html::a('Cancelar', ['resultado/index', 'id_doacao' => $model->id_doacao], ['class' => 'btn style-btn-line radius-5 mt-4 float-left']) ?>
      <?= Html::submitButton('Salvar', ['class' => 'btn btn-primary mt-4']) ?>
		</div>

    <?php ActiveForm::end(); ?>
	</div>
</div>

<?php

$this->registerCssFile("@web/css/cadastrar-instituicao.css");

?>
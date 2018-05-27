<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Doacao */
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

            <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'imagem_perfil')->fileInput(['accept' => 'image/*']) ?>

            <?= $form->field($model, 'imagem_capa')->fileInput(['accept' => 'image/*']) ?>

            <?= $form->field($model, 'video')->textInput(['maxlength' => true]) ?>

            <div class="control button-submit">
                <?= Html::a('Cancelar', ['index'], ['class' => 'btn style-btn-line radius-5 mt-4 float-left']) ?>
                <?= Html::submitButton('Salvar', ['class' => 'btn btn-primary mt-4']) ?>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Contribuicao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contribuicao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_contribuinte')->textInput() ?>

    <?= $form->field($model, 'id_doacao')->textInput() ?>

    <?= $form->field($model, 'valor')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

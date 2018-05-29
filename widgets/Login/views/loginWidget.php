<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'layout' => 'horizontal',
    'options' => [
        'class' => 'form-inline logar',
    ],
    'fieldConfig' => [
        'template' => "{input}",
        'options' => [
            'class' => 'form-group'
        ]
    ],
]);

?>

  <div class="col-12 col-sm-5 pr-sm-2 p-0">
      <?= $form->field($modelLogin, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Login', 'class' => 'form-control col-12']) ?>
  </div>

  <div class="col-12 col-sm-5 pr-sm-2 p-0">
      <?= $form->field($modelLogin, 'password')->passwordInput(['placeholder' => 'Senha', 'class' => 'form-control col-12']) ?>
  </div>

<?= Html::submitButton('Entrar', ['class' => 'btn col-12 col-sm-2 btn-primary style-btn-primary animation-style', 'name' => 'login-button']) ?>

<?php ActiveForm::end(); ?>
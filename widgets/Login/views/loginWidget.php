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
        'template' => "{input}{error}",
        'options' => [
            'class' => 'form-group'
        ]
    ],
]);

?>

  <div class="mx-sm-0 mb-2">
      <?= $form->field($modelLogin, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Login']) ?>
  </div>

  <div class="mx-sm-2 mb-2">
      <?= $form->field($modelLogin, 'password')->passwordInput(['placeholder' => 'Senha']) ?>
  </div>

<?= Html::submitButton('Entrar', ['class' => 'btn btn-primary mb-2 style-btn-primary animation-style', 'name' => 'login-button']) ?>

<?php ActiveForm::end(); ?>
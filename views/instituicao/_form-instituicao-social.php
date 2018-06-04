<?php
use app\models\InstituicaoRedeSocial;
use yii\helpers\Html;
?>

<div class="social-block">
  <?= $form->field($sociais, 'nome')->dropdownList([
      'facebook' => 'Facebook',
      'instagram' => 'Instagram',
      'twitter' => 'Twitter',
      'youtube' => 'Youtube'
  ], ['prompt'=>'Nenhuma',
		  'id' => "Social_{$key}_nome",
      'name' => "Social[$key][nome]",
		  'class'=>'col-lg-3 custom-select form-control clear-both float-left'])->label(false) ?>

  <div class="form-group col-lg-8 float-left">
    <?= $form->field($sociais, 'url')->textInput([
        'id' => "Social_{$key}_url",
        'name' => "Social[$key][url]",
    ])->label(false); ?>
  </div>

<?= Html::a('<i class="material-icons">remove</i>', 'javascript:void(0);', [
    'class' => 'instituicao-remove-socials-button btn col-sm-0.2 form-group col-lg-1 ',
]) ?>
</div>

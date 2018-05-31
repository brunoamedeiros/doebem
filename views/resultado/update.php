<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Resultado */
/* @var $doacao app\models\Doacao */

$this->title = 'Editar Resultado: ' . $doacao->titulo;
?>
<main class="col-lg-10 content mx-auto">
	<div class="row align-items-center">
		<div class="col-sm-11">
			<h3 class="style-text-primary style-color-blue-02">
        <?= Html::encode($this->title) ?>
			</h3>
		</div>
	</div>

  <?= $this->render('_form', [
      'model' => $model,
      'doacao' => $doacao
  ]) ?>

</main>

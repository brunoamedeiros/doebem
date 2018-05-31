<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Contribuicao */

$this->title = 'Contribuir para a instituição ' . $instituicao->nome;
$this->params['breadcrumbs'][] = ['label' => 'Contribuicaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<main class="container p-3">

	<div class="row align-items-center mb-4">

		<div class="col-lg-1">
			<a class="btn btn-primary"
			   href="<?= \yii\helpers\Url::to(['doacao/view', 'id' => $doacao->id_doacao]) ?>">
				Voltar
			</a>
		</div>

		<div class="col-lg-11">
			<h1><?= Html::encode($this->title) ?></h1>
		</div>
	</div>

  <?= $this->render('_form', [
      'contribuicao' => $contribuicao,
      'contribuinte' => $contribuinte,
      'doacao' => $doacao,
      'instituicao' => $instituicao
  ]) ?>

</main>

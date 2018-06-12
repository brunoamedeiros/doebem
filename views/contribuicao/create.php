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

	<div class="row mb-4">

		<div class="button-back col-3">
			<a class="btn btn-primary"
			   href="<?= \yii\helpers\Url::to(['doacao/view', 'id' => $doacao->id_doacao]) ?>">
				<i class="material-icons">
					keyboard_arrow_left
				</i>
			</a>
		</div>

		<div class="col-lg-6">
			<h3 class="style-text-primary style-color-blue-02">
				<?= Html::encode($this->title) ?>
			</h3>
		</div>
	</div>

  <?= $this->render('_form', [
      'contribuicao' => $contribuicao,
      'contribuinte' => $contribuinte,
      'doacao' => $doacao,
      'instituicao' => $instituicao
  ]) ?>

</main>

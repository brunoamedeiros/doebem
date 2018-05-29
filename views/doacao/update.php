<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Doacao */

$this->title = 'Editar dados';
// $this->params['breadcrumbs'][] = ['label' => 'Doacaos', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id_doacao, 'url' => ['view', 'id_doacao' => $model->id_doacao, 'id_instituicao' => $model->id_instituicao]];
// $this->params['breadcrumbs'][] = 'Update';
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
]) ?>

</main>

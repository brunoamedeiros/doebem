<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Resultado */

$this->title = 'Update Resultado: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Resultados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_resultado, 'url' => ['view', 'id_resultado' => $model->id_resultado, 'id_doacao' => $model->id_doacao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="resultado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

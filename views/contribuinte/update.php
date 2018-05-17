<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contribuinte */

$this->title = 'Update Contribuinte: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Contribuintes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_contribuinte, 'url' => ['view', 'id' => $model->id_contribuinte]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contribuinte-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

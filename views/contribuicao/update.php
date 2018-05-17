<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contribuicao */

$this->title = 'Update Contribuicao: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Contribuicaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_contribuicao, 'url' => ['view', 'id_contribuicao' => $model->id_contribuicao, 'id_contribuinte' => $model->id_contribuinte, 'id_doacao' => $model->id_doacao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contribuicao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

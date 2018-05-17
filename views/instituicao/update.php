<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Instituicao */

$this->title = 'Update Instituicao: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Instituicaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_instituicao, 'url' => ['view', 'id' => $model->id_instituicao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="instituicao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

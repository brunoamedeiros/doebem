<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Doacao */

$this->title = 'Update Doacao: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Doacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_doacao, 'url' => ['view', 'id_doacao' => $model->id_doacao, 'id_instituicao' => $model->id_instituicao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="doacao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

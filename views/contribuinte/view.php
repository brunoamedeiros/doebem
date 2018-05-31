<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Contribuinte */

$this->title = $model->id_contribuinte;
$this->params['breadcrumbs'][] = ['label' => 'Contribuintes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contribuinte-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_contribuinte], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_contribuinte], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_contribuinte',
            'nome',
            'email:email',
            'cpf',
            'data_nascimento',
        ],
    ]) ?>

</div>

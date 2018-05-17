<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Item */

$this->title = $model->id_item;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_item' => $model->id_item, 'id_doacao' => $model->id_doacao], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_item' => $model->id_item, 'id_doacao' => $model->id_doacao], [
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
            'id_item',
            'id_doacao',
            'descricao:ntext',
            'quantidade',
            'valor',
            'imagem',
        ],
    ]) ?>

</div>

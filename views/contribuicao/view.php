<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Contribuicao */

$this->title = $model->id_contribuicao;
$this->params['breadcrumbs'][] = ['label' => 'Contribuicaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contribuicao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_contribuicao' => $model->id_contribuicao, 'id_contribuinte' => $model->id_contribuinte, 'id_doacao' => $model->id_doacao], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_contribuicao' => $model->id_contribuicao, 'id_contribuinte' => $model->id_contribuinte, 'id_doacao' => $model->id_doacao], [
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
            'id_contribuicao',
            'id_contribuinte',
            'id_doacao',
            'valor',
        ],
    ]) ?>

</div>

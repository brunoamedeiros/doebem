<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Resultado */

$this->title = $model->id_resultado;
$this->params['breadcrumbs'][] = ['label' => 'Resultados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resultado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_resultado' => $model->id_resultado, 'id_doacao' => $model->id_doacao], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_resultado' => $model->id_resultado, 'id_doacao' => $model->id_doacao], [
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
            'id_resultado',
            'id_doacao',
            'descricao:ntext',
            'data',
            'imagem:ntext',
        ],
    ]) ?>

</div>

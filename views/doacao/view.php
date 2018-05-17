<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Doacao */

$this->title = $model->id_doacao;
$this->params['breadcrumbs'][] = ['label' => 'Doacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doacao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_doacao' => $model->id_doacao, 'id_instituicao' => $model->id_instituicao], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_doacao' => $model->id_doacao, 'id_instituicao' => $model->id_instituicao], [
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
            'id_doacao',
            'id_instituicao',
            'titulo',
            'descricao:ntext',
            'data_publicacao',
            'imagem_perfil',
            'video',
            'imagem_capa:ntext',
        ],
    ]) ?>

</div>

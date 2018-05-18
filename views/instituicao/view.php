<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Instituicao */

$this->title = $model->id_instituicao;
?>
<div class="instituicao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_instituicao], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_instituicao], [
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
            'id_instituicao',
            'nome',
            'cnpj',
            'descricao:ntext',
            'email:email',
            'telefone',
            'endereco',
            'bairro',
            'cep',
            'login',
            'senha',
            'imagem',
            'video',
            'perfil',
            'vinculo_api',
        ],
    ]) ?>

</div>

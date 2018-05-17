<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Contribuicao */

$this->title = 'Create Contribuicao';
$this->params['breadcrumbs'][] = ['label' => 'Contribuicaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contribuicao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

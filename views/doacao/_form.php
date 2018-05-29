<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Doacao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row margin-top-30">
    <div class="col-lg-12">
        <?php $form = ActiveForm::begin([
            'options' => [
                'class' => 'needs-validation',
                'novalidate' => 'novalidate'
            ],
            'fieldConfig' => [
                'template' => "{label}{input}{error}",
                'options' => [
                    'class' => ''
                ],
            ],
        ]);
        ?>

        <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'imagem_perfil')->fileInput(['accept' => 'image/*']) ?>

        <?= $form->field($model, 'imagem_capa')->fileInput(['accept' => 'image/*']) ?>

        <?= $form->field($model, 'video')->textInput(['maxlength' => true]) ?>

        <h3 class="style-text-primary style-color-blue-02">Lista de itens</h3>

        <?php foreach ($model->_items as $k => $item): ?>
            <div class="form-item">
                <?= $form->field($item, '[' . $k . ']descricao')->textarea(['rows' => 6]) ?>

                <?= $form->field($item, '[' . $k . ']quantidade')->textInput() ?>

                <?= $form->field($item, '[' . $k . ']valor')->textInput() ?>
            </div>

            <button type="button" class="btn-add-item">Adicionar item</button>
        <?php endforeach; ?>

        <div class="d-none form-items-hidden">

        </div>

        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">2 Fralda</h5>
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <p class="mb-1">R$ 100</p>
            </a>

            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">2 Toalha</h5>
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <p class="mb-1">R$ 100</p>
            </a>

            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Cirurgia Zé</h5>
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <p class="mb-1">R$ 100</p>
            </a>
        </div>

        <div class="control button-submit">
            <?= Html::a('Cancelar', ['index'], ['class' => 'btn style-btn-line radius-5 mt-4 float-left']) ?>
            <?= Html::submitButton('Salvar', ['class' => 'btn btn-primary mt-4']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

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

        <h3 class="style-text-secondary style-color-blue-03 mt-20 margin-top-30">
            Lista de itens
        </h3>

        <?php foreach ($model->_items as $k => $item): ?>
            <div class="form-item row" id="form-iten">
                <div class="form-group col-5">
                    <?= $form->field($item, '[' . $k . ']descricao')->textInput(['rows' => 6]) ?>
                </div>

                <div class="form-group col-2">
                    <?= $form->field($item, '[' . $k . ']quantidade')->textInput(['type' => 'number']) ?>
                </div>

                <div class="form-group col-2">
                    <?= $form->field($item, '[' . $k . ']valor')->textInput(['type' => 'number']) ?>
                </div>

                <div class="form-group col-3">
                    <button
                        type="button"
                        id="btn-add-item"
                        data-id-inst="<?= $model->id_instituicao?>"
                        class="btn style-btn-line radius-5 margin-top-30 col-12">
                        Adicionar item
                    </button>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="d-none form-items-hidden">

        </div>

        <div class="list-group" id="lista-itens">
            
        </div>

        <div class="control button-submit">
            <?= Html::a('Cancelar', ['index'], ['class' => 'btn style-btn-line radius-5 mt-4 float-left']) ?>
            <?= Html::submitButton('Salvar', ['class' => 'btn btn-primary mt-4']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

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

	      <div class="my-3">
          <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>
	      </div>

		    <div class="input-group field-doacao-imagem_perfil required">
                <div class="upload form-group p-0">
		          <?= $form->field($model, 'file_imagem_perfil')->fileInput(['accept' => 'image/*', 'class' => 'custom-file-input']) ?>
			    </div>
            </div>
            <div class="input-group field-doacao-imagem_capa required">
			    <div class="upload form-group p-0 ">
		          <?= $form->field($model, 'file_imagem_capa')->fileInput(['accept' => 'image/*', 'class' => 'custom-file-input']) ?>
                </div>
		    </div>

	    <div class="col-lg-12 p-0">
        <?= $form->field($model, 'video')->textInput(['maxlength' => true, 'placeholder' => 'Link do YouTube']) ?>
	    </div>


        <h3 class="style-text-secondary style-color-blue-03 mt-20 margin-top-30">
            Lista de itens
        </h3>

        <div class="alert alert-danger hide" role="alert">
        </div>

        <?php if(sizeof($model->items) > 0): ?>
            <div class="form-item row add-itens-edit" id="form-iten">
                <div class="form-group col-5">
                    <label class="control-label" for="item-edit-decricao">Descrição</label>
                    <input type="text" class="form-control" id="item-edit-decricao" />
                </div>

                <div class="form-group col-2">
                    <label class="control-label" for="item-edit-quantidade">Quantidade</label>
                    <input type="number" class="form-control" id="item-edit-quantidade" />
                </div>

                <div class="form-group col-2">
                    <label class="control-label" for="item-edit-valor">Valor</label>
                    <input type="number" class="form-control" id="item-edit-valor" />
                </div>

                <div class="form-group col-3">
                    <button
                        type="button"
                        id="btn-add-item"
                        data-id-inst="<?= $model->id_instituicao ?>"
                        class="btn style-btn-line radius-5 margin-top-30 col-12">
                        Adicionar item
                    </button>
                </div>
            </div>
        <?php endif ?>
        <br>
        <?php if(sizeof($model->items) > 0): ?>
            <h5>
                Itens cadastrados
            </h5>
        <?php endif ?>

        <?php foreach ($model->_items as $k => $item): ?>
            <div class="form-item row form-itens <?= (sizeof($model->items) > 0)? 'edit-itens' : '' ?>" id="form-iten">
                <div class="form-group col-5">
                    <?= $form->field($item, '[' . $k . ']descricao')->textInput(['rows' => 6]) ?>
                </div>

                <div class="form-group col-2">
                    <?= $form->field($item, '[' . $k . ']quantidade')->textInput(['type' => 'number', 'onkeypress'=> "return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"]) ?>
                </div>

                <div class="form-group col-2">
                    <?= $form->field($item, '[' . $k . ']valor')->textInput(['type' => 'number', 'min' => 0]) ?>
                </div>

                <?php if(!sizeof($model->items) > 0): ?>
                    <div class="form-group col-3">
                        <button
                            type="button"
                            id="btn-add-item"
                            data-id-inst="<?= $model->id_instituicao ?>"
                            class="btn style-btn-line radius-5 margin-top-30">
                            Adicionar item
                        </button>
                    </div>
                <?php else: ?>
                    <input id="list-id-item-<?= $item->id_item ?>" type="hidden" name="Item[<?= $k ?>][id_item]" value="<?= $item->id_item ?>" />

                    <div class="form-group col-3">
                        <button
                            type="button"
                            id="item-del-<?= $item->id_item?>"
                            data-id-item="<?= $item->id_item ?>"
                            class="btn btn-danger radius-5 margin-top-30 btn-excluir col-12"
                            data-toggle="modal" data-target="#modal-confirmacao">
                            deletar
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

        <div class="d-none form-items-hidden">
        </div>

        <div class="list-group" id="lista-itens">
        </div>

        <div  id="lista-itens-del">
        </div>

        <div class="control button-submit">
            <?= Html::a('Cancelar', ['index'], ['class' => 'btn style-btn-line radius-5 mt-4 float-left']) ?>
            <?= Html::submitButton('Salvar', ['class' => 'btn btn-primary mt-4 btn-cadastrar-item']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-confirmacao">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">
                Excluir item
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <p>
                Deseja realmente excluir esse item? Está ação não poderá ser desfeita.
            </p>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-excluir-confirma" data-dismiss="modal" data-id-item="">
                Excluir
            </button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                Cancelar
            </button>
        </div>
    </div>
  </div>
</div>

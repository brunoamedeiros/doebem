<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Contribuicao */
/* @var $form yii\widgets\ActiveForm */


?>

	<div class="row">
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
			<div class="row">
				<div class="col-lg-6">
					<div class="row">
						<div class="form-group col-lg-6">
		          <?= $form->field($contribuinte, 'nome')->textInput(['placeholder' => 'Entre com o seu nome']) ?>
						</div>

						<div class="form-group col-lg-6 pl-0">
		          <?= $form->field($contribuinte, 'email')->textInput(['placeholder' => 'Entre com o seu e-mail']) ?>
						</div>

						<div class="form-group col-sm">
		          <?= $form->field($contribuinte, 'cpf')->textInput(['placeholder' => 'Entre com o seu CPF',
			            'class' => 'form-control cpf']) ?>
						</div>

						<div class="form-group col-lg-6 pl-0">
		          <?= $form->field($contribuinte, 'telefone')->textInput(['placeholder' => 'Entre com o seu Telefone',
		              'class' => 'form-control fone']) ?>
						</div>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="col-lg-12">
						<h5>Doar para o Projeto <strong><?= $doacao->titulo ?></strong></h5>
					</div>

					<div class="form-group col-lg-12 sugestao-pagamento">
						<button type="button" class="btn" data-valor="10">R$ 10</button>
						<button type="button" class="btn" data-valor="20">R$ 20</button>
						<button type="button" class="btn" data-valor="30">R$ 30</button>
						<button type="button" class="btn" data-valor="40">R$ 40</button>
						<button type="button" class="btn" data-valor="50">R$ 50</button>
					</div>

					<div class="form-group col-lg-12 pr-0">
	          <?= $form->field($contribuicao, 'valor')->textInput(['placeholder' => 'Entre com o valor da doação',
	              'class' => 'form-control real']) ?>
					</div>
				</div>
			</div>
			<div class="control">

				<?php if(!empty(Yii::$app->session->get('token'))): ?>
					<script>PagSeguroLightbox('<?= Yii::$app->session->get('token') ?>');</script>
				<?php
          Yii::$app->session->set('token', null);
					endif;
				?>

        <?= Html::submitButton('Doar', ['class' => 'btn btn-success btn-lg float-right']) ?>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>

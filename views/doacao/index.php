<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Doacoes';
?>
<div class="col-lg-8 col-md-11 mx-auto content mx-auto">
	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-12 text-center">
			<img src="<?= Yii::getAlias('@web') ?>/uploads/<?= $instituicao->imagem ?>" alt="..." class="img-thumbnail">
		</div>

		<div class="col-lg-8 col-md-10 col-sm-12">
			<a href="<?= \yii\helpers\Url::to(['instituicao/view', 'id' => $instituicao->id_instituicao]) ?>" target="_blank">
				<h3 class="style-text-primary style-color-blue-02"><?= $instituicao->nome ?></h3>
			</a>

			<a href="<?= \yii\helpers\Url::to(['instituicao/update', 'id' => $instituicao->id]) ?>" class="btn btn-outline-primary">
				Editar meus dados
			</a>
		</div>
	</div>

	<div class="row justify-content-between mt-3 margin-top-50 col-12 p0">
		<div class="col-lg-10 col-md-10 col-sm-12">
			<h4 class="style-text-secondary style-color-blue-03 margin-bottom-20">
				Meus projetos
			</h4>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-12">
			<?= Html::a('Cadastrar nova', ['create'], ['class' => 'btn btn-outline-primary']) ?>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 table-responsive">
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'options' => [
					'class'=>'col-sm-12 table-responsive p0'
				],
				'tableOptions' => [
					'class' => 'table table-sm mt-3 table-striped',
				],
		
				'columns' => [
					'titulo',
					[
						'class' => 'yii\grid\ActionColumn',
						'template' => '{view} {update} {delete} {resultado}',
						'buttons' => [
							'view' => function($url, $model) {
							  return Html::a('<i class="material-icons">remove_red_eye</i>',
								  ['view', 'id' => $model->id_doacao], ['class' => '']);
							},
							'update' => function($url, $model) {
							  return Html::a('<i class="material-icons">mode_edit</i>',
								  ['update', 'id_doacao' => $model->id_doacao, 'id_instituicao' => $model->id_instituicao], ['class' => '']);
							},
							'delete' => function($url, $model) {
							  return Html::a('<i class="material-icons">delete</i>',
								  ['delete', 'id_doacao' => $model->id_doacao, 'id_instituicao' => $model->id_instituicao],
								  [
									  'class' => '',
									  'data' => [
										  'confirm' => 'Você realmente deseja deletar este projeto?',
										  'method' => 'post',
									  ],
								  ]);
							},
							'resultado' => function($url, $model) {
                return Html::a('<i class="material-icons">star</i>',
                    ['resultado/index', 'id_doacao' => $model->id_doacao], ['class' => '']);
              },
						]
					],
				],
			]); ?>
		</div>
	</div>
</div>
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Doacoes';
?>
<div class="col-lg-10 content mx-auto">

	<div class="row align-items-center">
		<div class="col-lg-2 col-md-2 col-sm-12 text-center">
			<img src="<?= Yii::getAlias('@web') ?>/uploads/<?= $instituicao->imagem ?>" alt="..." class="img-thumbnail">
		</div>

		<div class="col-lg-10 col-md-10 col-sm-12">
			<h3 class="style-text-primary style-color-blue-02"><?= $instituicao->nome ?></h3>

			<a href="<?= \yii\helpers\Url::to(['instituicao/update', 'id' => $instituicao->id]) ?>" type="button" class="btn style-btn-line radius-5 btn-sm col-sm-12 col-lg-3 col-md-2">
				Editar meus dados
			</a>
		</div>
	</div>

	<div class="row justify-content-between mt-3 margin-top-50 col-12">
		<div class="col-lg-10 col-md-10 col-sm-12 float-left">
			<h4 class="style-text-primary style-color-blue-03 margin-bottom-20">
				Meus projetos
			</h4>
		</div>

		<div class="col-lg-2 col-md-2 col-sm-12 p0">
			<!-- <a href="cadastrar-necessidade.html" class="text-center float-right style-btn-line radius-5 btn-sm col-12">
				Cadastrar nova
			</a> -->

			<?= Html::a('Cadastrar nova', ['create'], ['class' => 'text-center float-right style-btn-line radius-5 btn-sm col-12']) ?>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 table-responsive">
		<?php Pjax::begin(); ?>
		
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'options' => [
					'class'=>'col-sm-12 table-responsive p0'
				],
				'tableOptions' => [
					'class' => 'table table-sm mt-3 table-striped',
				],
		
				'columns' => [
					// 'id_doacao',
					// 'id_instituicao',
					'titulo',
					// 'descricao:ntext',
				  //'imagem_perfil',
				  //'video',
				  //'imagem_capa:ntext',
					[
						'class' => 'yii\grid\ActionColumn',
						'template' => '{view} {update} {delete}',
						'buttons' => [
							'view' => function($url, $model) {
							  return Html::a('<i class="material-icons">remove_red_eye</i>',
								  ['view', 'id_doacao' => $model->id_doacao, 'id_instituicao' => $model->id_instituicao], ['class' => '']);
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
							}
						]
					],
				],
			]); ?>
		
		  <?php Pjax::end(); ?>
		</div>
	</div>
</div>
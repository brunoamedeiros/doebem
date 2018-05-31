<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resultados';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-lg-10 content mx-auto">
	<a href="<?= \yii\helpers\Url::to(['doacao/index']) ?>" class="btn style-btn-line float-left radius-5">
		Voltar
	</a>

	<div class="row justify-content-between mt-3 margin-top-50 col-12 p-0">
		<div class="col-lg-10 col-md-10 col-sm-12 float-left">
			<h4 class="style-text-secondary style-color-blue-03 margin-bottom-20">
				Resultados do projeto <?= $doacao->titulo ?>
			</h4>
		</div>

		<div class="col-lg-2 col-md-2 col-sm-12 p0">
	    <?= Html::a('Cadastrar novo', ['create', 'id_doacao' => $doacao->id_doacao], ['class' => 'text-center float-right style-btn-line radius-5 btn-sm col-12']) ?>
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
	            'descricao:ntext',
              [
                  'attribute' => 'data',
                  'format' => ['date', 'php:d/m/Y']
              ],
              [
	                'class' => 'yii\grid\ActionColumn',
	                'template' => '{view} {update} {delete}',
	                'buttons' => [
	                    'view' => function($url, $model) {
	                      return Html::a('<i class="material-icons">remove_red_eye</i>',
	                          ['doacao/view', 'id' => $model->id_doacao], ['class' => '']);
	                    },
	                    'update' => function($url, $model) {
	                      return Html::a('<i class="material-icons">mode_edit</i>',
	                          ['update', 'id_doacao' => $model->id_doacao, 'id_resultado' => $model->id_resultado], ['class' => '']);
	                    },
	                    'delete' => function($url, $model) {
	                      return Html::a('<i class="material-icons">delete</i>',
	                          ['delete', 'id_doacao' => $model->id_doacao, 'id_resultado' => $model->id_resultado],
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
		</div>
	</div>
</div>

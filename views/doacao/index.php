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
			<img src="../../public/imagens/loo.png" alt="..." class="img-thumbnail">
		</div>

		<div class="col-lg-10 col-md-10 col-sm-12">
			<h3 class="style-text-primary style-color-blue-02">Abrigo dos Velhinhos</h3>

			<button type="button" class="btn style-btn-line radius-5 btn-sm col-sm-12 col-lg-3 col-md-2">
				Editar meus dados
			</button>
		</div>
	</div>

	<div class="row justify-content-between mt-3 margin-top-50 col-12">
		<div class="col-lg-10 col-md-10 col-sm-12 float-left">
			<h4 class="style-text-primary style-color-blue-03 margin-bottom-20">
				Minhas necessidades
			</h4>
		</div>

		<div class="col-lg-2 col-md-2 col-sm-12 p0">
			<a href="cadastrar-necessidade.html" class="text-center float-right style-btn-line radius-5 btn-sm col-12">
				Cadastrar nova
			</a>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 table-responsive">
			<table class="table table-sm mt-3 table-striped margin-botton-50">
				<thead>
				<tr>
					<th scope="col">Nome</th>
					<th scope="col">Data de publicação</th>
					<th scope="col">Contribuições</th>
					<th scope="col">Opções</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>Ajude seu Zé</td>
					<td>11/02/2018</td>
					<td>R$ 1.000,00 / 3.000,00</td>
					<td>
						<a href="">
							<i class="material-icons">remove_red_eye</i>
						</a>
						<a href="">
							<i class="material-icons">mode_edit</i>
						</a>
						<a href="">
							<i class="material-icons">delete</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Ajude a Maria</td>
					<td>01/03/2018</td>
					<td>R$ 1.000,00 / 3.000,00</td>
					<td>
						<a href="">
							<i class="material-icons">remove_red_eye</i>
						</a>
						<a href="">
							<i class="material-icons">mode_edit</i>
						</a>
						<a href="">
							<i class="material-icons">delete</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Lorem ipsum</td>
					<td>11/02/2018</td>
					<td>R$ 10.000,00 / 20.000,00</td>
					<td>
						<a href="" data-toggle="tooltip" data-placement="top" title="visualizar">
							<i class="material-icons">remove_red_eye</i>
						</a>
						<a href="" data-toggle="tooltip" data-placement="top" title="editar">
							<i class="material-icons">mode_edit</i>
						</a>
						<a href="" data-toggle="tooltip" data-placement="top" title="deletar">
							<i class="material-icons">delete</i>
						</a>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="doacao-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Create Doacao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_doacao',
            'id_instituicao',
            'titulo',
            'descricao:ntext',
            'data_publicacao',
            //'imagem_perfil',
            //'video',
            //'imagem_capa:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

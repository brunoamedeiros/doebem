<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visualizar detalhes';

?>

<main class="col-lg-10 content mx-auto">
		<div class="row align-items-center">
			<div class="col-sm-1">
				<button type="button" class="btn btn-primary">Voltar</button>
			</div>

			<div class="col-sm-11">
				<h1>Visualizar necessidades</h1>
			</div>
		</div>

		<br>
		<div class="row">
			<div class="col-lg-12">
				<img src="images/capa.jpg" class="img-fluid" alt="Responsive image">
				<div class="text-center">
					<img src="images/Abe_simpson.png" alt="..." class="img-thumbnail" height="150px" width="150px">
					<h2>Ajude seu Zé</h2>
				</div>
				<div class="descricao">
					Mussum Ipsum, cacilds vidis litro abertis. A ordem dos tratores não altera o pão duris. Aenean aliquam molestie leo, vitae iaculis nisl.Mussum Ipsum, cacilds vidis litro abertis. A ordem dos tratores não altera o pão duris.Aenean aliquam molestie leo, vitae iaculis nisl.Mussum Ipsum, cacilds vidis litro abertis. Aenean aliquam molestie leo, vitae iaculis nisl.Mussum Ipsum, cacilds vidis litro abertis.
				</div>
				<div class="info row">
					<div class="col-lg-6">
						<iframe width="540" height="315" src="https://www.youtube.com/embed/1fi0AohD2ik" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
						<div class="tabs">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="sobre-tab" data-toggle="tab" href="#sobre" role="tab" aria-controls="sobre" aria-selected="true">Sobre</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="doadores-tab" data-toggle="tab" href="#doadores" role="tab" aria-controls="doadores" aria-selected="false">Doadores</a>
								</li>
							</ul>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="sobre" role="tabpanel" aria-labelledby="sobre-tab">
									Mussum Ipsum, cacilds vidis litro abertis. A ordem dos tratores não altera o pão duris. Aenean aliquam molestie leo, vitae iaculis nisl.Mussum Ipsum, cacilds vidis litro abertis. A ordem dos tratores não altera o pão duris.
									<div class="conheca">
										<button type="button" class="btn">Conheça-nos</button>
									</div>
								</div>
								<div class="tab-pane fade" id="doadores" role="tabpanel" aria-labelledby="doadores-tab">...</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 infos">
						<div>
							<span class="oi oi-info"> </span>
							<label> Rua dos Bobos, nº 0</label>
						</div>
						<div>
							<span class="oi oi-phone"></span>
							<label>+55 (48) 9999-9999</label>
						</div>
						<div>
							<strong>@</strong>
							<label>abrigo@velhinhos.com.br</label>
						</div>
						<div>
							<strong>f </strong>
							<label>/abrigo</label>
						</div>
						<div class="progresso">
							<strong>Itens para doação - Total: R$ 5.030,00</strong>
							<div class="progress">
								<div class="progress-bar" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
							</div>
						</div>
						<div class="items">
							<div>
								<span class="oi oi-task"></span>
								<label>Item One - Qtd: 3 - Valor Un.: R$ 10,00</label>
							</div>
							<div>
								<span class="oi oi-timer"></span>
								<label>Item Two - Valor: R$ 20,00</label>
							</div>
							<div>
								<span class="oi oi-timer"></span>
								<label>Item Three - Valor: R$ 5.000,00</label>
							</div>
						</div>
						<div class="contribua">
							<button type="button" class="btn btn-lg">Contribua agora</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
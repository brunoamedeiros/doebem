<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Doacao */

$this->title = 'Destalhes do projeto';
// $this->params['breadcrumbs'][] = ['label' => 'Doacaos', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>

<img src="<?= Yii::getAlias('@web') ?>/uploads/<?= $model->imagem_capa ?>" class="img-fluid" alt="Responsive image">

<main class="col-lg-10 content detalhes-necessidade mx-auto">
	<div class="row">
		<div class="col-lg-12">
			
			<div class="text-center">
				<img src="<?= Yii::getAlias('@web') ?>/uploads/<?= $model->imagem_perfil ?>" alt="..." class="img-thumbnail" height="150px" width="150px">
				<h3 class="style-text-primary style-color-blue-02"><?= $model->titulo ?></h3>
			</div>
			
			<div class="descricao">
				<?= $model->descricao ?>
			</div>
			
			<div class="info row">
				<div class="col-lg-6">
					<iframe width="540" height="315" src="https://www.youtube.com/embed/1fi0AohD2ik" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
					</iframe>
					
					<div class="tabs">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link" id="doadores-tab" data-toggle="tab" href="#doadores" role="tab" aria-controls="doadores" aria-selected="false">Doadores</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="sobre-tab" data-toggle="tab" href="#sobre" role="tab" aria-controls="sobre" aria-selected="false">Sobre</a>
							</li>
						</ul>
						
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade" id="doadores" role="tabpanel" aria-labelledby="doadores-tab">
								...
							</div>
							<div class="tab-pane fade" id="sobre" role="tabpanel" aria-labelledby="sobre-tab">
								<?= $instituicaoModel->descricao ?>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6 infos">
					<div>
						<span class="oi oi-info"> </span>
						<label>
							<?= $instituicaoModel->endereco ?>
						</label>
					</div>
					
					<div>
						<span class="oi oi-phone"></span>
						<label>
							<?= $instituicaoModel->telefone ?>
						</label>
					</div>
					
					<div>
						<strong>@</strong>
						<label><?= $instituicaoModel->email ?></label>
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
						<button type="button" class="btn btn-primary style-btn-primary rounded-50 center btn-lg col-12">Ajudar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Doacao */
/* @var $instituicao app\models\Instituicao */
/* @var $contribuidores app\models\Contribuicao */

$this->title = 'Detalhes do projeto';
// $this->params['breadcrumbs'][] = ['label' => 'Doacaos', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
 
<div class="img-capa">
	<img src="<?= Yii::getAlias('@web') ?>/uploads/<?= $model->imagem_capa ?>" class="img-fluid" alt="Responsive image">
</div>

<main class="col-lg-8 col-md-11 mx-auto content detalhes-necessidade">
	<div class="row">
		<div class="col-lg-12">
			<a class="btn style-btn-line radius-5" href="<?= \yii\helpers\Url::to(['doacao/index', 'id' => $model->id_instituicao]) ?>">
				Voltar
			</a>

			<div class="text-center">
				<img src="<?= Yii::getAlias('@web') ?>/uploads/<?= $model->imagem_perfil ?>" alt="..." class="img-thumbnail" height="150px" width="150px">
				<h3 class="style-text-primary style-color-blue-02"><?= $model->titulo ?></h3>
			</div>
			
			<div class="descricao margin-botton-50">
				<?= $model->descricao ?>
			</div>
			
			<div class="info row">
				<div class="col-lg-6">
					<iframe width="100%" height="315" src="https://www.youtube.com/embed/1fi0AohD2ik" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
					</iframe>
					
					<div class="tabs">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active show" id="doadores-tab" data-toggle="tab" href="#doadores" role="tab" aria-controls="doadores" aria-selected="false">Doadores</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="sobre-tab" data-toggle="tab" href="#sobre" role="tab" aria-controls="sobre" aria-selected="false">Sobre</a>
							</li>
						</ul>
						
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade" id="doadores" role="tabpanel" aria-labelledby="doadores-tab">
								<?php foreach ($contribuidores as $contribuidor): ?>
									<p><?= $contribuidor->getContribuinte()->one()->nome; ?></p>
								<?php endforeach; ?>
							</div>
							<div class="tab-pane fade" id="sobre" role="tabpanel" aria-labelledby="sobre-tab">
								<?= $instituicaoModel->descricao ?>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6 infos infos-detalhes">
					<p>
						<i class="material-icons">place</i>
						<?= $instituicaoModel->endereco ?>
					</p>
					
					<p>
						<i class="material-icons">phone</i>
						<?= $instituicaoModel->telefone ?>
					</p>
					
					<p>
						<i class="material-icons">email</i>
						<?= $instituicaoModel->email ?>
					</p>
					
					<p class="margin-botton-50">
					</p>
					
					<div class="items margin-botton-20">
						<strong>Itens para doação</strong>
						<br><br>

						<?php foreach($itens as $item): ?>
							<div>
								<span class="oi oi-task"></span>
								<label>
									<?= $item->quantidade ?> 
									<b>
										<?= $item->descricao ?>
									</b> 
									- Valor Un.: R$ <?= $item->valor ?>
								</label>
							</div>
						<?php endforeach; ?>
					</div>

					<div class="progresso margin-bottom-20">
						
						<div class="progress">
							<div class="progress-bar" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
						</div>
					</div>
					
					<div class="contribua">
						<a class="btn btn-primary style-btn-primary rounded-50 center btn-lg col-12"
						   href="<?= \yii\helpers\Url::to(['contribuicao/create', 'id_doacao' => $model->id_doacao]) ?>">
							Contribuir
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

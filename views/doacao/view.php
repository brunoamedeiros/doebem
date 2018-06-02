<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Doacao */
/* @var $instituicao app\models\Instituicao */
/* @var $contribuicoes app\models\Contribuicao */

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
					<div data-youtube="<?= $model->video ?>"></div>
					
					<div class="tabs">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="sobre-tab" data-toggle="tab" href="#sobre" role="tab" aria-controls="sobre" aria-selected="false">Sobre</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="doadores-tab" data-toggle="tab" href="#doadores" role="tab" aria-controls="doadores" aria-selected="true">Doadores</a>
							</li>
						</ul>
						
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="sobre" role="tabpanel" aria-labelledby="sobre-tab">
                <?= $instituicaoModel->descricao ?>
							</div>
							<div class="tab-pane fade" id="doadores" role="tabpanel" aria-labelledby="doadores-tab">
								<ul class="list-group list-group-flush">
                  <?php if(sizeof($contribuicoes) > 0): ?>
                    <?php foreach ($contribuicoes as $contribuicao): ?>
		                  <li class="list-group-item"><?= $contribuicao->getContribuinte()->one()->nome; ?></li>
                    <?php endforeach; ?>
                  <?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6 infos infos-detalhes">
					<h5 class="style-text-primary style-color-blue-02">Venha até nós!</h5>
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

					<div class="progresso mb-3">
						<strong>Itens para doação - Total: R$ <?= $total ?></strong>
						<div class="progress">
							<div class="progress-bar" role="progressbar" style="width: <?= $progress ?>%;" aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="<?= $total ?>"><?= $progress ?>%</div>
						</div>
					</div>
					
					<div class="items mb-5">
            <?php if(sizeof($itens) > 0): ?>
              <?php foreach ($itens as $item): ?>
		            <div>
			            <?php if($totalArrecadado >= ($item->quantidade * $item->valor)): ?>
			              <span class="material-icons">check</span>
			            <?php else: ?>
			              <span class="material-icons">query_builder</span>
			            <?php endif; ?>

			            <label><?= $item->descricao . ' - Qtd: ' . $item->quantidade . ' -  Valor Un.: R$ ' . number_format($item->valor, 2);?></label>
		            </div>
              <?php endforeach; ?>
            <?php endif; ?>

						<!--

						<div>
							<span class="oi oi-timer"></span>
							<label>Item Two - Valor: R$ 20,00</label>
						</div>

						<div>
							<span class="oi oi-timer"></span>
							<label>Item Three - Valor: R$ 5.000,00</label>
						</div> -->
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

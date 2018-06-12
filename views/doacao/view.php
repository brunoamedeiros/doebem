<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Doacao */
/* @var $instituicao app\models\Instituicao */
/* @var $contribuicoes app\models\Contribuicao */

$this->title = $model->titulo;
?>

<div class="img-capa">
	<img src="<?= Yii::getAlias('@web') ?>/uploads/<?= $model->imagem_capa ?>" alt="<?= $model->titulo ?>">
</div>

<main class="col-lg-8 col-md-11 mx-auto content detalhes-necessidade">
	<div class="row">
		<div class="col-lg-12">

			<a class="btn style-btn-line radius-5" href="<?= \yii\helpers\Url::to(['instituicao/view', 'id' => $model->id_instituicao]) ?>">
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
								<a class="nav-link active" id="sobre-tab" data-toggle="tab" href="#sobre" role="tab" aria-controls="sobre" aria-selected="false">Andamento do projeto</a>
							</li>
              <?php if($total > 0): ?>
							<li class="nav-item">
								<a class="nav-link" id="doadores-tab" data-toggle="tab" href="#doadores" role="tab" aria-controls="doadores" aria-selected="true">Doadores</a>
							</li>
              <?php endif; ?>
						</ul>

						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade" id="doadores" role="tabpanel" aria-labelledby="doadores-tab">
								<ul class="list-group list-group-flush">
                  <?php if(sizeof($contribuicoes) > 0): ?>
                    <?php foreach ($contribuicoes as $contribuicao): ?>
                      <?php if(!$contribuicao->getContribuinte()->one()->anonimo): ?>
												<li class="list-group-item"><?= $contribuicao->getContribuinte()->one()->nome; ?></li>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  <?php endif; ?>
								</ul>
							</div>

							<div class="tab-pane fade show active" id="sobre" role="tabpanel" aria-labelledby="sobre-tab">
								<b>
									Resultados
								</b>

								<p>
									Acompanhe o desenvolvimento do projeto através das doações recebidas.
								</p>

								<?php if(sizeof($resultados) > 0): ?>
									<button type="button" class="btn btn-primary col-sm-12 col-md-4" data-toggle="modal" data-target="#modal-resultados">
										Ver resultados
									</button>
								<?php else: ?>
									<p>
										Em breve taremos atualizações sobre o andamento do projeto, aguarde.
									</p>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-6 infos infos-detalhes">
					<h5 class="style-text-primary style-color-blue-02 mt-3">Venha até nós!</h5>
					<p>
						<i class="material-icons">home</i>
            <?= $instituicaoModel->nome ?>
					</p>
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


					<div class="items mb-3">
						<strong>Itens para doação</strong>

            <?php if(sizeof($itens) > 0): ?>
              <?php foreach ($itens as $item): ?>
								<div>
                  <?php if($total > 0): ?>
	                  <?php if($totalArrecadado >= ($item->quantidade * $item->valor)): ?>
											<span class="material-icons">check</span>
	                  <?php else: ?>
											<span class="material-icons">query_builder</span>
	                  <?php endif; ?>

										<label><?= $item->descricao . ' - Qtd: ' . $item->quantidade . ' -  Valor Un.: R$ ' . number_format($item->valor, 2);?></label>
                  <?php else: ?>
	                  <span class="material-icons">check</span>
	                  <label><?= $item->descricao ?></label>
                  <?php endif; ?>
								</div>
              <?php endforeach; ?>
            <?php endif; ?>
					</div>

          <?php if($total > 0): ?>
					<div class="progresso mb-3">
						<strong>Total: R$ <?= $total ?></strong>
						<div class="progress">
							<div class="progress-bar" role="progressbar" style="width: <?= $progress ?>%;" aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="<?= $total ?>"><?= $progress ?>%</div>
						</div>
					</div>

					<div class="contribua">
						<a class="btn btn-primary style-btn-primary rounded-50 center btn-lg col-12"
						   href="<?= \yii\helpers\Url::to(['contribuicao/create', 'id_doacao' => $model->id_doacao]) ?>">
							Contribuir
						</a>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</main>

<div class="modal fade" id="modal-resultados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Resultados</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<?php foreach($resultados as $i => $k): ?>
						<li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>"></li>
					<?php endforeach; ?>
				</ol>
				<div class="carousel-inner">
					<?php foreach($resultados as $i => $r): ?>
						<div class="carousel-item <?= ($i == 0)? 'active' : '' ?>">
							<img src="<?= Yii::getAlias('@web') ?>/uploads/<?= $r->imagem ?>" alt="resultado-<?= $i ?>" class="d-block w-100">
							<div class="carousel-caption d-none d-md-block">
								<p>
									<?= Yii::$app->formatter->asDate($r->data, 'php:d/m/Y'); ?> - <?= $r->descricao ?>
								</p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">
						Previous
					</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
    </div>
  </div>
</div>

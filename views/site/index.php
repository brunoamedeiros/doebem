<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Projeto Doe Bem';
?>
<div class="jumbotron jumbotron-fluid gradient-bg">
	<div class="container text-center">
		<h1 class="display-4 style-main-text style-color-white">
			<b>
				Nos ajude a continuar <br>ajudando
			</b>
		</h1>

		<p class="lead style-color-white">
			"Aquele que tem caridade no coração, sempre <br>tem algo para dar"
		</p>

		<a href="#instituicoes-parceiras">
			<button type="button" class="btn btn-primary style-btn-primary rounded-50 center">
				Conheça as instituições
			</button>
		</a>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-7 col-md-10 col-sm-12 mx-auto">
			<div class="passos col-12 mx-auto">
				<div class="passo-quadro col-lg-4 col-sm-4">
					<div class="passo-quadro__content">
						<img src="<?= Yii::getAlias('@web') ?>/imagens/img-conheca.png" alt="">
						<p class="style-color-yellow-02 passo-titlo">Instituições</p>
						<p>A DoeBem trabalha para que instituições locais possam ter um meio de divulgação de seus projetos</p>
					</div>
				</div>

				<div class="passo-quadro col-lg-4 col-sm-4">
					<div class="passo-quadro__content">
						<img src="<?= Yii::getAlias('@web') ?>/imagens/voluntarie-se.png" alt="img-01">
						<p class="style-color-green-02 passo-titlo">Contribuições</p>
						<p>Todo tipo de contribuição para as instituições parceiras são bem vindas</p>
					</div>
				</div>

				<div class="passo-quadro col-lg-4 col-sm-4">
					<div class="passo-quadro__content">
						<img src="<?= Yii::getAlias('@web') ?>/imagens/doe.png" alt="img-01">
						<p class="style-color-pink-02 passo-titlo">Doeações</p>
						<p>Sua doação ajuda as instituições a continuar mantendo seus projetos sociais</p>
					</div>
				</div>
			</div>

			<div class="intituicoes-parceiras col-lg-12 mx-auto text-center" id="instituicoes-parceiras">
				<h2 class="style-text-primary style-color-blue-02">instituições parceiras</h2>
				<br>

				<p>
				Estas são as instituições parceiras da DoeBem, todas com projeto de cunho social
				e residentes da cidade de Tubarão - SC
				</p>

				<?php if(sizeof($instituicoes) > 0): ?>
					<?php foreach ($instituicoes as $instituicao): ?>
						<div class="instituicoes-parceiras__instituicao col-lg-4 col-md-4">
							<div class="instituicao-content">
								<img src="<?= Yii::getAlias('@web') ?>/uploads/<?= $instituicao->imagem ?>" class="img-fluid" alt="...">
								
								<p class="style-color-blue-03">
									<?= $instituicao->nome ?>
								</p>
								
								<a href="<?= \yii\helpers\Url::to(['instituicao/view', 'id' => $instituicao->id_instituicao]) ?>" class="btn btn-primary style-btn-primary rounded-50 col-lg-12">
									Conheça-nos
								</a>	
							</div>
						</div>
					<?php endforeach; ?>
				<?php else: ?>
					<p>
					Nenhuma instituição cadastrada até o momento.
					</p>
				<?php endif; ?>
			</div>
		</div>

		<div class="sobre-nos col-lg-12 mx-auto" id="sobre-nos">
			<div class="sobre-nos__texto col-lg-6 mx-auto">
				<h3 class="style-text-primary style-color-blue-02 text-center">
					Sobre a doe bem
				</h3>
				<br>
				<p class="text-center">
					A <strong>DoeBem </strong> é um projeto de conclusão da disciplina de Aplicação de Engenharia de Software,
					do curso de Ciência da Computação da UNISUL. Ela tem como objetivo, preparar os alunos
					no gerenciamento de um projeto de software, desde a fase de planejamento até a entrega ao cliente.					
				</p>
			</div>
		</div>

		<div class="time col-lg-6 col-md-10 mx-auto text-center" id="equipe">
			<h3 class="style-text-primary style-color-blue-02">Equipe</h3>
			<br>

			<p>
				Os integrantes do time envolvidos na idealização e desenvolvimento do projeto DoeBem,
				cada integrante teve uma função especifica em todas as etapas do projeto, visando sempre a qualidade do 
				desenvolvimento em cada etapa. 
			</p>

			<div class="row">
				<div class="time-pessoa col col-lg-3 col-sm-6 col-md-3">
					<div class="time-content" style="background:url('<?= Yii::getAlias('@web') ?>/imagens/jhonatas.jpg'); background-size: contain">
						<div class="time-img">
						</div>

						<div class="degrade"></div>

						<div class="time__funcao">
							<p>
								<b>Jhonatas</b>
								<br>
								<span>Front-end</span>
							</p>
						</div>
					</div>
				</div>

				<div class="time-pessoa col col-lg-3 col-sm-6 col-md-3">
					<div class="time-content" style="background:url('<?= Yii::getAlias('@web') ?>/imagens/celio.jpg'); background-size: contain">
						<div class="time-img">
						</div>

						<div class="degrade"></div>

						<div class="time__funcao">
							<p>
								<b>Celio</b>
								<br>
								<span>Analista/DBA</span>
							</p>
						</div>
					</div>
				</div>

				<div class="time-pessoa col col-lg-3 <col-sm-6></col-sm-6> col-md-3">
					<div class="time-content" style="background:url('<?= Yii::getAlias('@web') ?>/imagens/bruno.jpg'); background-size: contain">
						<div class="time-img">
						</div>

						<div class="degrade"></div>

						<div class="time__funcao">
							<p>
								<b>Bruno</b>
								<br>
								<span>Front-end</span>
							</p>
						</div>
					</div>
				</div>

				<div class="time-pessoa col col-lg-3 col-sm-6 col-md-3">
					<div class="time-content" style="background:url('<?= Yii::getAlias('@web') ?>/imagens/mateus.jpg'); background-size: contain">
						<div class="time-img">
						</div>

						<div class="degrade"></div>

						<div class="time__funcao">
							<p>
								<b>Mateus</b>
								<br>
								<span>Analista/DBA</span>
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="time-pessoa col col-lg-3 col-sm-6 col-md-3">
					<div class="time-content" style="background:url('<?= Yii::getAlias('@web') ?>/imagens/anderson.jpg'); background-size: contain">
						<div class="time-img">
						</div>

						<div class="degrade"></div>

						<div class="time__funcao">
							<p>
								<b>Anderson</b>
								<br>
								<span>Back-end</span>
							</p>
						</div>
					</div>
				</div>

				<div class="time-pessoa col col-lg-3 col-sm-6 col-md-3">
					<div class="time-content" style="background:url('<?= Yii::getAlias('@web') ?>/imagens/diou.jpg'); background-size: contain">
						<div class="time-img">
						</div>

						<div class="degrade"></div>

						<div class="time__funcao">
							<p>
								<b>Diou</b>
								<br>
								<span>Front-end</span>
							</p>
						</div>
					</div>
				</div>

				<div class="time-pessoa col col-lg-3 col-sm-6 col-md-3">
					<div class="time-content" style="background:url('<?= Yii::getAlias('@web') ?>/imagens/tonelli.jpg'); background-size: contain">
						<div class="time-img">
						</div>

						<div class="degrade"></div>

						<div class="time__funcao">
							<p>
								<b>Tonelli</b>
								<br>
								<span>Gerente/Back-end</span>
							</p>
						</div>
					</div>
				</div>

				<div class="time-pessoa col col-lg-3 col-sm-6 col-md-3">
					<div class="time-content" style="background:url('<?= Yii::getAlias('@web') ?>/imagens/instituicao-01.png');">
						<div class="time-img">
						</div>

						<div class="degrade"></div>

						<div class="time__funcao">
							<p>
								<b>Guilherme</b>
								<br>
								<span>Back-end</span>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

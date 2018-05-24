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

		<a href="#intituicoes-parceiras">
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
						<p class="style-color-yellow-02 passo-titlo">Conheça</p>
						<p>Loren ispun dolor met sit amet,consectutur adipising elit</p>
					</div>
				</div>

				<div class="passo-quadro col-lg-4 col-sm-4">
					<div class="passo-quadro__content">
						<img src="<?= Yii::getAlias('@web') ?>/imagens/voluntarie-se.png" alt="img-01">
						<p class="style-color-green-02 passo-titlo">Conheça</p>
						<p>Loren ispun dolor met sit amet,consectutur adipising elit</p>
					</div>
				</div>

				<div class="passo-quadro col-lg-4 col-sm-4">
					<div class="passo-quadro__content">
						<img src="<?= Yii::getAlias('@web') ?>/imagens/doe.png" alt="img-01">
						<p class="style-color-pink-02 passo-titlo">Conheça</p>
						<p>Loren ispun dolor met sit amet,consectutur adipising elit</p>
					</div>
				</div>
			</div>

			<div class="intituicoes-parceiras col-lg-12 mx-auto text-center" id="intituicoes-parceiras">
				<h2 class="style-text-primary style-color-blue-02">instituições parceiras</h2>
				<br>

				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet magna sagittis, posuere tellus vitae, laoreet turpis. Integer sollicitudin ut est a pretium.
				</p>

        <?php foreach ($instituicoes as $instituicao): ?>
          <div class="instituicoes-parceiras__instituicao col-lg-4 col-md-4">
            <div class="instituicao-content">
              <img src="<?= Yii::getAlias('@web') ?>/uploads/<?= $instituicao->imagem ?>" class="img-fluid" alt="...">
              <p class="style-color-blue-03"><?= $instituicao->nome ?></p>
              <a href="visualizar-instituicao.html" style="display: block">
                <a href="<?= \yii\helpers\Url::to(['instituicao/visualizar', 'id' => $instituicao->id_instituicao]) ?>" type="button" class="btn btn-primary style-btn-primary rounded-50 col-lg-12">
                  Conheça-nos
                </a>
              </a>
            </div>
          </div>
        <?php endforeach; ?>

<!--				<div class="instituicoes-parceiras__instituicao col-lg-4 col-md-4">-->
<!--					<div class="instituicao-content">-->
<!--						<img src="--><?//= Yii::getAlias('@web') ?><!--/imagens/instituicao-01.png" class="img-fluid" alt="...">-->
<!--						<p class="style-color-blue-03">Loren Ipsun Dollor</p>-->
<!--						<button type="button" class="btn btn-primary style-btn-primary rounded-50 col-lg-12">Conheça-nos</button>-->
<!--					</div>-->
<!--				</div>-->
<!---->
<!--				<div class="instituicoes-parceiras__instituicao col-lg-4 col-md-4">-->
<!--					<div class="instituicao-content">-->
<!--						<img src="--><?//= Yii::getAlias('@web') ?><!--/imagens/instituicao-02.png" class="img-fluid" alt="insituicao">-->
<!--						<p class="style-color-blue-03">volutpat purus</p>-->
<!--						<button type="button" class="btn btn-primary style-btn-primary rounded-50 col-lg-12">Conheça-nos</button>-->
<!--					</div>-->
<!--				</div>-->
			</div>
		</div>

		<div class="sobre-nos col-lg-12 mx-auto">
			<div class="sobre-nos__texto col-lg-6 float-left">
				<h3 class="style-text-primary style-color-blue-02">
					Sobre a doe bem
				</h3>
				<br>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet magna sagittis, posuere tellus vitae, laoreet turpis. Integer sollicitudin ut est a pretium. Aenean scelerisque enim non nunc placerat hendrerit et quis ante. Cras non dignissim tortor. Pellentesque at enim at justo viverra tristique. In sed eros viverra, convallis mauris a, congue nisl. Pellentesque at suscipit ante.
				</p>
			</div>

			<div class="sobre-nos__imagens col-lg-6 float-right">
				<div class="row">
					<div class="col-4 sobre-nos__imagens-content">
						<img src="<?= Yii::getAlias('@web') ?>/imagens/instituicao-01.png" class="rounded float-left col-12" alt="...">
					</div>

					<div class="col-4 sobre-nos__imagens-content">
						<img src="<?= Yii::getAlias('@web') ?>/imagens/instituicao-01.png" class="rounded float-left col-12" alt="...">
					</div>

					<div class="col-4 sobre-nos__imagens-content">
						<img src="<?= Yii::getAlias('@web') ?>/imagens/instituicao-01.png" class="rounded float-left col-12" alt="...">
					</div>
				</div>
				<div class="row">
					<div class="col-4 sobre-nos__imagens-content">
						<img src="<?= Yii::getAlias('@web') ?>/imagens/instituicao-01.png" class="rounded float-left col-12" alt="...">
					</div>

					<div class="col-4 sobre-nos__imagens-content">
						<img src="<?= Yii::getAlias('@web') ?>/imagens/instituicao-01.png" class="rounded float-left col-12" alt="...">
					</div>

					<div class="col-4 sobre-nos__imagens-content">
						<img src="<?= Yii::getAlias('@web') ?>/imagens/instituicao-01.png" class="rounded float-left col-12" alt="...">
					</div>
				</div>
			</div>
		</div>

		<div class="time col-lg-6 col-md-10 mx-auto text-center">
			<h3 class="style-text-primary style-color-blue-02">time</h3>
			<br>

			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet magna sagittis, posuere tellus vitae, laoreet turpis. Integer sollicitudin ut est a pretium.
			</p>

			<div class="row">
				<div class="time-pessoa col col-lg-3 col-sm-6 col-md-3">
					<div class="time-content" style="background:url('<?= Yii::getAlias('@web') ?>/imagens/instituicao-01.png');">
						<div class="time-img">
						</div>

						<div class="degrade"></div>

						<div class="time__funcao">
							<p>
								<b>Loren ipun</b>
								<br>
								<span>Função</span>
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
								<b>Loren ipun</b>
								<br>
								<span>Função</span>
							</p>
						</div>
					</div>
				</div>

				<div class="time-pessoa col col-lg-3 <col-sm-6></col-sm-6> col-md-3">
					<div class="time-content" style="background:url('<?= Yii::getAlias('@web') ?>/imagens/instituicao-01.png');">
						<div class="time-img">
						</div>

						<div class="degrade"></div>

						<div class="time__funcao">
							<p>
								<b>Loren ipun</b>
								<br>
								<span>Função</span>
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
								<b>Loren ipun</b>
								<br>
								<span>Função</span>
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="time-pessoa col col-lg-3 col-sm-6 col-md-3">
					<div class="time-content" style="background:url('<?= Yii::getAlias('@web') ?>/imagens/instituicao-01.png');">
						<div class="time-img">
						</div>

						<div class="degrade"></div>

						<div class="time__funcao">
							<p>
								<b>Loren ipun</b>
								<br>
								<span>Função</span>
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
								<b>Loren ipun</b>
								<br>
								<span>Função</span>
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
								<b>Loren ipun</b>
								<br>
								<span>Função</span>
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
								<b>Loren ipun</b>
								<br>
								<span>Função</span>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

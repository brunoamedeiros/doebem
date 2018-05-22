<?php

/* @var $this \yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$modelLogin = $this->params['modelLogin'];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="home-banner">
	<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
		<a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>">
			<img src="imagens/logo.png" alt="">
		</a>

		<?php if (!Yii::$app->user->isGuest): ?>
			<div class="float-right style-color-white">
           Olá, <?= Yii::$app->user->identity->username; ?>
			</div>

				<?=
        Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Sair',
            ['class' => 'radius-5 btn mb-2 style-btn-line-white animation-style float-right']
        )
        . Html::endForm()
				?>

		<?php else: ?>

			<button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#">
							Home<span class="sr-only">(current)</span>
						</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#">Instituições parceiras</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#">Sobre nós</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#">Time</a>
					</li>
				</ul>

	      <?php $form = ActiveForm::begin([
	          'id' => 'login-form',
	          'layout' => 'horizontal',
	          'options' => [
	              'class' => 'form-inline logar',
	          ],
	          'fieldConfig' => [
	              'template' => "{input}",
	              'options' => [
	                  'class' => 'form-group'
	              ]
	          ],
	      ]);

	      ?>

				<div class="mx-sm-0 mb-2">
	        <?= $form->field($modelLogin, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Login']) ?>
				</div>

				<div class="mx-sm-2 mb-2">
	        <?= $form->field($modelLogin, 'password')->passwordInput(['placeholder' => 'Senha']) ?>
				</div>

        <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary mb-2 style-btn-primary animation-style', 'name' => 'login-button']) ?>

        <?php ActiveForm::end(); ?>
			<?php endif; ?>

	</nav>
</div>

<?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

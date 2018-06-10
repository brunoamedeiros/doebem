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
			<img src="<?= Yii::getAlias('@web') ?>/imagens/logo.png" alt="">
		</a>

		<?php if (!Yii::$app->user->isGuest): ?>
			<div class="float-right style-color-white">
				Olá, <?= Yii::$app->user->identity->nome; ?>
        <?= Html::a('Painel Administrativo', ['doacao/index'], ['class' => 'radius-5 ml-3 btn btn-sm mb-2 style-btn-line-white animation-style']) ?>
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
          <li class="nav-item">
            <a class="nav-link" href="#instituicoes-parceiras">Instituições parceiras</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#sobre-nos">Sobre nós</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#equipe">Equipe</a>
          </li>
        </ul>

        <?= \app\widgets\Login\Login::widget() ?>

			<?php endif; ?>

	</nav>
</div>

<?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

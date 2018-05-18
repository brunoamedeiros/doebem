<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
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

<?php if (!Yii::$app->user->isGuest): ?>

	<div class="home-banner">
		<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
			<a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>">
				<img src="imagens/logo.png" alt="">
			</a>

<!--			<div class="float-right style-color-white">-->
            <?php  //Yii::$app->user->identity->username; ?>
<!--			</div>-->


				<?=
        Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Sair',
            ['class' => 'radius-5 btn mb-2 style-btn-line-white animation-style float-right']
        )
        . Html::endForm()
				?>

		</nav>
	</div>

	<?php endif; ?>

<?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

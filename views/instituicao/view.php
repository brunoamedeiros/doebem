<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Instituicao */

$this->title = $model->nome;
?>
<div class="col-lg-7 col-md-11 mx-auto content">
    <div class="perfil col-12 p0">  
        <div class="float-left sobre-nos__imagens-content">
	            <img src="<?= Yii::getAlias('@web') ?>/uploads/<?= $model->imagem ?>" class="rounded float-left" alt="..." width="100px">
        </div>  

        <div class="instituicao-nome">
            <h3 class="style-text-primary style-color-blue-02 m-0"><?= $model->nome ?></h3>
	          <small>CNPJ: <?= $model->cnpj ?></small>
        </div>
    </div>

    <div class="instituicao-sobre  clear-both p0">
        <h4 class="style-text-secondary style-color-blue-03 margin-bottom-20">
            Sobre Nós
        </h4>

        <p>
            <?= $model->descricao ?>
        </p>
    </div>

    <div class="nossos-projetos p0 clear-both">
        <h4 class="style-text-secondary style-color-blue-03 margin-bottom-20">
            Nossos projetos
        </h4>

        <?php if(sizeof($projetosModel) > 0): ?>
            <?php foreach ($projetosModel as $proj): ?>
                <div class="col-12 media clear-both align-items-center mt-3">
                    <div class="md-auto col-lg-2 col-md-3 col-sm-12 hoverflow-hidden">
                        <img class="mr-3 nosso-projeto__img mx-auto" src="<?= Yii::getAlias('@web') ?>/uploads/<?= $proj->imagem_perfil ?>" alt="<?= $proj->titulo ?>" width="100px">
                    </div>

                    <div class="media-body col-lg-9 col-md-9 col-sm-12 float-left">
                        <h5 class="mt-0">
                            <b>
                                <?= $proj->titulo ?>
                            </b>
                        </h5>                       

		                    <a href="<?= \yii\helpers\Url::to(['doacao/view', 'id' => $proj->id_doacao]) ?>" class="style-btn-line col-3 text-center">
			                    Conheça!
		                    </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>
            Nenhum projeto cadastrado até o momento.
            </p>
        <?php endif;?>
    </div>

    <div class="instituicao-infos col-12 p0 clear-both mt-3">
        <h4 class="style-text-secondary style-color-blue-03 margin-bottom-20">
            Como nos achar
        </h4>

        <div class="infos-detalhes col-lg-6 col-md-6 col-sm-12 p0 float-left">
            <p>
                <i class="material-icons">place</i>
                <?= $model->endereco ?> - <?= $model->bairro ?>
                <input type="hidden" id="endereco" value="<?= $model->endereco ?> - <?= $model->bairro ?>" />
            </p>

            <p>
                <i class="material-icons">phone</i>
                <?= $model->telefone ?>
            </p>

            <p>
                <i class="material-icons">email</i>
	              <a href="mailto:<?= $model->email ?>"><?= $model->email ?></a>
            </p>

            <?php if(!empty($model->facebook)): ?>
                <p>
                <img src="<?= Yii::getAlias('@web') ?>/imagens/facebook.png" width="20px">
                    <a target="_blank" href="http://www.facebook.com/<?= $model->facebook ?>">
                        Facebook
                    </a>
                </p>
            <?php endif; ?>

            <?php if(!empty($model->instagram)): ?>
                <p>
                    <img src="<?= Yii::getAlias('@web') ?>/imagens/isntagram.png" width="20px">
                    <a target="_blank" href="http://www.instagram.com/<?= $model->instagram ?>">
                        Instagram
                    </a>
                </p>
            <?php endif; ?>

            <?php if(!empty($model->twitter)): ?>
                <p>
                    <img src="<?= Yii::getAlias('@web') ?>/imagens/twitter.png" width="20px">
                    <a target="_blank" href="http://www.twitter.com/<?= $model->twitter ?>">
                        Twitter
                    </a>
                </p>
            <?php endif; ?>

            <?php if(!empty($model->youtube)): ?>
                <p>
                    <img src="<?= Yii::getAlias('@web') ?>/imagens/youtube.png" width="20px">
                    <a  target="_blank" href="http://www.youtube.com/<?= $model->youtube ?>">
                        Youtube
                    </a>
                </p>
            <?php endif; ?>
        </div>

        <div class="infos-local col-lg-6 col-md-6 col-sm-12 float-right p0" id="mapa">
        </div>

        <div class="clear-both"></div>
    </div>
</div>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdJhOdrdEwE6DMR3frHLUlp3vxqjnaldc&callback=initMap">
</script>

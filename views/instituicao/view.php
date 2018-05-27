<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Instituicao */

$this->title = 'Visualizar dados';
?>
<div class="col-lg-7 col-md-11 mx-auto content">
<div class="perfil col-12 p0">
    <div class="float-left sobre-nos__imagens-content">
        <img src="<?= Yii::getAlias('@web') ?>/uploads/<?= $model->imagem ?>" class="rounded float-left" alt="..." width="100px">
    </div>  

    <div class="instituicao-nome">
        <h3 class="style-text-primary style-color-blue-02"><?= $model->nome ?></h3>
    </div>
</div>

<div class="instituicao-sobre  clear-both p0">
    <h4 class="style-text-primary style-color-blue-03 margin-bottom-20">
        Sobre Nós
    </h4>

    <p>
        <?= $model->descricao ?>
    </p>
</div>

<div class="nossos-projetos p0 clear-both">
    <h4 class="style-text-primary style-color-blue-03 margin-bottom-20">
        Nossos projetos
    </h4>

    <?php if(sizeof($projetosModel) > 0): ?>
        <?php foreach ($projetosModel as $proj): ?>
            <div class="col-12 media clear-both">
                <div class="md-auto col-lg-2 col-md-3 col-sm-12 hoverflow-hidden">
                    <img class="mr-3 nosso-projeto__img mx-auto" src="<?= Yii::getAlias('@web') ?>/uploads/<?= $proj->imagem_perfil ?>" alt="Generic placeholder image" width="100px">
                </div>

                <div class="media-body col-lg-9 col-md-9 col-sm-12 float-left">
                    <h5 class="mt-0">
                        <b>
                            <?= $proj->titulo ?>
                        </b>
                    </h5>

                    <?= $proj->descricao ?>
                </div>

                <a href="<?= \yii\helpers\Url::to(['doacao/view', 'id_doacao' => $proj->id_doacao, 'id_instituicao' => $proj->id_instituicao]) ?>" class="style-btn-line col-3 margin-top-50 text-center">
                    Conheça-nos
                </a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>
        Nenhum projeto cadastrado até o momento.
        </p>
    <?php endif;?>
</div>

<div class="instituicao-infos col-12 p0 clear-both">
    <h4 class="style-text-primary style-color-blue-03 margin-bottom-20">
        Como nos achar
    </h4>

    <div class="infos-detalhes col-lg-6 col-md-6 col-sm-12 p0 float-left">
        <p>
            <i class="material-icons">place</i> <?= $model->endereco ?>
        </p>

        <p>
            <i class="material-icons">phone</i> <?= $model->telefone ?>
        </p>

        <p>
            <i class="material-icons">email</i> <?= $model->email ?>
        </p>

        <?php if(sizeof($redesSociais) > 0): ?>
            <p>...</p>
        <?php endif;?>
    </div>

    <div class="infos-local col-lg-6 col-md-6 col-sm-12 float-right">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3506.9740252873767!2d-49.02335288492086!3d-28.480328882478148!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x952142f303127973%3A0x88b99e946a08dd5b!2sUnisul+-+Universidade+do+Sul+de+Santa+Catarina!5e0!3m2!1spt-BR!2sbr!4v1527435358595" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>

    <div class="clear-both"></div>
</div>
</div>

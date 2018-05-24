<div class="col-lg-7 col-md-11 mx-auto content">
    <div class="perfil col-12 p0">
        <div class="float-left sobre-nos__imagens-content">
            <img src="<?= Yii::getAlias('@web') ?>/uploads/<?= $instituicao->imagem ?>" class="rounded float-left" alt="..." width="100px">
        </div>

        <div class="instituicao-nome">
            <h3 class="style-text-primary style-color-blue-02"><?= $instituicao->nome ?></h3>
        </div>
    </div>

    <div class="instituicao-sobre  clear-both p0">
        <h4 class="style-text-primary style-color-blue-03 margin-bottom-20">
            Sobre Nós
        </h4>

        <p>
            <?= $instituicao->descricao ?>
        </p>
    </div>

    <div class="nossos-projetos p0 clear-both">
        <h4 class="style-text-primary style-color-blue-03 margin-bottom-20">
            Nossos projetos
        </h4>

        <div class="col-12 media clear-both">
            <div class="md-auto col-lg-2 col-md-3 col-sm-12 hoverflow-hidden">
                <img class="mr-3 nosso-projeto__img mx-auto" src="../public/imagens/instituicao-01.png" alt="Generic placeholder image" width="100px">
            </div>

            <div class="media-body col-lg-9 col-md-9 col-sm-12 float-left">
                <h5 class="mt-0">Media heading</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>

            <button class="style-btn-line col-3 margin-top-50">
                Ver mais
            </button>
        </div>
    </div>

    <div class="instituicao-infos col-12 p0 clear-both">
        <h4 class="style-text-primary style-color-blue-03 margin-bottom-20">
            Como nos achar
        </h4>

        <div class="infos-detalhes col-lg-6 col-md-6 col-sm-12 p0 float-left">
            <p>
                <i class="material-icons">place</i> <?= $instituicao->endereco ?>
            </p>

            <p>
                <i class="material-icons">phone</i> <?= $instituicao->telefone ?>
            </p>

            <p>
                <i class="material-icons">email</i> <?= $instituicao->email ?>
            </p>

            <p>facebook.com/loren</p>
        </div>

        <div class="infos-local col-lg-6 col-md-6 col-sm-12 float-right">
        </div>

        <div class="clear-both"></div>
    </div>
</div>
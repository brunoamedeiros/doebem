<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Instituições';

?>

<main class="container p-3">
	<div class="col-lg-10 content mx-auto">
		<div class="row mt-3">
			<div class="col-10">
				<h3 class="style-text-primary style-color-blue-02">
					<?= Html::encode($this->title) ?>
				</h3>
			</div>

			<div class="col-2">
				<?= Html::a('Adicionar nova', ['create'], ['class' => 'btn style-btn-line radius-5 btn-sm float-right']) ?>
			</div>
		</div>

    <?php Pjax::begin(); ?>

      <?= GridView::widget([
          'dataProvider' => $dataProvider,
          'options' => [
          		'class'=>'col-sm-12 table-responsive p0'
            ],
          'tableOptions' => [
              'class' => 'table table-sm mt-3 table-striped',
          ],

          'columns' => [
              'id_instituicao',
              'nome',
              'email:email',
            //'telefone',
            //'endereco',
            //'bairro',
            //'cep',
            //'login',
            //'senha',
            //'imagem',
            //'video',
            //'perfil',
            //'vinculo_api',

              ['class' => 'yii\grid\ActionColumn'],
          ],
      ]); ?>
	</div>

  <?php Pjax::end(); ?>
</main>

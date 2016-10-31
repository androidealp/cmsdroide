<?php
	use \app\_adm\components\widgets\maps\Maps;
	use yii\widgets\ListView;
	use yii\helpers\Html;

	$enderecosbd = $model->enderecos;
	$markers = [];

	if($enderecosbd){
	    foreach ($enderecosbd as $k => $end) {
	      $markers[] = [
	        'lat'=>$end->lat,
	        'lng'=>$end->long,
	        'title'=>$end->bairro,
	        'infoWindow'=>[
	          'content'=>'<p>'.$end->logradouro.', '.$end->numero.', '.$end->bairro.', '.$end->cidade.', '.$end->estado.' </p>'
	        ]
	      ];
	    }
	}

	$provider = new yii\data\ArrayDataProvider([
	    'allModels' => $enderecosbd,
	    'pagination' => [
	        'pageSize' => 10,
	    ],
	]);
 ?>

<h2><?php echo $model->titulo. " - " .$model->cod_lpu."<a href='#'' class='btn-sm btn-danger pull-right' data-toggle='modal' data-target='#ModalAceitarLPU'>Aceitar LPU</a>";  ?></h2>
<h5>Data de publicação: <?php echo $model->dt_publicacao;  ?></h5>

<div class="row">

	<div class="col-md-6">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Descrição</h3>
			</div>
			<div class="box-body">
			<?php echo $model->descricao ?>
			<h3 class="box-title">Serviços</h3>
			<?php
				$listServico = $model->ServicosList();
				$listahtml = [];

					foreach ($model->servicos as $cv => $servico) {
						if(isset($listServico[$servico])){
							$listahtml[] = '<span class="btn btn-info btn-flat btn-xs">'.$listServico[$servico].'</span>';
						}
					}
					echo implode(' ',$listahtml);
			?>
				<h3 class="box-title">Condições</h3>
				<?php echo $model->condicoes ?>

				<h3 class="box-title">Arquivos para download</h3>

					<?php foreach ($model->docs_anexo as $key => $value) : ?>
							<a target="_blank" href="<?php echo $value; ?>" class="btn btn-social btn-bitbucket">
			                    <i class="fa fa-caret-square-o-down"></i> Fazer download
			                </a>
					<?php endforeach; ?>

			</div>
		</div>

		</div>

	<div class="col-md-6">

<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Endereços cadastrado</h3>
			</div>
			<div class="box-body">

				 <?php

			        echo  ListView::widget([
			              'dataProvider' => $provider,
			              'options' => [
			                  'tag' => 'ul',
			                  'class' => 'todo-list',
			                  'id' => 'list-enderecos',
			              ],
			              'itemOptions'=>[
			                'tag'=>'li',
			                'class'=>'',
			              ],
			              'itemView' => '_listaenderecos',
			              'emptyTextOptions'=>[
			                'tag' => 'li',
			                'class' => '',
			                'id' => 'end_vazio',
			              ],
			              'pager' => [
						        'firstPageLabel' => 'first',
						        'lastPageLabel' => 'last',
						        'nextPageLabel' => 'next',
						        'prevPageLabel' => 'previous',

						    ],
			              'emptyText'=>'<span class="text">Nenhum endereço cadastrado nesta lpu</span>',
			              'layout'=>'{items}{pager}{summary}'
			          ]);

   				?>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="box box-danger">
	    <div class="box-header with-border">
	      <h3 class="box-title">Lista de endereço</h3>
	    </div><!-- /.box-header -->
	    <div class="box-body">
	    	  <?=Maps::widget([
	              'markers'=>$markers,
	              'jsfunction'=>'js:$(document).on("click","[data-latlong]",function(e){
	                e.preventDefault();
	                maps_cord = $(this).data("latlong");
	                map.setCenter(maps_cord.lat, maps_cord.long);
	                map.setZoom(17);

	              });'
	            ]);
	          ?>
	    </div>
	    <!-- form start -->
	</div>
	</div>

</div>

<div class="modal fade" id="ModalAceitarLPU" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Aceitação de LPU</h4>
      </div>
      <div class="modal-body">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

        <p><h3>Arquivos para aceite</h3></p>
        <?php foreach ($model->docs_anexo as $key => $value) : ?>
							<a href="#<?php echo $value; ?>" class="btn btn-social btn-bitbucket">
			                    <i class="fa fa-caret-square-o-down"></i> Fazer download
			                </a>
		<?php endforeach; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Aceitar</button>
      </div>
    </div>
  </div>
</div>

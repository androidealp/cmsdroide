<<<<<<< HEAD
<?php
use \app\_adm\components\widgets\actionsbox\ActionsBox;
use yii\widgets\Pjax;
$listthemes = $jsonfileLayout->getFile();
$countli = 0;
$countcontent = 0;

?>
<!-- {formulário} -->
<div class="row">
  <div class="col-md-12">

    <?php if($jsonfileLayout::$editavel): ?>
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">Themas.json</h3>
        </div>
        <div class="panel-body">
          <p class="text-success">O arquivo json é totalmente editável</p>
        </div>
      </div>
    <?php else:?>
      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title">Themas.json</h3>
        </div>
        <div class="panel-body">
          <p class="text-danger">
            O arquivo json não tem permissão de escrita
          </p>
        </div>
      </div>
    <?php endif; ?>
    <?php //$this->render('_tema_form',['modeljson'=>$modeljson]);?>
  </div>
</div>
<!-- {/formulário} -->

<?php Pjax::begin(['id'=>'list-themes']); ?>
<div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <?php  foreach ($listthemes  as $area=>$themes):?>

                 <li class="<?=($countli==0)?'active':''?>"><a href="#tab_<?=$countli;?>" data-toggle="tab"><?=$area;?></a></li>

                 <?php $countli++; ?>
                <?php endforeach;?>
                <!--
              <li class="active"><a href="#tab_1" data-toggle="tab">Tab 1</a></li>
              <li><a href="#tab_2" data-toggle="tab">Tab 2</a></li>
              <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
                -->
            </ul>
            <div class="tab-content">

                <?php  foreach ($listthemes  as $area=>$themes):?>

                        <div class="tab-pane <?=($countcontent==0)?'active':''?>" id="tab_<?=$countcontent;?>">

                        <div class="row">

                              <!-- bloco md-4-->
                            <?php foreach ($themes as $theme => $params):?>
                              <?php
                              $checkErrors = $jsonfileLayout->checkFolderTheme($area,$theme);

                              ?>
                            <div class="col-md-4">
                           <div class="box box-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header <?=($params['default'])?'bg-green-active':'bg-info';?>">
                                  <h3 class="widget-user-username"><?=$theme;?> </h3>
                                  <h5 class="widget-user-desc"><?=$params['layout'];?></h5>

                                </div>

                                  <?php
                                  $loadsvg = Yii::getAlias('@app/web/temas/'.$theme.'/icon.svg');
                                  if (file_exists($loadsvg)): ?>
                                    <div class="widget-user-image">
                                      <img class="img-circle" src="temas/<?=$theme;?>/icon.svg" alt="<?=$theme;?>" />
                                    </div>
                                  <?php endif;?>

                                <div class="box-footer">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="description-block">
                                        <ul class="nav nav-stacked text-left">
                                          <li><a href="#">Layouts customizados: <span class="pull-right badge bg-blue"><?=(isset($params['pages']))?count($params['pages']):0;?></span></a></li>

                                            <li>
                                              <a href="#">Layout:
                                              <?php if($params['default']):?>
                                                <span class="pull-right badge bg-blue"><i class="fa fa-star"></i>
                                              <?php else:?>
                                                <span class="pull-right badge bg-grey"><i class="fa fa-circle-o"></i>
                                              <?php endif;?>
                                              </a>
                                              </li>
                                              <li>
                                                <?php if(count($checkErrors['error'])):?>
                                                  <a href="#" data-btalert="<?=implode('<br />',$checkErrors['error']);?>" title="Erros encontrados">
                                                <?php else:?>
                                                  <a href="#">
                                                <?php endif;?>

                                                  Erros Encontrados:
                                                  <?php if(count($checkErrors['error'])):?>
                                                   <span class="pull-right badge bg-red"><?=count($checkErrors['error'])?> <i class="fa fa-exclamation"></i> </span>
                                                 <?php else: ?>
                                                 <span class="pull-right badge bg-green">Nenhum</span>
                                               <?php endif;?>
                                                </a>
                                              </li>

                                          <li>
                                            <?php if(count($checkErrors['warning'])):?>
                                              <a href="#" data-btalert="<?=implode('<br />',$checkErrors['warning']);?>" title="Alertas encontrados">
                                            <?php else:?>
                                              <a href="#">
                                            <?php endif;?>
                                            Alertas Encontrados:
                                            <?php
                                              if(count($checkErrors['warning'])):
                                             ?>
                                             <span class="pull-right badge bg-yellow"><?=count($checkErrors['warning'])?> <i class="fa fa-warning"></i> </span>
                                           <?php else: ?>
                                              <span class="pull-right badge bg-green">Nenhum</span>
                                            <?php endif;?>
                                                </a>
                                          </li>
                                          <?php if(count($checkErrors['error'])):?>
                                            <button  data-btalert="Foram detectados erros criticos, que precisam ser resolvidos antes de editar o tema." title="Edição indisponivel" class="btn btn-block btn-danger" type="button" name="button"><?='Editar '.$theme; ?></button>
                                            <?php else:?>
                                            <!-- action box -->
                                                 <?=ActionsBox::widget(['buttons'=>[
                                                    'custom'=>[
                                                        'text'=>'<span class="fa fa-edit"></span> Editar',
                                                        'params'=>[
                                                          'data-btedturl'=>'index.php?r=_adm/confmanager/editartema&area='.$area.'&theme='.$theme,
                                                          'data-formid'=>'form-themejson',
                                                          'data-pajaxid'=>'list-themes',
                                                          'class'=>'btn btn-block btn-info',
                                                          'title'=>'Editar '.$theme,
                                                        ]
                                                    ]
                                                 ]]); ?>
                                            <!-- fim action box -->
                                            <?php endif;?>

                                          </li>

                                        </ul>

                                      </div>
                                      <!-- /.description-block -->
                                    </div>
                                  </div>
                                  <!-- /.row -->
                                </div>
                              </div>
                            </div>
                          <?php endforeach;?>
                            <!-- /bloco  md-4 -->
                            <!-- lista dos não definidos-->
                            <?php
                            $listNaoAplicados =  $jsonfileLayout->DistinctFolderList($area);
                            if($listNaoAplicados):
                            ?>
                             <div class="col-md-4">
                                <div class="box">
                                      <div class="box-header with-border">
                                        <h3 class="box-title">Layout localizados</h3>
                                      </div>
                                      <!-- /.box-header -->
                                      <div class="box-body">
                                        <table class="table table-bordered">
                                          <tbody><tr>
                                            <th>Nome</th>
                                            <th>Edicao</th>
                                          </tr>
                                          <?php foreach ($listNaoAplicados as $k => $theme): ?>
                                            <?php
                                            $checkErrors = $jsonfileLayout->checkFolderTheme($area,$theme);
                                             ?>
                                          <tr>
                                            <td><?=$theme;?></td>
                                            <td>
                                              <?php if(count($checkErrors['error'])):?>
                                                <?php

                                                  $checkErrors['error'] = '<div class="alert alert-danger"><div><i class="fa fa-exclamation text-danger"></i> Erro Crítico:</div> '.implode('<br/>',$checkErrors['error']).'</div>';
                                                  if(count($checkErrors['warning'])){
                                                      $checkErrors['warning'] =  '<div class="alert alert-warning"><div><i class="fa fa-warning text-warning"></i> Alertas:</div> '.implode('<br/>',$checkErrors['warning']).'</div>';
                                                  }
                                                 ?>
                                                <button  data-btalert='<p>Foram detectados erros criticos, que precisam ser resolvidos antes de editar o tema.</p> <?=implode('<br/>',$checkErrors)?>' title="Edição indisponivel" class="btn btn-xs btn-danger" type="button" name="button"><span class="fa fa-edit"></span></button>
                                                <?php else:?>
                                                <!-- action box -->
                                                     <?=ActionsBox::widget(['buttons'=>[
                                                        'custom'=>[
                                                            'text'=>'<span class="fa fa-edit"></span>',
                                                            'params'=>[
                                                              'data-btedturl'=>'index.php?r=_adm/confmanager/editartema&area='.$area.'&theme='.$theme,
                                                              'data-formid'=>'form-themejson',
                                                              'data-pajaxid'=>'list-themes',
                                                              'class'=>'btn btn-xs btn-info',
                                                              'title'=>'Editar '.$theme,
                                                            ]
                                                        ]
                                                     ]]); ?>
                                                <!-- fim action box -->
                                                <?php endif;?>
                                            </td>
                                          </tr>
                                          <?php endforeach;?>
                                          </tbody>
                                        </table>
                                      </div>
                                </div>
                              </div>
                            <?php endif;?>
                            <!-- /lista dos não definidos -->
                        </div>
                      </div>
                <?php $countcontent++; ?>
                <?php endforeach;?>

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>
<?php Pjax::end(); ?>
=======
<?php
use \app\_adm\components\widgets\actionsbox\ActionsBox;
use yii\widgets\Pjax;
$listthemes = $jsonfileLayout->getFile();
$countli = 0;
$countcontent = 0;

?>
<!-- {formulário} -->
<div class="row">
  <div class="col-md-12">

    <?php if($jsonfileLayout::$editavel): ?>
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">Themas.json</h3>
        </div>
        <div class="panel-body">
          <p class="text-success">O arquivo json é totalmente editável</p>
        </div>
      </div>
    <?php else:?>
      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title">Themas.json</h3>
        </div>
        <div class="panel-body">
          <p class="text-danger">
            O arquivo json não tem permissão de escrita
          </p>
        </div>
      </div>
    <?php endif; ?>
    <?php //$this->render('_tema_form',['modeljson'=>$modeljson]);?>
  </div>
</div>
<!-- {/formulário} -->

<?php Pjax::begin(['id'=>'list-themes']); ?>
<div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <?php  foreach ($listthemes  as $area=>$themes):?>

                 <li class="<?=($countli==0)?'active':''?>"><a href="#tab_<?=$countli;?>" data-toggle="tab"><?=$area;?></a></li>

                 <?php $countli++; ?>
                <?php endforeach;?>
                <!--
              <li class="active"><a href="#tab_1" data-toggle="tab">Tab 1</a></li>
              <li><a href="#tab_2" data-toggle="tab">Tab 2</a></li>
              <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
                -->
            </ul>
            <div class="tab-content">

                <?php  foreach ($listthemes  as $area=>$themes):?>

                        <div class="tab-pane <?=($countcontent==0)?'active':''?>" id="tab_<?=$countcontent;?>">

                        <div class="row">

                              <!-- bloco md-4-->
                            <?php foreach ($themes as $theme => $params):?>
                              <?php
                              $checkErrors = $jsonfileLayout->checkFolderTheme($area,$theme);

                              ?>
                            <div class="col-md-4">
                           <div class="box box-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header <?=($params['default'])?'bg-green-active':'bg-info';?>">
                                  <h3 class="widget-user-username"><?=$theme;?> </h3>
                                  <h5 class="widget-user-desc"><?=$params['layout'];?></h5>

                                </div>

                                  <?php
                                  $loadsvg = Yii::getAlias('@app/web/temas/'.$theme.'/icon.svg');
                                  if (file_exists($loadsvg)): ?>
                                    <div class="widget-user-image">
                                      <img class="img-circle" src="temas/<?=$theme;?>/icon.svg" alt="<?=$theme;?>" />
                                    </div>
                                  <?php endif;?>

                                <div class="box-footer">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="description-block">
                                        <ul class="nav nav-stacked text-left">
                                          <li><a href="#">Layouts customizados: <span class="pull-right badge bg-blue"><?=(isset($params['pages']))?count($params['pages']):0;?></span></a></li>

                                            <li>
                                              <a href="#">Layout:
                                              <?php if($params['default']):?>
                                                <span class="pull-right badge bg-blue"><i class="fa fa-star"></i>
                                              <?php else:?>
                                                <span class="pull-right badge bg-grey"><i class="fa fa-circle-o"></i>
                                              <?php endif;?>
                                              </a>
                                              </li>
                                              <li>
                                                <?php if(count($checkErrors['error'])):?>
                                                  <a href="#" data-btalert="<?=implode('<br />',$checkErrors['error']);?>" title="Erros encontrados">
                                                <?php else:?>
                                                  <a href="#">
                                                <?php endif;?>

                                                  Erros Encontrados:
                                                  <?php if(count($checkErrors['error'])):?>
                                                   <span class="pull-right badge bg-red"><?=count($checkErrors['error'])?> <i class="fa fa-exclamation"></i> </span>
                                                 <?php else: ?>
                                                 <span class="pull-right badge bg-green">Nenhum</span>
                                               <?php endif;?>
                                                </a>
                                              </li>

                                          <li>
                                            <?php if(count($checkErrors['warning'])):?>
                                              <a href="#" data-btalert="<?=implode('<br />',$checkErrors['warning']);?>" title="Alertas encontrados">
                                            <?php else:?>
                                              <a href="#">
                                            <?php endif;?>
                                            Alertas Encontrados:
                                            <?php
                                              if(count($checkErrors['warning'])):
                                             ?>
                                             <span class="pull-right badge bg-yellow"><?=count($checkErrors['warning'])?> <i class="fa fa-warning"></i> </span>
                                           <?php else: ?>
                                              <span class="pull-right badge bg-green">Nenhum</span>
                                            <?php endif;?>
                                                </a>
                                          </li>
                                          <?php if(count($checkErrors['error'])):?>
                                            <button  data-btalert="Foram detectados erros criticos, que precisam ser resolvidos antes de editar o tema." title="Edição indisponivel" class="btn btn-block btn-danger" type="button" name="button"><?='Editar '.$theme; ?></button>
                                            <?php else:?>
                                            <!-- action box -->

                                                 <?=ActionsBox::widget(['buttons'=>[
                                                    'custom'=>[
                                                        'text'=>'<span class="fa fa-edit"></span> Editar',
                                                        'params'=>[
                                                          'data-btedturl'=>\yii\helpers\Url::to(['confmanager/editartema','area'=>$area,'theme'=>$theme]),
                                                          //'data-btedturl'=>'index.php?r=_adm/confmanager/editartema&area='.$area.'&theme='.$theme,
                                                          'data-formid'=>'form-themejson',
                                                          'data-pajaxid'=>'list-themes',
                                                          'class'=>'btn btn-block btn-info',
                                                          'title'=>'Editar '.$theme,
                                                        ]
                                                    ]
                                                 ]]); ?>
                                            <!-- fim action box -->
                                            <?php endif;?>

                                          </li>

                                        </ul>

                                      </div>
                                      <!-- /.description-block -->
                                    </div>
                                  </div>
                                  <!-- /.row -->
                                </div>
                              </div>
                            </div>
                          <?php endforeach;?>
                            <!-- /bloco  md-4 -->
                            <!-- lista dos não definidos-->
                            <?php
                            $listNaoAplicados =  $jsonfileLayout->DistinctFolderList($area);
                            if($listNaoAplicados):
                            ?>
                             <div class="col-md-4">
                                <div class="box">
                                      <div class="box-header with-border">
                                        <h3 class="box-title">Layout localizados</h3>
                                      </div>
                                      <!-- /.box-header -->
                                      <div class="box-body">
                                        <table class="table table-bordered">
                                          <tbody><tr>
                                            <th>Nome</th>
                                            <th>Edicao</th>
                                          </tr>
                                          <?php foreach ($listNaoAplicados as $k => $theme): ?>
                                            <?php
                                            $checkErrors = $jsonfileLayout->checkFolderTheme($area,$theme);
                                             ?>
                                          <tr>
                                            <td><?=$theme;?></td>
                                            <td>
                                              <?php if(count($checkErrors['error'])):?>
                                                <?php

                                                  $checkErrors['error'] = '<div class="alert alert-danger"><div><i class="fa fa-exclamation text-danger"></i> Erro Crítico:</div> '.implode('<br/>',$checkErrors['error']).'</div>';
                                                  if(count($checkErrors['warning'])){
                                                      $checkErrors['warning'] =  '<div class="alert alert-warning"><div><i class="fa fa-warning text-warning"></i> Alertas:</div> '.implode('<br/>',$checkErrors['warning']).'</div>';
                                                  }
                                                 ?>
                                                <button  data-btalert='<p>Foram detectados erros criticos, que precisam ser resolvidos antes de editar o tema.</p> <?=implode('<br/>',$checkErrors)?>' title="Edição indisponivel" class="btn btn-xs btn-danger" type="button" name="button"><span class="fa fa-edit"></span></button>
                                                <?php else:?>
                                                <!-- action box -->
                                                     <?=ActionsBox::widget(['buttons'=>[
                                                        'custom'=>[
                                                            'text'=>'<span class="fa fa-edit"></span>',
                                                            'params'=>[
                                                              'data-btedturl'=>'index.php?r=_adm/confmanager/editartema&area='.$area.'&theme='.$theme,
                                                              'data-formid'=>'form-themejson',
                                                              'data-pajaxid'=>'list-themes',
                                                              'class'=>'btn btn-xs btn-info',
                                                              'title'=>'Editar '.$theme,
                                                            ]
                                                        ]
                                                     ]]); ?>
                                                <!-- fim action box -->
                                                <?php endif;?>
                                            </td>
                                          </tr>
                                          <?php endforeach;?>
                                          </tbody>
                                        </table>
                                      </div>
                                </div>
                              </div>
                            <?php endif;?>
                            <!-- /lista dos não definidos -->
                        </div>
                      </div>
                <?php $countcontent++; ?>
                <?php endforeach;?>

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>
<?php Pjax::end(); ?>
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535

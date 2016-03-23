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
                                                <a href="#">
                                                  Detect Errors:
                                                  <?php
                                                    if(count($checkErrors['error'])):
                                                   ?>
                                                   <span class="pull-right badge bg-danger"><i class="fa fa-exclamation"></i></span>
                                                 <?php endif; ?>
                                                 <?php
                                                   if(count($checkErrors['warning'])):
                                                  ?>
                                                  <span class="pull-right badge bg-warning"><i class="fa fa-warning"></i></span>
                                                <?php endif; ?>
                                                </a>
                                                <li>

                                          <li>
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
                                          <?php foreach ($listNaoAplicados as $k => $area): ?>
                                          <tr>
                                            <td><?=$area;?></td>
                                            <td><button class="btn btn-xs btn-info"><span class="fa fa-edit"></span></button></td>
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

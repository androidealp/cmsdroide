<?php
use yii\bootstrap\ActiveForm;
$this->title = 'Instalador Droide';
$editavelreturn = [];
if ($editavel) {
  $editavelreturn = [
    'type'=>'success',
    'msn'=>'Este arquivo é totalmente editável, após a instalação mudar para leitura'
  ];
}else{
  $editavelreturn = [
    'type'=>'danger',
    'msn'=>'Este arquivo Não é editável, esta instalação poderá não ser bem sucedida, após instalar o banco editar manualmente o arquivo db'
  ];
}

?>

<div class="container">
  <div class="page-header">
    <h1> Instalador <small>CMS Droide</small></h1>
  </div>
<div class="row">
<div class="col-md-6">
  <div class="panel panel-<?=$editavelreturn['type'];?>">
    <div class="panel-heading">
      <h3 id="title" class="panel-title">Arquivo config/DB</h3>
    </div>
    <div class="panel-body">
      <?=$editavelreturn['msn'];?>

      <div id="returnsend"></div>
    </div>
  </div>

  <?php
  $form = ActiveForm::begin([
      'id'=>'form-install',
      'layout' => 'default',
      'fieldConfig' => [
          'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
          'horizontalCssClasses' => [
              'label' => 'col-sm-3',
              'offset' => 'col-sm-offset-4',
              'wrapper' => 'col-sm-8',
              'error' => '',
              'hint' => '',
          ],
      ],
  ]);

  ?>

<?=$form->field($model, 'host')->textInput(['class'=>'form-control','placeholder'=>'Host, geralmente localhost']); ?>

<?=$form->field($model, 'banco')->textInput(['class'=>'form-control','placeholder'=>'Nome do banco de dados']); ?>

<?=$form->field($model, 'user')->textInput(['class'=>'form-control','placeholder'=>'Usuário do banco']); ?>

<?=$form->field($model, 'pass')->passwordInput(['class'=>'form-control','placeholder'=>'Senha do banco']); ?>

<?=$form->field($model, 'charset')->textInput(['class'=>'form-control','placeholder'=>'Charset geralmente utf8']); ?>

  <a data-install="configurar" href="#form-install" class="btn btn-default">Instalar</a>

<?php ActiveForm::end(); ?>


</div>
</div>

</div>



<script type="text/javascript">

  $(document).ready(function(){

  function ajax(serealize){

      $.ajax({
        url:'index.php?r=instalador/default/ajaxinstall',
        data:serealize,
        method:'post',
        dataType:'json',
        async: false,
        beforeSend:function(){
          $('#title').html('Processo de instalação');
        },
        onprogress:function(e){
          if (e.lengthComputable) {
          console.log(e.loaded / e.total * 100 + '%');
          }
        },
        error:function(jqx, st, error){
            console.log('jqx: '+jqx+' st: '+st+' error: '+error);
        }
      }).done(function(data){
        if(data.error){
          $('#returnsend').html('<div class="alert alert-danger">'+data.msn+'</div>');
        }else{
          $('#returnsend').html('<div class="alert alert-success">'+data.msn+'</div>');
        }
      });

    }

    $('[data-install]').on('click',function(e){
      e.preventDefault();
      button = $(this);
      Serializar = $(button.attr('href')).serializeArray();
      Exec = button.data('install');
      ajax(Serializar);

/*
var data = [];
for (var i = 0; i < 100000; i++) {
    var tmp = [];
    for (var i = 0; i < 100000; i++) {
        tmp[i] = 'hue';
    }
    data[i] = tmp;
};
$.ajax({
    xhr: function () {
        var xhr = new window.XMLHttpRequest();
        xhr.upload.addEventListener("progress", function (evt) {
            if (evt.lengthComputable) {
                var percentComplete = evt.loaded / evt.total;
                console.log(percentComplete);
                $('.progress').css({
                    width: percentComplete * 100 + '%'
                });
                if (percentComplete === 1) {
                    $('.progress').addClass('hide');
                }
            }
        }, false);
        xhr.addEventListener("progress", function (evt) {
            if (evt.lengthComputable) {
                var percentComplete = evt.loaded / evt.total;
                console.log(percentComplete);
                $('.progress').css({
                    width: percentComplete * 100 + '%'
                });
            }
        }, false);
        return xhr;
    },
    type: 'POST',
    url: "/echo/html",
    data: data,
    success: function (data) {}
});
*/



    });


  });



  /*
http://www.binarytides.com/monitor-progress-long-running-php-scripts-html5-server-sent-events/

  */
</script>

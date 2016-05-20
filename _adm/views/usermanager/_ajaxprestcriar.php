<?php
use yii\bootstrap\ActiveForm;

?>


<?php
$form = ActiveForm::begin([
    'id'=>'form-usersave',
    'layout' => 'horizontal',
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
<div id="erros">
</div>

<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
             <li class="active"><a href="#tab_1-1" data-toggle="tab" aria-expanded="true">Cadastrar Acesso</a></li>
             <li class=""><a href="#tab_2-2" data-toggle="tab" aria-expanded="false">Dados do Prestador</a></li>
             <li><a href="#tab_2-3" data-toggle="tab" aria-expanded="false">Endereço do Prestador</a></li>
           </ul>
           <div class="tab-content">
             <div class="tab-pane active" id="tab_1-1">
               <div class="form-group">
               <?= $form->field($model, 'status_prestador_id')->dropDownList($model->getListStatusPrest(),['class'=>'form-control']); ?>
               </div>

               <div class="form-group">
               <?= $form->field($model, 'nome')->textInput(['class'=>'form-control','placeholder'=>'Nome do usário']);?>
               </div>

               <div class="form-group">
               <?= $form->field($model, 'cnpj')->widget(\yii\widgets\MaskedInput::className(), [
                 'mask'=>'99.999.999/9999-99',
                 'options'=>[
                     'class'=>'form-control','placeholder'=>'Informe o CNPJ da Empresa'
                 ]
               ]);?>
               </div>

               <div class="form-group">
               <?= $form->field($model, 'email')->textInput(['class'=>'form-control', 'placeholder'=>'E-mail para acesso']);?>
               </div>

               <div class="form-group">
               <?= $form->field($model, 'senha')->passwordInput(['class'=>'form-control', 'placeholder'=>'Digite a senha']);?>
               </div>
               <div class="form-group">
                 <?=$form->field($model,'redefinir_senha')->passwordInput([
                   'class'=>'form-control', 'placeholder'=>'Digite a senha novamente'
                 ]); ?>
               </div>
             </div>
             <!-- /.tab-pane -->
             <div class="tab-pane" id="tab_2-2">
               <div class="form-group">
                 <?=$form->field($cadastro, 'empresa')->textInput(['class'=>'form-control', 'placeholder'=>'Nome da empresa']);?>
               </div>
               <div class="form-group">
                 <?=$form->field($cadastro, 'pessoa_contato')->textInput(['class'=>'form-control', 'placeholder'=>'Nome do responsável para contato']);?>
               </div>
               <div class="form-group">
                 <?=$form->field($cadastro, 'inscricao_estadual')->textInput(['class'=>'form-control', 'placeholder'=>'Inscrição estadual']);?>
               </div>
               <div class="form-group">
                 <?=$form->field($cadastro, 'telefone_1')->widget(\yii\widgets\MaskedInput::className(), [
                   'mask' => ['(99) 9999-9999','(99) 99999-9999'],
                   'clientOptions'=>[
                       'keepStatic'=>true
                   ],
                   'options'=>[
                       'class'=>'form-control', 'placeholder'=>'Telefone para contato'
                   ]
                 ]);?>
               </div>
               <div class="form-group">

                 <?=$form->field($cadastro, 'telefone_2')->widget(\yii\widgets\MaskedInput::className(), [
                   'mask' => ['(99) 9999-9999','(99) 99999-9999'],
                   'clientOptions'=>[
                       'keepStatic'=>true
                   ],
                   'options'=>[
                       'class'=>'form-control', 'placeholder'=>'Telefone para contato'
                   ]
                 ]);?>

               </div>

               <div class="form-group">
                 <?=$form->field($cadastro, 'descricao')->textArea(['class'=>'form-control', 'placeholder'=>'Uma breve descrição sobre o prestador']);?>
               </div>

             </div>
             <!-- /.tab-pane -->
             <div class="tab-pane" id="tab_2-3">
               <div class="" id="info-cep">

               </div>

               <div>
                 <?=$form->field($cadastro, 'cep')->widget(\yii\widgets\MaskedInput::className(),[
                 'mask' => '99999-999',
                 'options'=>['class'=>'form-control','id'=>'cep']
               ]);?>
               </div>
               <div><?=$form->field($cadastro, 'logradouro')->textInput(['class'=>'form-control ','id'=>'logradouro']);?></div>
               <div><?=$form->field($cadastro, 'numero')->textInput(['class'=>'form-control','id'=>'numero']);?></div>
               <div><?=$form->field($cadastro, 'bairro')->textInput(['class'=>'form-control','id'=>'bairro']);?></div>
               <div><?=$form->field($cadastro, 'cidade')->textInput(['class'=>'form-control','id'=>'cidade']);?></div>
               <div><?=$form->field($cadastro, 'estado')->dropDownList($cadastro->EstadoList(),['class'=>'form-control','id'=>'estado']); ?></div>

               <script type="text/javascript">
                 $(document).ready(function(){
                   $('#cep').on('blur',function(e){
                     cep = $(this).val();
                     if(cep != ''){
                       $.ajax({
                         url:"<?=\yii\helpers\Url::to(['lpus/ajaxcorreios']);?>",
                         method:"POST",
                         dataType:'json',
                         data:{'cep':cep},
                         beforeSend:function(){
                           $('#info-cep').html('<p id="alert-cep" class="alert alert-info">Aguarde....</p>');
                         },
                         success:function(data){
                           data = jQuery.parseJSON(data);
                           $('#logradouro').val(data.logradouro);
                           $('#bairro').val(data.bairro);
                           $('#cidade').val(data.localidade);
                           $('#estado').val(data.uf);
                           $('#alert-cep').remove();

                         }
                       });
                     } //fim do if

                   });
                 });
               </script>

             </div>
             <!-- /.tab-pane -->

           </div>
           <!-- /.tab-content -->
         </div>









<?php ActiveForm::end(); ?>

<?php
$form = ActiveForm::begin([
    'id'=>'form-usersave',
    'layout' => 'horizontal',
    'options' => ['enctype' => 'multipart/form-data'],
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
<?= $form->errorSummary([$model,$cadastro],['class'=>'alert alert-danger']); ?>

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
     <li class="active"><a href="#tab_1-1" id="tab-1" data-toggle="tab" aria-expanded="true">Cadastrar Acesso</a></li>
     <li class=""><a href="#tab_2-2" data-toggle="tab" id="tab-2" aria-expanded="false">Dados do Prestador</a></li>
     <li><a href="#tab_2-3" data-toggle="tab" id="tab-3" aria-expanded="false">Endereço do Prestador</a></li>
    </ul>
           <div class="tab-content">
             <div class="tab-pane active" id="tab_1-1">
               <?= $form->field($model, 'nome')->textInput(['class'=>'form-control','placeholder'=>'Nome do usário']);?>
               <?= $form->field($model, 'email')->textInput(['class'=>'form-control', 'placeholder'=>'E-mail para acesso']);?>
               <?= $form->field($model, 'senha')->passwordInput(['class'=>'form-control', 'placeholder'=>'Digite a senha']);?>
               <?=$form->field($model,'redefinir_senha')->passwordInput([
                 'class'=>'form-control', 'placeholder'=>'Digite a senha novamente'
               ]); ?>

               <div class="form-group">
                  <a href="#" class="btn btn-primary btn-sm pull-right" data-tabnext="#tab-2">Próximo</a>
               </div>
             </div>
               <!--FIM DA TAB-->

             <div class="tab-pane" id="tab_2-2">

               <?php
                echo $form->field($cadastro, 'servicos')->widget(Select2::classname(),[
                 'data'=>$cadastro->ServicosList(),
                 'language' => 'pt-BR',
                 'options' => ['placeholder' => 'Selecione o seu tipo de serviço','multiple' => true],
                 'pluginOptions' => [
                     'allowClear' => true
                 ],
               ]);
               ?>

              <?=$form->field($cadastro, 'empresa')->textInput(['class'=>'form-control', 'placeholder'=>'Nome da empresa']);?>
               <?= $form->field($model, 'cnpj')->widget(\yii\widgets\MaskedInput::className(), [
                 'mask'=>'99.999.999/9999-99',
                 'options'=>[
                     'class'=>'form-control','placeholder'=>'Informe o CNPJ da Empresa'
                 ]
               ]);?>


                 <?=$form->field($cadastro, 'pessoa_contato')->textInput(['class'=>'form-control', 'placeholder'=>'Nome do responsável para contato']);?>
                 <?=$form->field($cadastro, 'inscricao_estadual')->textInput(['class'=>'form-control', 'placeholder'=>'Inscrição estadual']);?>
                 <?=$form->field($cadastro, 'telefone_1')->widget(\yii\widgets\MaskedInput::className(), [
                   'mask' => ['(99) 9999-9999','(99) 99999-9999'],
                   'clientOptions'=>[
                       'keepStatic'=>true
                   ],
                   'options'=>[
                       'class'=>'form-control', 'placeholder'=>'Telefone para contato'
                   ]
                 ]);?>
                 <?=$form->field($cadastro, 'telefone_2')->widget(\yii\widgets\MaskedInput::className(), [
                   'mask' => ['(99) 9999-9999','(99) 99999-9999'],
                   'clientOptions'=>[
                       'keepStatic'=>true
                   ],
                   'options'=>[
                       'class'=>'form-control', 'placeholder'=>'Telefone para contato'
                   ]
                 ]);?>
                 <?=$form->field($cadastro, 'descricao')->textArea(['class'=>'form-control', 'placeholder'=>'Uma breve descrição sobre o prestador']);?>

                 <div class="">
                   <p class="text-danger">
                     Atenção você possui um limite de 50 arquivos para upload, as extensões permitidas são PDF, JPG, PNG.
                     Para selecionar multiplos arquivos precione o CTRL do teclado.
                   </p>
                 </div>

                 <?= $form->field($cadastro, 'arq_uploads[]')->fileInput(['multiple' => true, 'accept' => 'image/jpeg,image/png,application/pdf']) ?>

                 <div class="form-group">
                   <a href="#" class="btn btn-primary btn-sm pull-right" data-tabnext="#tab-3">Próximo</a>
                   <a href="#" class="btn btn-primary btn-sm pull-right margin-right" data-tabnext="#tab-1">Anterior</a>

                 </div>
             </div>
             <!--FIM DA TAB-->
             <div class="tab-pane" id="tab_2-3">
               <div class="" id="info-cep"></div>
                 <?=$form->field($cadastro, 'cep')->widget(\yii\widgets\MaskedInput::className(),[
                 'mask' => '99999-999',
                 'options'=>['class'=>'form-control','id'=>'cep']
               ]);?>
               <?=$form->field($cadastro, 'logradouro')->textInput(['class'=>'form-control ','id'=>'logradouro']);?>
               <?=$form->field($cadastro, 'numero')->textInput(['class'=>'form-control','id'=>'numero']);?>
               <?=$form->field($cadastro, 'bairro')->textInput(['class'=>'form-control','id'=>'bairro']);?>
               <?=$form->field($cadastro, 'cidade')->textInput(['class'=>'form-control','id'=>'cidade']);?>
               <?=$form->field($cadastro, 'estado')->dropDownList($cadastro->EstadoList(),['class'=>'form-control','id'=>'estado']); ?>

               <div class="form-group">
                 <?=Html::submitButton('Enviar', ['class'=>'btn btn-danger btn-sm pull-right']); ?>
                 <a href="#" class="btn btn-primary btn-sm pull-right margin-right" data-tabnext="#tab-2">Anterior</a>
               </div>

             </div>
              <!--FIM DA TAB-->
           </div>
           <!-- /.tab-content -->
         </div>
         <!-- /.nav-tabs-custom -->

         <script type="text/javascript">
           $(document).ready(function(){

             $('[data-tabnext]').on('click',function(e){
               e.preventDefault();
               elementotab = $(this).data('tabnext');
               console.log(elementotab);
               $(elementotab).tab('show');
             });

             $('#cep').on('blur',function(e){
               cep = $(this).val();
               if(cep != ''){
                 $.ajax({
                   url:"<?=\yii\helpers\Url::to(['institucional/ajaxcorreios']);?>",
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
<?php ActiveForm::end(); ?>
<?php endif; ?>

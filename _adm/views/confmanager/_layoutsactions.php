<?php
//print_r($modeljson->pages);
 ?>
<?php foreach ($modeljson->pages as $k => $value): ?>
  <div class="form-group">
    <?=$form->field($modeljson, 'page_action['.$k.']')->textInput(['class'=>'form-control', 'placeholder'=>'path da action']);?>
    <?=$form->field($modeljson, 'page_layout['.$k.']')->textInput(['class'=>'form-control', 'placeholder'=>'arquivo php do layout ex: main']);?>
    <a href="#" class="btn btn-danger btn-xs">deletar</a>
  </div>

<?php endforeach; ?>

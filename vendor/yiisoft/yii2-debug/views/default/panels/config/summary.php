<<<<<<< HEAD
<?php
/* @var $panel yii\debug\panels\ConfigPanel */
?>
<div class="yii-debug-toolbar-block">
    <a href="<?= $panel->getUrl() ?>">
        Yii
        <span class="label"><?= $panel->data['application']['yii'] ?></span>
        PHP
        <span class="label"><?= $panel->data['php']['version'] ?></span>
    </a>
</div>
=======
<?php
/* @var $panel yii\debug\panels\ConfigPanel */
?>
<div class="yii-debug-toolbar__block">
    <a href="<?= $panel->getUrl() ?>">
        <span class="yii-debug-toolbar__label"><?= $panel->data['application']['yii'] ?></span>
        PHP
        <span class="yii-debug-toolbar__label"><?= $panel->data['php']['version'] ?></span>
    </a>
</div>
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535

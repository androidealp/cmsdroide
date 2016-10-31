<<<<<<< HEAD
<?php
/* @var $panel yii\debug\panels\AssetPanel */
if (!empty($panel->data)):
?>
<div class="yii-debug-toolbar-block">
    <a href="<?= $panel->getUrl() ?>" title="Number of asset bundles loaded">Asset Bundles <span class="label label-info"><?= count($panel->data) ?></span></a>
</div>
<?php endif; ?>
=======
<?php
/* @var $panel yii\debug\panels\AssetPanel */
if (!empty($panel->data)):
?>
<div class="yii-debug-toolbar__block">
    <a href="<?= $panel->getUrl() ?>" title="Number of asset bundles loaded">Asset Bundles <span class="yii-debug-toolbar__label yii-debug-toolbar__label_info"><?= count($panel->data) ?></span></a>
</div>
<?php endif; ?>
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535

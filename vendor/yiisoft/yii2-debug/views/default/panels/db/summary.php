<<<<<<< HEAD
<?php
/* @var $panel yii\debug\panels\DbPanel */
/* @var $queryCount integer */
/* @var $queryTime integer */
?>
<?php if ($queryCount): ?>
<div class="yii-debug-toolbar-block">
    <a href="<?= $panel->getUrl() ?>" title="Executed <?= $queryCount ?> database queries which took <?= $queryTime ?>.">
        <?= $panel->getSummaryName() ?> <span class="label label-info"><?= $queryCount ?></span> <span class="label"><?= $queryTime ?></span>
    </a>
</div>
<?php endif; ?>
=======
<?php
/* @var $panel yii\debug\panels\DbPanel */
/* @var $queryCount integer */
/* @var $queryTime integer */
?>
<?php if ($queryCount): ?>
<div class="yii-debug-toolbar__block">
    <a href="<?= $panel->getUrl() ?>" title="Executed <?= $queryCount ?> database queries which took <?= $queryTime ?>.">
        <?= $panel->getSummaryName() ?> <span class="yii-debug-toolbar__label yii-debug-toolbar__label_info"><?= $queryCount ?></span> <span class="yii-debug-toolbar__label"><?= $queryTime ?></span>
    </a>
</div>
<?php endif; ?>
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535

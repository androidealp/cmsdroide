<<<<<<< HEAD
<?php
/* @var $panel yii\debug\panels\MailPanel */
/* @var $mailCount integer */
if ($mailCount): ?>
<div class="yii-debug-toolbar-block">
    <a href="<?= $panel->getUrl() ?>">Mail <span class="label"><?= $mailCount ?></span></a>
</div>
<?php endif ?>
=======
<?php
/* @var $panel yii\debug\panels\MailPanel */
/* @var $mailCount integer */
if ($mailCount): ?>
<div class="yii-debug-toolbar__block">
    <a href="<?= $panel->getUrl() ?>">Mail <span class="yii-debug-toolbar__label"><?= $mailCount ?></span></a>
</div>
<?php endif ?>
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535

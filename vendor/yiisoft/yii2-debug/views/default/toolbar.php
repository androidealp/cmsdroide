<<<<<<< HEAD
<?php
/* @var $this \yii\web\View */
/* @var $panels \yii\debug\Panel[] */
/* @var $tag string */
/* @var $position string */

use yii\helpers\Url;

$minJs = <<<EOD
document.getElementById('yii-debug-toolbar').style.display = 'none';
document.getElementById('yii-debug-toolbar-min').style.display = 'block';
if (window.localStorage) {
    localStorage.setItem('yii-debug-toolbar', 'minimized');
}
EOD;

$maxJs = <<<EOD
document.getElementById('yii-debug-toolbar-min').style.display = 'none';
document.getElementById('yii-debug-toolbar').style.display = 'block';
if (window.localStorage) {
    localStorage.setItem('yii-debug-toolbar', 'maximized');
}
EOD;

$firstPanel = reset($panels);
$url = $firstPanel->getUrl();
?>
<div id="yii-debug-toolbar" class="yii-debug-toolbar-<?= $position ?> hidden-print">
    <div class="yii-debug-toolbar-block title">
        <a href="<?= Url::to(['index']) ?>">
            <img width="29" height="30" alt="" src="<?= \yii\debug\Module::getYiiLogo() ?>">
            Yii Debugger
        </a>
    </div>

    <?php foreach ($panels as $panel): ?>
        <?= $panel->getSummary() ?>
    <?php endforeach; ?>
    <span class="yii-debug-toolbar-toggler" onclick="<?= $minJs ?>">›</span>
</div>
<div id="yii-debug-toolbar-min" class="hidden-print">
    <a href="<?= $url ?>" title="Open Yii Debugger" id="yii-debug-toolbar-logo">
        <img width="29" height="30" alt="" src="<?= \yii\debug\Module::getYiiLogo() ?>">
    </a>
    <span class="yii-debug-toolbar-toggler" onclick="<?= $maxJs ?>">‹</span>
</div>
=======
<?php
/* @var $this \yii\web\View */
/* @var $panels \yii\debug\Panel[] */
/* @var $tag string */
/* @var $position string */

use yii\helpers\Url;

$firstPanel = reset($panels);
$url = $firstPanel->getUrl();

?>
<div id="yii-debug-toolbar" class="yii-debug-toolbar yii-debug-toolbar_position_<?= $position ?>">
    <div class="yii-debug-toolbar__bar">
        <div class="yii-debug-toolbar__block yii-debug-toolbar__title">
            <a href="<?= Url::to(['index']) ?>">
                <img width="29" height="30" alt="" src="<?= \yii\debug\Module::getYiiLogo() ?>">
            </a>
        </div>

        <?php foreach ($panels as $panel): ?>
            <?= $panel->getSummary() ?>
        <?php endforeach; ?>

        <a class="yii-debug-toolbar__external" href="#" target="_blank">
            <span class="yii-debug-toolbar__external-icon"></span>
        </a>

        <span class="yii-debug-toolbar__toggle">
            <span class="yii-debug-toolbar__toggle-icon"></span>
        </span>
    </div>

    <div class="yii-debug-toolbar__view">
        <iframe src="about:blank" frameborder="0"></iframe>
    </div>
</div>
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535

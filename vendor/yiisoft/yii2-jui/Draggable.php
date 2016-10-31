<<<<<<< HEAD
<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\jui;

use yii\helpers\Html;

/**
 * Draggable renders an draggable jQuery UI widget.
 *
 * For example:
 *
 * ```php
 * Draggable::begin([
 *     'clientOptions' => ['grid' => [50, 20]],
 * ]);
 *
 * echo 'Draggable contents here...';
 *
 * Draggable::end();
 * ```
 *
 * @see http://api.jqueryui.com/draggable/
 * @author Alexander Kochetov <creocoder@gmail.com>
 * @since 2.0
 */
class Draggable extends Widget
{
    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        echo Html::beginTag('div', $this->options) . "\n";
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        echo Html::endTag('div') . "\n";
        $this->registerWidget('draggable');
    }
}
=======
<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\jui;

use yii\helpers\Html;

/**
 * Draggable renders an draggable jQuery UI widget.
 *
 * For example:
 *
 * ```php
 * Draggable::begin([
 *     'clientOptions' => ['grid' => [50, 20]],
 * ]);
 *
 * echo 'Draggable contents here...';
 *
 * Draggable::end();
 * ```
 *
 * @see http://api.jqueryui.com/draggable/
 * @author Alexander Kochetov <creocoder@gmail.com>
 * @since 2.0
 */
class Draggable extends Widget
{
    /**
     * @inheritdoc
     */
    protected $clientEventMap = [
        'create' => 'dragcreate',
        'drag' => 'drag',
        'stop' => 'dragstop',
        'start' => 'dragstart',
    ];


    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        echo Html::beginTag('div', $this->options) . "\n";
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        echo Html::endTag('div') . "\n";
        $this->registerWidget('draggable');
    }
}
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535

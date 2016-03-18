<?php
namespace app\_adm\models;

use Yii;
use yii\base\Model;

/**
 *
 */
class ThemeJson extends  Model
{
    public $area;
    public $tema;
    public $default=false;
    public $layout;
    public $pages =[];
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['area', 'tema','default','layout'], 'required'],
        ];
    }
}

 ?>

<?php
namespace  app\models;

use Yii;
use yii\base\NotSupportedException;
use app\components\helpers\ModelHelper;

/**
 *
 */
class  Estados extends  ModelHelper
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%estados}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

          [['nome'], 'required'],
          [['nome'], 'string', 'max'=>45],
          [['id'], 'integer'],
        ];
    }
}

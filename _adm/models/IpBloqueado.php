<?php

namespace app\_adm\models;

use Yii;
use app\_adm\components\helpers\ModelHelper;

/**
 *
 */
class  IpBloqueado extends  ModelHelper
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ip_bloqueado}}';
    }

    public function beforeValidate()
    {
       $this->data_acesso = date('Y-m-d H:i:s');

        return parent::beforeValidate();
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          [['id', 'ip', 'campo_login', 'data_acesso', 'hash_desative'], 'required'],
        ];
    }


    public function CheckIp()
    {
      $countBlock = IpBloqueado::find()->where(['ip'=>\Yii::$app->request->getUserIP()])->count();

      return $countBlock;
    }
}

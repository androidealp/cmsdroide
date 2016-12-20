<?php
namespace app\_adm\models;

use Yii;
use yii\base\NotSupportedException;
use app\_adm\components\helpers\ModelHelper;

/**
 *
 */
class  ListPermissoes extends  ModelHelper
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%list_permissoes}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          [['nome'], 'required'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
        ];
    }

}

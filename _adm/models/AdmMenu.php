<?php

namespace app\_adm\models;

use Yii;

/**
 * This is the model class for table "csdm_adm_menu".
 *
 * @property integer $id
 * @property string $item_nome
 * @property string $url
 * @property string $icon
 * @property integer $id_parente
 * @property integer $ordem
 * @property integer $status
 * @property integer $detectar_recurso
 */
class AdmMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
      return '{{%adm_menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_nome', 'url', 'icon', 'id_parente', 'ordem', 'status', 'detectar_recurso'], 'required'],
            [['id_parente', 'ordem', 'status', 'detectar_recurso'], 'integer'],
            [['item_nome', 'url', 'icon'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_nome' => 'Item Nome',
            'url' => 'Url',
            'icon' => 'Icon',
            'id_parente' => 'Id Parente',
            'ordem' => 'Ordem',
            'status' => 'Status',
            'detectar_recurso' => 'Detectar Recurso',
        ];
    }
}

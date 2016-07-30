<?php

namespace app\painel\models;

use Yii;

/**
 * This is the model class for table "csdm_user_menu".
 *
 * @property integer $id
 * @property integer $id_parente
 * @property string $item_nome
 * @property string $url
 * @property string $icon
 * @property integer $ordem
 * @property integer $status
 * @property integer $detectar_recurso
 */
class UserMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return '{{%user_menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_parente', 'item_nome', 'url', 'icon', 'ordem', 'status', 'detectar_recurso'], 'required'],
            [['id_parente', 'ordem', 'status', 'detectar_recurso'], 'integer'],
            [['item_nome', 'url', 'icon'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_parente' => 'Id Parente',
            'item_nome' => 'Item Nome',
            'url' => 'Url',
            'icon' => 'Icon',
            'ordem' => 'Ordem',
            'status' => 'Status',
            'detectar_recurso' => 'Detectar Recurso',
        ];
    }
}

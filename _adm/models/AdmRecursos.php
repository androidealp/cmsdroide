<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "csdm_adm_recursos".
 *
 * @property integer $id
 * @property string $nome
 * @property string $url_recurso
 * @property integer $status
 * @property string $niveis_grupos
 */
class AdmRecursos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'csdm_adm_recursos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'url_recurso', 'status', 'niveis_grupos'], 'required'],
            [['status'], 'integer'],
            [['nome', 'niveis_grupos'], 'string', 'max' => 45],
            [['url_recurso'], 'string', 'max' => 100]
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
            'url_recurso' => 'Url Recurso',
            'status' => 'Status',
            'niveis_grupos' => 'Niveis Grupos',
        ];
    }
}

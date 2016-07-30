<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "csdm_adm_emails_sys".
 *
 * @property integer $id
 * @property string $email
 * @property string $tipo_form
 */
class AdmEmailsSys extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%adm_emails_sys}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'tipo_form'], 'required'],
            [['email'], 'string', 'max' => 100],
            [['tipo_form'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'tipo_form' => 'Tipo Form',
        ];
    }
}

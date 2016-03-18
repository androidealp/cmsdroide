<?php

namespace app\_adm\models;

use Yii;

/**
 * This is the model class for table "csdm_adm_grupos".
 *
 * @property integer $id
 * @property string $nome
 * @property string $atrib_permissoes
 *
 * @property CsdmAdmUser[] $csdmAdmUsers
 */
class AdmGrupos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'csdm_adm_grupos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'atrib_permissoes'], 'required'],
            [['atrib_permissoes'], 'string'],
            [['nome'], 'string', 'max' => 45]
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
            'atrib_permissoes' => 'Atrib Permissoes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCsdmAdmUsers()
    {
        return $this->hasMany(CsdmAdmUser::className(), ['grupos_id' => 'id']);
    }
}

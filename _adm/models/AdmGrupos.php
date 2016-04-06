<?php

namespace app\_adm\models;
use app\_adm\components\helpers\ModelHelper;
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
class AdmGrupos extends ModelHelper
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'csdm_adm_grupos';
    }

    public function getPermissoes() {

        $menus = \app\_adm\models\AdmMenu::find([ 'id', 'item_nome'])
        ->where(['and','status = 1', "url <> '#'"])
        ->asArray()
        ->all();

        return yii\helpers\ArrayHelper::map($menus, 'id', 'item_nome');

    }

    public function beforeValidate()
    {
          if(count($this->atrib_permissoes)){
            $this->atrib_permissoes = json_encode($this->atrib_permissoes);
          }

        return parent::beforeValidate();
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
            'atrib_permissoes' => 'Permissões',
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

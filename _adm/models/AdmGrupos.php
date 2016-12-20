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
 * @property string $menu_permissoes
 *
 * @property CsdmAdmUser[] $csdmAdmUsers
 */
class AdmGrupos extends ModelHelper
{

  public $teste;
  public $count_users = 0;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {

      return '{{%adm_grupos}}';
    }

    public function getPermissoes() {

        $menus = \app\_adm\models\AdmMenu::find([ 'id', 'item_nome'])
        ->where(['and','status = 1'])
        ->asArray()
        ->all();

        return yii\helpers\ArrayHelper::map($menus, 'id', 'item_nome');

    }

    public function getAttributes()
    {
      $permissoes = \app\_adm\models\ListPermissoes::find(['id','nome'])->asArray()->all();
      return yii\helpers\ArrayHelper::map($permissoes, 'nome', 'nome');
    }

    public function CountUsers($id)
    {
      $count_usuarios = AdmUsuarios::find()->where(['grupos_id'=>$id])->count();

      return $count_usuarios;
    }

    public function checkUsuarios($ids)
    {
      $findUsers = AdmUsuarios::find()->where(['grupos_id'=>$ids])->count();

      return $findUsers;
    }

    public function afterFind()
    {

        $this->count_users = $this->CountUsers($this->id);



      if($this->atrib_permissoes){

        $this->atrib_permissoes = json_decode($this->atrib_permissoes,true);
      }

      if($this->menu_permissoes){
        $this->menu_permissoes = json_decode($this->menu_permissoes,true);
      }

      return parent::afterFind();
    }

    public function beforeValidate()
    {
          if(count($this->atrib_permissoes)){
            $this->atrib_permissoes = json_encode($this->atrib_permissoes);
          }

          if($this->menu_permissoes){
            $this->menu_permissoes = json_encode($this->menu_permissoes);
          }

        return parent::beforeValidate();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'menu_permissoes'], 'required'],
            [['atrib_permissoes','menu_permissoes'], 'safe'],
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
            'menu_permissoes' => 'Permissões de menus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmUsers()
    {
        return $this->hasMany(AdmUser::className(), ['grupos_id' => 'id']);
    }
}

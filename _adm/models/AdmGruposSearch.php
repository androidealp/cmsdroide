<?php

namespace app\_adm\models;

use Yii;
use yii\data\ActiveDataProvider;
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
class AdmGruposSearch extends \yii\db\ActiveRecord
{

    public $count_users = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%adm_grupos}}';
    }

    public function CountUsers($id)
    {
      $count_usuarios = AdmUsuarios::find()->where(['grupos_id'=>$id])->count();

      return $count_usuarios;
    }

    public function afterFind()
    {
      $this->count_users = $this->CountUsers($this->id);
      return parent::afterFind();

    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome','menu_permissoes'], 'required'],
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
            'atrib_permissoes' => 'Permissões de atributos',
            'menu_permissoes' => 'Permissões de menus',
            'count_users' => 'Administradores',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCsdmAdmUsers()
    {
        return $this->hasMany(CsdmAdmUser::className(), ['grupos_id' => 'id']);
    }


    public function search($params){
        $query = AdmGrupos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(
            [
              'and',
                ['like','nome',$this->nome],
            ]
                        );

        return $dataProvider;
    }

}

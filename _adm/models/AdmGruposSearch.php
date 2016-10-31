<<<<<<< HEAD
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
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
      return '{{%adm_grupos}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'atrib_permissoes','menu_permissoes'], 'required'],
            [['atrib_permissoes','menu_permissoes'], 'string'],
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
=======
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
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%adm_grupos}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'atrib_permissoes','menu_permissoes'], 'required'],
            [['atrib_permissoes','menu_permissoes'], 'string'],
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
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535

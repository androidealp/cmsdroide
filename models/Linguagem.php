<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "csdm_linguagem".
 *
 * @property integer $id
 * @property string $nome
 * @property string $tag
 * @property string $alias
 * @property integer $status
 *
 * @property CsdmCategoriasConteudo[] $csdmCategoriasConteudos
 * @property CsdmConteudo[] $csdmConteudos
 */
class Linguagem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'csdm_linguagem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'tag', 'alias', 'status'], 'required'],
            [['status'], 'integer'],
            [['nome', 'alias'], 'string', 'max' => 45],
            [['tag'], 'string', 'max' => 20]
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
            'tag' => 'Tag',
            'alias' => 'Alias',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCsdmCategoriasConteudos()
    {
        return $this->hasMany(CsdmCategoriasConteudo::className(), ['linguagem_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCsdmConteudos()
    {
        return $this->hasMany(CsdmConteudo::className(), ['linguagem_id' => 'id']);
    }
}

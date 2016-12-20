<?php
namespace app\models;
use app\components\helpers\ModelHelper;
use yii\data\ActiveDataProvider;
use Yii;

/**
 *
 */
class  RespostasHasUser extends  ModelHelper
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%respostas_has_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
      return [
        [['respostas_id', 'user_id'],'integer'],
        [['respostas_id'], 'exist', 'skipOnError' => false, 'targetClass' => Respostas::className(), 'targetAttribute' => ['respostas_id' =>'id']],
        [['user_id'], 'exist', 'skipOnError' => false, 'targetClass' => \app\painel\models\User::className(), 'targetAttribute' => ['user_id'=>'id']],
      ];
    }


    public function getRespostas()
    {
        return $this->hasMany(Respostas::className(), ['id' => 'respostas_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\painel\models\User::className(), ['id' => 'user_id']);
    }

}

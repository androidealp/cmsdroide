<?php
namespace app\models;
use app\components\helpers\ModelHelper;
use yii\data\ActiveDataProvider;
use Yii;

/**
 *
 */
class  ComentariosHasUser extends  ModelHelper
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comentarios_has_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          [['comentarios_id', 'user_id'],'integer'],
          [['comentarios_id'], 'exist', 'skipOnError' => false, 'targetClass' => Comentarios::className(), 'targetAttribute' => ['comentarios_id'=> 'id']],
          [['user_id'], 'exist', 'skipOnError' => false, 'targetClass' => \app\painel\models\User::className(), 'targetAttribute' => ['user_id'=>'id']],
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentario()
    {
        return $this->hasOne(Comentarios::className(), ['id' => 'comentarios_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\painel\models\User::className(), ['id' => 'user_id']);
    }


}

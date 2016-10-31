<<<<<<< HEAD
<?php
namespace  _adm\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;

/**
 * metodos de pagamento
 * @example url - desc
 * @author André Luiz Pereira
 */
class  AdmMethods extends  ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        
        return '{{%adm_methods}}';
    }


    public function rules()
    {
        return [
          [['nome', 'url_acesso', 'status', 'params'], 'required'],
          [['status'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome do método',
            'url_acesso' => 'Url de acesso',
            'status' => 'Status do metodo',
            'params' => 'Parametros',
        ];
    }
}
=======
<?php
namespace  _adm\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;

/**
 * metodos de pagamento
 * @example url - desc
 * @author André Luiz Pereira
 */
class  AdmMethods extends  ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%adm_methods}}';
    }


    public function rules()
    {
        return [
          [['nome', 'url_acesso', 'status', 'params'], 'required'],
          [['status'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome do método',
            'url_acesso' => 'Url de acesso',
            'status' => 'Status do metodo',
            'params' => 'Parametros',
        ];
    }
}
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535

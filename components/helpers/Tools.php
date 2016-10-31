<?php
namespace app\components\helpers;

use Yii;
use yii\base\Component;
use yii\base\ErrorException;


class Tools extends Component{

  public function Cript($id)
  {

    return rtrim(strtr(base64_encode($id), '+/', '-_'), '=');
    // $cript = Yii::$app->getSecurity()->encryptByPassword($id, Yii::$app->params['secretKeyIDS']);
    // return $cript;
  }

  public function Decript($id)
  {
    return base64_decode(str_pad(strtr($id, '-_', '+/'), strlen($id) % 4, '=', STR_PAD_RIGHT));
    // $decript = Yii::$app->getSecurity()->decryptByPassword($id, Yii::$app->params['secretKeyIDS']);
    // return $decript;
  }

}

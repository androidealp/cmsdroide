<?php
namespace app\components\helpers;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use \app\components\helpers\LayoutHelper;
/**
 * Manager main controller
 * @author André Luiz Pereira <andre@next4.com.br>
 */
class ControllerHelper extends Controller
{
    public $instalador = false;

    public function init(){
      $cookies = \Yii::$app->request->cookies;
      if($cookies->has('language'))
      {
          \Yii::$app->language = $cookies->getValue('language');
          \Yii::$app->sourceLanguage = $cookies->getValue('language');
      }

     if(file_exists(\Yii::$app->basePath.'/instalador')){
         \Yii::$app->setModules([
        'instalador'=>[
            'class'=>'app\instalador\Module',
            ]
        ]);
        $this->instalador = \Yii::$app->hasModule('instalador');
     }



        return parent::init();


    }

    public function behaviors()
    {
      $this->layout = LayoutHelper::loadThemesJson()->front();
      return [];
    }

    /**
     * Behavior for acess implement layout
     * @author André Luiz Pereira <andre@next4.com.br>
     * @return array - aceess rulers
     */
    // public function behaviors()
    // {
    //     $this->layout = LayoutHelper::loadThemesJson()->front();
    //     return [
    //         'access' => [
    //             'class' => AccessControl::className(),
    //
    //             'rules' => [
    //                 [
    //                     'allow' => true,
    //                     'roles' => ['@'],
    //                 ],
    //                 [
    //                     'allow' => true,
    //                     'actions' => ['login','cadastrar','novasenha','ajaxcorreios','gii'],
    //                     'roles' => ['?'],
    //                 ],
    //             ],
    //         ]
    //     ];
    // }

}

<?php
namespace app\components\helpers;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use \app\components\helpers\LayoutHelper;

class ControllerHelper extends Controller
{
    public $instalador = false;
    
    public function init(){
     if(file_exists(\Yii::$app->basePath.'/instalador')){
         \Yii::$app->setModules([
        'instalador'=>[
            'class'=>'app\modules\painel\Modules',
            ]
        ]);
     } 
        $this->instalador = \Yii::$app->hasModule('instalador');
        return parent::init();
    }
    public function behaviors()
    {
        $this->layout = LayoutHelper::loadThemesJson()->front();
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    
}


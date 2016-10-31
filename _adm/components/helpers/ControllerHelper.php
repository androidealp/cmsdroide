<?php
namespace app\_adm\components\helpers;
use yii\web\Controller;
use yii\filters\AccessControl;
use \app\components\helpers\LayoutHelper;

class ControllerHelper extends Controller
{



    public function behaviors()
    {

        \Yii::$app->view->params['title-page'] = 'Painel de controle';
        \Yii::$app->view->params['breadcrumbs-links'] =[
            [
            'label'=>'Gerenciar painel',
            ]
        ];
        $this->layout = LayoutHelper::loadThemesJson()->admin();

        return [
            'access' => [
                'class' => AccessControl::className(),

                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                ],
            ]
        ];
    }



}

<?php
namespace app\_adm\components\helpers;
use yii\web\Controller;
use yii\filters\AccessControl;
use \app\components\helpers\LayoutHelper;

class ControllerHelper extends Controller
{



    public function behaviors()
    {
      if(!\Yii::$app->user->isGuest)
      {
        $permissoes = \app\_adm\models\AdmGrupos::find()->select(['menu_permissoes','atrib_permissoes'])
        ->where(['id'=>\Yii::$app->user->identity->grupos_id])
        ->one();
        \Yii::$app->view->params['acoes'] = $permissoes->atrib_permissoes;
        \Yii::$app->view->params['menu'] = $permissoes->menu_permissoes;
      }else{
        \Yii::$app->view->params['acoes'] = [];
        \Yii::$app->view->params['menu'] = [];
      }




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
                        'actions' => ['login','validar-email-adm'],
                        'roles' => ['?'],
                    ],
                ],
            ]
        ];
    }



}

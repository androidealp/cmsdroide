<?php
namespace app\painel\components\helpers;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * Manager main controller
 * @author André Luiz Pereira <andre@next4.com.br>
 */
class ControllerHelper extends Controller
{
    public $instalador = false;

    public function init(){

        return parent::init();

    }

    /**
     * Behavior for acess implement layout
     * @author André Luiz Pereira <andre@next4.com.br>
     * @return array - aceess rulers
     */
    public function behaviors()
    {
        $this->layout = '@app/temas/painel/redesocial/main';


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

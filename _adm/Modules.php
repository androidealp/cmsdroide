<?php

namespace app\_adm;
use \Yii;


class Modules extends \yii\base\Module
{
    public $controllerNamespace = 'app\_adm\controllers';

    public function init()
    {
        parent::init();

        $this->defaultRoute = 'painel';
        Yii::$app->session->name = '_adminSessao';
        Yii::$app->session->savePath = __DIR__ . '/../_adm/sessions';
        Yii::$app->session->timeout= 60*20;

         Yii::$app->setComponents(
        [
            'errorHandler'=>[
                'errorAction'=>'_adm/painel/erro',
                'class'=>'yii\web\ErrorHandler',
            ],
            'user' => [
                'class' => 'yii\web\User',
                'identityClass' => 'app\_adm\models\AdmUser',
                'enableAutoLogin' => false,
                'authTimeout' => 60*20,
                'loginUrl' => Yii::$app->urlManager->createUrl(['_adm/painel/login']),
                'identityCookie' => [
                      'name' => '_adminUser', // unique for backend
                      //'path' => '/web' // correct path for backend app.
                  ]
            ],
        ]
    );


         $this->controllerMap = [
                 'elfinder' => [
                    'class' => 'mihaildev\elfinder\Controller',
                    'access' => ['@'], //глобальный доступ к фаил менеджеру @ - для авторизорованных , ? - для гостей , чтоб открыть всем ['@', '?']
                    //'disabledCommands' => ['netmount'], //отключение ненужных команд https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#commands
                    'roots' => [
                        [
                            'baseUrl'=>'@web/media',
                            'basePath'=>'@webroot/media',
                            'path' => '/',
                            'name' => 'Media Root'
                        ],
                        /*[
                            'class' => 'mihaildev\elfinder\UserPath',
                            'path'  => 'files/user_{id}',
                            'name'  => 'Meus documentos'
                        ],
                        [
                            'path' => 'files/some',
                            'name' => ['category' => 'my','message' => 'Some Name'] //перевод Yii::t($category, $message)
                        ],
                        [
                            'path'   => 'files/some',
                            'name'   => ['category' => 'my','message' => 'Some Name'], // Yii::t($category, $message)
                            'access' => ['read' => '*', 'write' => 'UserFilesAccess'] // * - для всех, иначе проверка доступа в даааном примере все могут видет а редактировать могут пользователи только с правами UserFilesAccess
                        ]*/
                    ],
                    'watermark' => [
                            'source'         => __DIR__.'/logo.png', // Path to Water mark image
                             'marginRight'    => 5,          // Margin right pixel
                             'marginBottom'   => 5,          // Margin bottom pixel
                             'quality'        => 95,         // JPEG image save quality
                             'transparency'   => 70,         // Water mark image transparency ( other than PNG )
                             'targetType'     => 'IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP', // Target image formats ( bit-field )
                             'targetMinPixel' => 200         // Target image minimum pixel size
                    ]
                ]
         ];





        // custom initialization code goes here
    }
}

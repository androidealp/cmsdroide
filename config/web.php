<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'sourceLanguage'=>'pt-br',
    'language'=>'pt-br',
    'timezone' => 'America/Sao_Paulo',
    'defaultRoute'=>'institucional',
    'modules' => [
        '_adm' => [
            'class' => 'app\_adm\Modules',

        ],
        'painel' => [
            'class' => 'app\painel\Module',
        ],
        'instalador' => [
            'class' => 'app\instalador\Module',
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'dfs@#$6545_-__dsfsfs$%',
        ],
        'BuscaCep'=>[
          'class'=>'app\components\WSCorreios'
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\painel\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['/institucional/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'institucional/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*']
    ];
}

return $config;

<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'cmsdroide',
    'name'=>'CMS-Droide',
    'version'=>'1.0',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'sourceLanguage'=>'pt-BR',
    'language'=>'pt-br',
    'timezone' => 'America/Sao_Paulo',
    'defaultRoute'=>'institucional',
    //  colocar em manutenção
    // 'catchAll' => [
    //     'institucional/manutencao',
    //     'param1' => 'value1',
    //     'param2' => 'value2',
    // ],
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
      'Tools'=>[
        'class'=>'app\components\helpers\Tools'
      ],
      'loadConteudo'=>[
        'class'=>'app\components\helpers\ConteudoHelper'
      ],
      'SendMail' =>[ // nome sugestifo, aplicado unicamente por conta de ser facilmente lembrado, porém a classe instacia o swiftmailer
        'class'=>'app\components\helpers\SendMail'
      ],
      'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => true,
        'enableStrictParsing' => false,
        // 'rules' => [
        //     [
        //       'class' => 'yii\rest\UrlRule',
        //       'pluralize'=>false,
        //       //'controller' => 'api'
        //     ],
        //  ],
      ],
      'i18n' => [
        'translations' => [
            'site*' => [
              'forceTranslation' => true,
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@app/messages',
                'sourceLanguage' => 'en-US',
                'fileMap' => [
                    'site' => 'site.php',
                    'en-US/error' => 'error.php',
                ],
            ],
        ],
    ],
      'formatter' => [
        'class' => 'yii\i18n\Formatter',
        'defaultTimeZone'=>'America/Sao_Paulo',
        'dateFormat' => 'php:d/m/Y',
        'datetimeFormat' => 'php:d/m/Y H:i:s',
        'timeFormat' => 'php:H:i:s',
        'decimalSeparator' => ',',
        'thousandSeparator' => '.',
        'currencyCode' => 'R$',
         ],
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
            'enableAutoLogin' => false,
            'authTimeout' => 60*30,
            'loginUrl' => ['/institucional/login'],
            'identityCookie' => [
                'name' => '_painelUser', // unique for backend
                //'path' => '/web' // correct path for backend app.
            ]
        ],
        'session' => [
            'timeout'=>60*30,
            'name' => '_painelSessao',
            'savePath' => __DIR__ . '/../painel/sessions',
        ],
        'errorHandler' => [
            'errorAction' => 'institucional/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath'         => '@app/mail/',
            'useFileTransport' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class'         => 'yii\log\FileTarget',
                    'levels'        => ['error','info'],
                    'categories'    => ['banco'],
                    'logFile'       => '@app/runtime/logs/banco/erros.log',
                    'maxFileSize'   => 1024 * 2,
                    'maxLogFiles'   => 100,
                ],
                [
                    'class'         => 'yii\log\FileTarget',
                    'levels'        => ['error','info'],
                    'categories'    => ['mail'],
                    'logFile'       => '@app/runtime/logs/mail/erros.log',
                    'maxFileSize'   => 1024 * 2,
                    'maxLogFiles'   => 100,
                ],
                [
                    'class'         => 'yii\log\FileTarget',
                    'levels'        => ['error','info'],
                    'categories'    => ['acesso'],
                    'logFile'       => '@app/runtime/logs/acesso/erros.log',
                    'maxFileSize'   => 1024 * 2,
                    'maxLogFiles'   => 100,
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

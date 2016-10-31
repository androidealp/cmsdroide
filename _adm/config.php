<?php
return [
    'components' => [
      'authManager' => [
          //'class' => 'yii\rbac\DbManager',
          'class' => 'yii\rbac\PhpManager',
        //  'defaultRoles' => ['guest'],
         ],
    ],
    'params' => [
        // list of parameters
    ],
];

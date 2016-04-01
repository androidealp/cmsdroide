<?php
namespace  app\instalador\models;

use Yii;
use yii\base\Model;

/**
 *
 */
class  Instalador extends  Model
{

  public $host='localhost';
  public $banco;
  public $user;
  public $pass;
  public $charset='utf8';
  Public $retorno = [];


  public function rules()
  {
      return [
          [['host', 'banco','user','pass','charset'], 'required'],
      ];
  }

  public function attributeLabels()
  {
      return [
          'host' => 'Server Host',
          'banco' => 'Banco',
          'user' => 'Usuário do banco',
          'pass' => 'Senha do banco',
          'charset' => 'charset',
      ];
  }

  public function instalar($file, $editable){
    if($editable && $this->aplicarbanco($file)){
       $this->SQLimport();
    }

    return $this->retorno;
  }


  public function aplicarbanco($file){
    $jsonPath = Yii::getAlias($file);
    $host = $this->host;
    $banco = $this->banco;
    $user = $this->user;
    $pass = $this->pass;
    $charset = $this->charset;
    $return = false;
    $data = <<<PHP
    <?php

    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=$host;dbname=$banco',
        'username' => '$user',
        'password' => '$pass',
        'charset' => '$charset',
    ];
PHP;
    $arquive = file_put_contents($jsonPath, $data, LOCK_EX);
    if($arquive){
      $this->retorno =  [
  				'error'=>0,
  				'msn'=>'Arquivo de banco salvo com sucesso',
  			];
      $return = true;

    }else{

      $this->retorno =  [
  				'error'=>1,
  				'msn'=>'Erro no processo gravar dados de acesso ao banco',
  			];
      }
      return $return;
  }

  public function SQLimport()
 {
   $file = Yii::getAlias('@app/instalador/sqlinstall/bancoandroide.sql');
   //initConnection
   $pdo = Yii::$app->getDb();
   try
   {
     if (file_exists($file))
     {
       $sqlStream = file_get_contents($file);
       $sqlStream = rtrim($sqlStream);
       $newStream = preg_replace_callback("/\((.*)\)/", create_function('$matches', 'return str_replace(";"," $$$ ",$matches[0]);'), $sqlStream);
       $sqlArray = explode(";", $newStream);
       foreach ($sqlArray as $value)
       {
         if (!empty($value))
         {
           $sql = str_replace(" $$$ ", ";", $value) . ";";
           $pdo->createCommand($sql)->execute();
         }
       }
       $this->retorno = [
   				'error'=>0,
   				'msn'=>'Banco salvo com sucesso!',
   			];

     }else{
       $this->retorno = [
   				'error'=>1,
   				'msn'=>'O arquivo não existe',
   			];
     }
   }
   catch (PDOException $e)
   {
     $this->retorno = [
        'error'=>1,
        'msn'=>print_r($e->getMessage(),true),

      ];
   }

 }
}

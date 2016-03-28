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
      return $this->SQLimport();
    }else{
      return 'error';
    }
  }


  public function aplicarbanco($file){
    $jsonPath = Yii::getAlias($file);
    $host = $this->host;
    $banco = $this->banco;
    $user = $this->user;
    $pass = $this->pass;
    $charset = $this->charset;
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
    $arquive = file_put_contents($filepath, $data, LOCK_EX);

    if($arquive){
      return true;
    }else{
      return false;
      }

  }

  public function SQLimport()
 {
   $file = Yii::getAlias('@app/instalador/sqlinstall/bancoandroide.sql');
   $pdo = Yii::app()->db->pdoInstance;
   $return = array();
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
           $pdo->exec($sql);
         }
       }
       $return[] = 'Banco inportado com sucesso!';

     }else{
       $return[] = 'O arquivo não existe';
     }
   }
   catch (PDOException $e)
   {
     $return =  $e->getMessage();
   }

   return $return;
 }
}

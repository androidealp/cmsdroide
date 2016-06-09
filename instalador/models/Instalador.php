<?php
namespace  app\instalador\models;

use Yii;
use yii\base\Model;

/**
 *
 */
class  Instalador extends  Model
{
  public $alias_substuir = 'csdm_';
  public $host='localhost';
  public $banco;
  public $user;
  public $pass;
  public $charset='utf8';
  public $retorno = [];
  public $alias = 'csdm_';
  public $parans_file = '@app/config/params.php';
  public $db_file = '@app/config/db.php';


  public function rules()
  {
      return [
        [['alias','banco','user','pass','charset','host','parans_file','db_file'], 'required'],
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
          'alias'=>'Alias',
          'parans_file'=>'Path do arquivo de parametros',
          'db_file'=>'Path do arquivo de banco',
      ];
  }


public function instalar(){

       $this->SQLimport();

    return $this->retorno;
  }


  public function aplicarRegras(){
    $jsonPath = Yii::getAlias($this->db_file);
    $pathparams = Yii::getAlias($this->parans_file);
    $host = $this->host;
    $banco = $this->banco;
    $user = $this->user;
    $pass = $this->pass;
    $charset = $this->charset;
    $alias = $this->alias;
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

$params = <<<PHP
<?php

return [
    'alias_db' => '$alias',
    'http_type'=>'http', //http, https
    'secretEmailKey'=>'sdfsdf6464sdfsd',
    'cadastro_adm_email'=>'teste@teste.net.br'
];
PHP;


    $bd = file_put_contents($jsonPath, $data, LOCK_EX);
    $arquivo_parans = file_put_contents($pathparams, $params, LOCK_EX);
    if($bd && $arquivo_parans){
      $this->retorno =  [
  				'error'=>0,
  				'msn'=>'Arquivo de banco e parametros salvos com sucesso',
  			];

    }else{

      $this->retorno =  [
  				'error'=>1,
  				'msn'=>'Erro no processo gravar dados de acesso ao banco bd = '.print_r($bd,true).' arquivo parans = '.print_r($arquivo_parans,true),
  			];
      }
      return $this->retorno;
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

           if(\Yii::$app->params['alias_db'] != $this->alias_substuir)
           {
             $sql = str_replace("csdm_", \Yii::$app->params['alias_db'], $sql);
           }

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

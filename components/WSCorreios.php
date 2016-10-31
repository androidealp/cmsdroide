<?php
namespace app\components;

use Yii;
use yii\base\Component;
use yii\helpers\Json;
use yii\base\ErrorException;
/**
 * Consulta via webservice os ceps, caso os correios estejam inativos, busca por viacep
 * @params array $urls url dos correios e doviacep
 * @author André Luiz Pereira <andre@next4.com.br>
 */
class WSCorreios extends Component
{
 public $urls = [
   'correios'=>'http://m.correios.com.br/movel/buscaCepConfirma.do',
   'viaCEP'=>'http://viacep.com.br/ws/'

 ];

/**
 * Consulta atraves das libraries
 * @author André Luiz Pereira <andre@next4.com.br>
 * @param string $cep - Cep para Consulta
 * @return mixed retorna array o json se tudo ocorrer bem
 */
 public function Consultar($cep)
 {
    $return = '';
    $correios =  $this->consulta_correios($cep);
    if($correios){
      $return = $correios;
    }else{
      $return = $this->consulta_viacep($cep);
    }
    if(empty($return)){
      $erro = array('erro'=>1);
      $return = Json::encode($erro);
    }
     return $return;
 }

 public function consulta_viacep($cep)
 {
   $cep = str_replace('-','',$cep);
   $return = '';
   if((int)$cep){
     try {
       $return = file_get_contents($this->urls['viaCEP'].$cep.'/json/');
     } catch (ErrorException $e) {
       $return = '';
     }
   }
   return $return;
 }

 public function consulta_correios($cep)
 {

   $html = $this->exec_curl($this->urls['correios'],[
            'cepEntrada'=>$cep,
            'tipoCep'=>",
            'cepTemp'=>",
            'metodo'=>'buscarCep'
          ]);

  if($html)
  {
    return $this->getBySelectors($html);
  }else{
    return '';
  }

 }

  private function exec_curl($url, $post=array(),$get=array())
  {
    $return  = '';

    try {
      $url = explode('?',$url,2);
    	if(count($url)===2){
    		$temp_get = array();
    		parse_str($url[1],$temp_get);
    		$get = array_merge($get,$temp_get);
    	}

    	$ch = curl_init($url[0]."?".http_build_query($get));
    	curl_setopt ($ch, CURLOPT_POST, 1);
    	curl_setopt ($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    	curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $return = curl_exec ($ch);

    } catch (ErrorException $e) {
      $return = '';
    }

    return $return;

  }

  /**
   * Utiliza o domdocument sobre o html
   * @author André Luiz Pereira <andre@next4.com.br>
   * @param string $html - html da pagina a ser consultada
   * @return array retorna com o arrey se tudo for corretamente
   */
  private function getBySelectors($html)
  {
    $return = '';
    try {

      $doc = new \DOMDocument( '1.0', 'UTF-8' );
      $doc->preserveWhiteSpace = false;
      $doc->validateOnParse = false;
      @$doc->loadHTML($html);
      $selector = new \DOMXPath($doc);
      $value = $selector->query( './/*[@class="respostadestaque"]' );
      $key   = $selector->query( './/*[@class="resposta"]' );
      $keys = [];
      $values = [];
      foreach( $key as $content )
      {
          foreach( $content->childNodes as $child )
          {
            $k = str_replace(':','',strtolower(trim($child->nodeValue)));

              $keys[ ] = $k;
          }
      }
      foreach( $value as $content )
      {
          foreach( $content->childNodes as $child )
          {
              $values[ ] = preg_replace( '/[\s]{2,}/', null, $child->nodeValue );
          }
      }

      $dados =array_combine( $keys, $values );

      if(array_key_exists('logradouro', $dados)){
        if(isset($dados['localidade / uf'])){
            $localidade_uf = $dados['localidade / uf'];
            $quebrar = explode('/', $localidade_uf);
            $dados['localidade'] = trim($quebrar[0]);
            $dados['uf'] = (isset($quebrar[1]))?trim($quebrar[1]):'';
        }

          $return = Json::encode($dados);
      }

    } catch (ErrorException $e) {
      $return = '';
    }

    return $return;

  }




}

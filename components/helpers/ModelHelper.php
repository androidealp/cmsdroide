<?php
namespace app\components\helpers;
use Yii;
class ModelHelper extends \yii\db\ActiveRecord{

	/**
	 * Pega os erros do model em string html ul, se existir
	 * @author André Luiz Pereira <andre@next4.com.br>
	 * @return string - retorna o html de erros se existir
	 */
public function HtmlErros(){
$mderros = $this->getErrors();
$li = array();
foreach ($mderros as $k => $mderro) {
	foreach ($mderro as $c => $erro) {
		$li[] = $erro;
	}
}

$ul = \yii\helpers\BaseHtml::ul($li,[
	'class'=>'list-unstyled',
	'item'=>function($item, $index){
		return "<li><span class='label bg-yellow margin-right'><i class='fa fa-exclamation-triangle'></i></span> ".$item."</li>";
	}
	]);

return $ul;
}

/**
 * Trata os erros em array lista
 * @author André Luiz Pereira <andre@next4.com.br>
 * @return array - retorna os erros em lista se existir
 */
public function ArrayErros(){

	$mderros = $this->getErrors();
	$lista = array();
	foreach ($mderros as $k => $mderro) {
		foreach ($mderro as $c => $erro) {
			$lista[] = $erro;
		}
	}
  return $lista;
}


/**
 * Define a diferença entre datas
 * @author André Luiz Pereira <andre@next4.com.br>
 * @param string $from - data de inicio format 0000-00-00 00:00:00
 * @param string $to - data fim format 0000-00-00 00:00:00
 * @param string $format - formato da data '%a' para dias '%m' para meses
 * @return string - retorna a data formatada
 */
public function DateDiff($from, $to, $format = '%a')
{

	//$dtinicial = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$dtinicial);
	//$dtfinal = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$dtfinal);

	$dtinicial = new \DateTime($from);
	$dtfinal = new \DateTime($to);
	$intervalo = $dtfinal->diff($dtinicial);
	if($intervalo->invert){
			return $intervalo->format($format);
	}else{
			return -$intervalo->format($format);
	}
}

/**
 * Formatar a data para salvar no banco
 * @author André Luiz Pereira <andre@next4.com.br>
 * @param string $data_form - O campo de data precisa seguir o formato 00/00/0000
 * @return string - retorna como Y-m-d H:i:s
 */
public function saveDateBD($data_form)
{
	if(strpos($data_form,'/') === false){
		throw new \yii\web\HttpException(500, 'Erro em formatar a data para salvar, não foi detectado o formato 00/00/0000');
		\Yii::error('Erro em formatar a data para salvar, não foi detectado o formato 00/00/0000' ,'banco');
	}
	$data_ajuste = str_replace('/','-',$data_form);
	return \Yii::$app->formatter->asDate($data_ajuste, 'php:Y-m-d H:i:s');
}

}

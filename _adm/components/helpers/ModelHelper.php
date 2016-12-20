<?php
namespace app\_adm\components\helpers;
use Yii;
class ModelHelper extends \yii\db\ActiveRecord{


public function HtmlErros(){
$mderros = $this->getErrors();
$li = [];
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


public function checkAcoes($acao)
{
	return in_array($acao, \Yii::$app->view->params['acoes']);
}

public function TextErros()
{
	$mderros = $this->getErrors();
	$items = [];
	foreach ($mderros as $k => $mderro) {
		foreach ($mderro as $c => $erro) {
			$items[] = $erro;
		}
	}

	return implode(', ', $items);
}

public function HasErros()
{
	$mderros = $this->getErrors();
	if(count($mderros))
	{
	 return true;
	}

	return false;
}

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
 * Verifica as dimensões exatas da imagem, deve ser executado principalemnte no rules
 * @author André Luiz Pereira <andre@next4.com.br>
 * @param string $attribute - nome da coluna de imagem
 * @param array $params - informar no array o width e height para validar
 * @return bool - retorna verdadeiro ou falseo
 */
public function ValidateDimensoes($attribute, $params)
{
	$imagem = \yii\imagine\Image::getImagine();
	$getimg = $imagem->open(\yii\helpers\Url::to('@webroot/'.$this->$attribute));
	$size = $getimg->getSize();

	if($params['width'] > $size->getWidth() || $params['height'] > $size->getHeight())
      {
				$this->addError($attribute, 'As dimensões da imagem são inferiores ao do limite exigido para: '.$attribute);
        return false;
      }

	return true;
}


/**
 * Redimenciona a Imagem se não estiver nas proporçoes desejadas
 * @author André Luiz Pereira <andre@next4.com.br>
 * @param string $image - path relativo da imagem partindo de media
 * @param int $width - largura da imagem
 * @param int $height - autura da imagem
 * @return void - Aplica na url da imagem
 */
public function resizeCheckImage($image, $width, $height)
{
	$imagem = \yii\imagine\Image::getImagine();
	$getimg = $imagem->open(\yii\helpers\Url::to('@webroot/'.$image));
	$size = $getimg->getSize();
	$WidthFinal = $size->getWidth();
  $HeightFinal = $size->getHeight();
	$crop = false;

	if($width < $size->getWidth())
  {
    $WidthFinal = $width;
    $crop = true;
  }

	if($height < $size->getHeight())
  {
    $HeightFinal = $height;
    $crop = true;
  }

	if($crop){
		$getimg->resize(new \Imagine\Image\Box($WidthFinal, $HeightFinal))->save(\yii\helpers\Url::to('@webroot/'.$image),array('flatten' => false));
	}


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

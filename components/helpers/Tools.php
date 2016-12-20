<?php
namespace app\components\helpers;

use Yii;
use yii\base\Component;
use yii\base\ErrorException;

class Tools extends Component{

  public function Cript($id)
  {

    return rtrim(strtr(base64_encode($id), '+/', '-_'), '=');
    // $cript = Yii::$app->getSecurity()->encryptByPassword($id, Yii::$app->params['secretKeyIDS']);
    // return $cript;
  }

  public function Decript($id)
  {
    return base64_decode(str_pad(strtr($id, '-_', '+/'), strlen($id) % 4, '=', STR_PAD_RIGHT));
    // $decript = Yii::$app->getSecurity()->decryptByPassword($id, Yii::$app->params['secretKeyIDS']);
    // return $decript;
  }

  /**
   * Layout para resultado em branco de listview, podendo ser usado em outros lugarems uqe usa o mesmo conceito
   * @author André Luiz Pereira <andre@next4.com.br>
   * @param string $title - Titulo do box
   * @param string $content - texto do conteúdo
   * @param Object $link - Objeto Html::a(); pré configurado para linkar ao institucional/contato
   * @return string retorna o render html para visualizar
   */
  public function LayoutEmpty($title= '', $content = '', $link = '', $layout = 'resultado_vazio')
  {
    if(!$title)
    {
      $title = 'Resultado em branco';
    }

    if(!$content)
    {
      $content = 'Ops! infelizmente não possuimos conteúdo para esta sessão, caso queira sugerir conteúdo fique a vontate em nos dar uma sugestão.';
    }

    if(!$link)
    {
      $link = \yii\helpers\Html::a('FeedBack',['institucional/contato'],['class'=>'btn btn-danger']);
    }

 return $this->renderAjax('@app/views/layouts/'.$layout,[
   'title'=>$title,
   'content'=>$content,
   'link'=>$link
 ]);

  }

  /**
   * Salva os cliques dentro da tabela conteudo
   * @author André Luiz Pereira <andre@next4.com.br>
   * @param int $id - id do conteúdo
   * @param int $hit - quantidade atual de cliques encontrados
   * @return void
   */
  public function GetClick($id,$hit)
  {
    $hit++;
    $updateHits = \Yii::$app->db->createCommand()->update('{{%conteudo}}', ['hits' =>$hit],['id'=>(int)$id])->execute();
  }



  public function ImagemProporcionalCrop($pathtoimage, $width, $height)
  {

    $imagem =\yii\imagine\Image::thumbnail(\yii\helpers\Url::to('@webroot/'.$pathtoimage), $width, $height)
    ->save(Yii::getAlias('@webroot/'.$pathtoimage), ['quality' => 80]);
  }


  public function ImagemProporcional($pathtoimage, $width, $height)
  {

    $imagem = \yii\imagine\Image::getImagine();
    $getimg = $imagem->open(\yii\helpers\Url::to('@webroot/'.$pathtoimage));
    $size = new \Imagine\Image\Box($width, $height);
    $resizeimg = $getimg->thumbnail($size, \Imagine\Image\ImageInterface::THUMBNAIL_INSET);
    $sizeR     = $resizeimg->getSize();
    $widthR    = $sizeR->getWidth();
    $heightR   = $sizeR->getHeight();
    $preserve  = $imagem->create($size);

    $startX = $startY = 0;

    if ( $widthR < $width ) {
        $startX = ( $width - $widthR ) / 2;
    }

    if ( $heightR < $height ) {
          $startY = ( $height - $heightR ) / 2;
      }

    //destino
    $preserve->paste($resizeimg, new \Imagine\Image\Point($startX, $startY))->save(\yii\helpers\Url::to('@webroot/'.$pathtoimage,['quality'=>80]));

  }


  public function resizeCheckPre($img)
  {

    //instancio o ImageInterface para recuperar todos os recursos disponiveis
    $imagem = \yii\imagine\Image::getImagine();
    //abro a imagem desejada
    $imagem_pre = $imagem->open(\yii\helpers\Url::to('@webroot/'.$img));
    //resgado as dimensoes
    $size = $imagem_pre->getSize();

      $WidthFinal = $size->getWidth();
      $HeightFinal = $size->getHeight();

        //$imagem_pre->crop(new \Imagine\Image\Point(0,0), new \Imagine\Image\Box($WidthFinal, $HeightFinal))->save();

        $imagem_pre->resize(new \Imagine\Image\Box($WidthFinal, $HeightFinal))->save(\yii\helpers\Url::to('@webroot/'.$img),array('flatten' => false));


  }


}

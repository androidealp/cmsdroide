<?php
namespace app\components\helpers;
use \Yii;
/**
 * Controla o layout para admin e frontend
 */
class LayoutHelper {

   private $defaultTema = '';
   private static $Filedata = '';
   public static $urlBase = '@app/temas/';
   public static $editavel = 0;

   /**
    * Carrega p json e verifica se o arquivo pode ser escrito
    * @return Objetct LayoutHelper
    */
    public function loadThemesJson(){
        $pathurl = Yii::getAlias(self::$urlBase.'themas.json');
        $dataFile =$this->renderFile(self::$urlBase.'themas.json');
        self::$editavel =(is_writable($pathurl))?1:0;
        self::$Filedata = json_decode($dataFile, true);

          return new LayoutHelper;
    }

    /**
     * Retorna o file em array tratdo no loadthemeasjson
     * @return array;
     */
    public function getFile(){
        return self::$Filedata;
    }

    /**
     * Converte os dados para json
     * @return string json
     */
    public function getFileJson(){
      return json_encode(self::$Filedata);
    }

    /**
     * Lista todos os diretorios que não estão definidos no json
     * @param string $folder admin/frontend/instalador
     * @return array list
     */
    public function DistinctFolderList($folder){
        $themesPath = Yii::getAlias(self::$urlBase.$folder);

        $results = scandir($themesPath);

        $list = [];
        foreach ($results as $result) {
            if ($result === '.' || $result === '..' || !is_dir($themesPath . '/' . $result)) {
                continue;
            }

            $list[] = $result;
        }

        $getListNotDefined = array();
        $listjsontemes = array();
        foreach (self::$Filedata[$folder] as $tm => $attr) {
          $listjsontemes[] = $tm;
        }
        foreach ($list as $k => $tema) {
          if(!in_array($tema, $listjsontemes)){
              $getListNotDefined[] = $tema;
          }
        }



        return   $getListNotDefined;

    }


    /**
     * retorna o layout para front
     * @return string
     */
    public function front(){

        $pagesDetect = self::detectPages('frontend',self::$Filedata['frontend']);
        return  $pagesDetect;
    }

    /**
     * retorna o layout para admin
     * @return string
     */
    public function admin(){

        $pagesDetect = self::detectPages('admin',self::$Filedata['admin']);
        return  $pagesDetect;
    }

     /**
     * retorna o layout para instalador
     * @return string
     */
    public function instalador(){

        $pagesDetect = self::detectPages('instalador',self::$Filedata['instalador']);
        return  $pagesDetect;
    }

    /**
     * insere a view do widget estilizado no tema
     * @param string $module  tipo admin / frontend / outro...
     * @param string $widget // view widget que está no html e que tenha o mesmo nome do widget
     * @return string // retorna a url da view.
     */
    public static function WidViews($widget, $module='frontend'){
        $pagesDetect = self::detectViews($module,self::$Filedata[$module],$widget);
        return  $pagesDetect;
    }

    /**
     * Detecta o layout de acordo com o action e o controller.
     * @param type $base // layout tipo admin / frontend
     * @param type $listpage // lista array onde do tipo selecionado
     * @return string // retorna a url layout.
     */
    public static function detectPages($base,$listpage){
      $defaultfolder = "";
      $defaultfile = "";
      //percorro todos os layouts definidos no xml
      foreach ($listpage as $tema => $params) {

        //pego o layout que contenha default == true
        if($params['default']){
           $defaultfolder = $tema;
           $defaultfile   = $params['layout'];
        }

        //percorro as paginas de layout default e comparo com a página atual
        if(isset($params['pages'])){
          foreach ($params['pages'] as $k => $v) {
            $correnturl = \Yii::$app->controller->id.'.'.\Yii::$app->controller->action->id;
            // verifico se apagina atual está definida no layout para novo layout
              if($k == $correnturl){
                $defaultfolder  = $tema;
                $defaultfile = $v;
              }
          }
        }

      }
      if(empty($defaultfolder) || empty($defaultfile)){
          throw new \yii\web\NotFoundHttpException("Layout Default não foi localizado.");
      }

        $Theme = self::$urlBase.$base.'/'.$defaultfolder.'/'.$defaultfile;


        return $Theme;

    }

    /**
     * Detecta visualização de widgets
     * @param type $base // layout tipo admin / frontend
     * @param type $listpage // lista array onde do tipo selecionado
     * @return string // retorna a url layout.
     */
    public static function detectViews($base,$listpage,$widget){
        $defaultfolder = "";
        $view = "";
        foreach ($listpage as $tema => $params) {
          if($params['default']){
             $view    = $base.'/'.$tema.'/htmls/'.$widget.'/';
          }

        }

        $filepath = \yii\helpers\FileHelper::findFiles('../temas/'.$view);
        $returnfile = 0;

        foreach ($filepath as $k=>$file) {
            if(basename($file, ".php") == $widget){
                $returnfile = self::$urlBase.$view.$widget;
            }
        }


        return $returnfile;
    }

}

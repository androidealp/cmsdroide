<?php
namespace app\components\helpers;
use \Yii;
/**
 * Manipulate layout
 * @author André Luiz Pereira <andre@next4.com.br>
 */
class LayoutHelper {

   private $defaultTema = '';
   private static $Filedata = '';
   public static $urlBase = '@app/temas/';
   public static $editavel = 0;

   /**
    * Load json check if is_writable
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
     * return file array loadthemeasjson
     * @return array;
     */
    public function getFile(){
        return self::$Filedata;
    }

    /**
     * Convert for json
     * @return string json
     */
    public function getFileJson(){
      return json_encode(self::$Filedata);
    }

    /**
     * Detect in folder files errors
     * @author André Luiz Pereira
     * @param string $area - área de atuação do tema admin / frontend / instalador
     * @param string $theme - Theme for verification
     * @return array - Retorna vazio se não localizar erros, caso contrario retorna os array separado por importancia error | warning
     */
    public function checkFolderTheme($area,$theme){
      $errors = array('error'=>array(),'warning'=>array());
      $themesPath = Yii::getAlias(self::$urlBase.$area.'/'.$theme);
      $filesPHP = yii\helpers\FileHelper::findFiles($themesPath,['only'=>['*.php']]);
      $filesAssets = yii\helpers\FileHelper::findFiles($themesPath,['only'=>['*Asset*']]);
      if(!count($filesPHP)){
        $errors['error'][] = "Não localizou nenhum arquivo PHP no tema $theme.";
      }

      if(!count($filesAssets)){
        $errors['error'][] = "Não localizou nenhum arquivo com a terminologia {Asset} importante para estilização no tema $theme.";
      }

      if(!is_dir($themesPath.'/htmls')){
        $errors['warning'][] = "Atenção Não localizou a pasta [htmls] dentro do tena $theme, esta pasta é utilizada para customização de components, porém isso não impede de usar o tema";
      }

      if(!is_dir($themesPath.'/depends')){
        $errors['warning'][] = "Atenção Não localizou a pasta [depends] dentro do tema $theme, esta pasta é utilizada para criar subvinculos de css, porém isso não impede de usar o tema";
      }

      return $errors;
    }

    /**
     * List directorys defined in json
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
     * Check path exits in tema
     * @author André Luiz Pereira
     * @param string $path - url desejada para checkin no tema
     * @return bool true/false
     */
    public function CheckLayoutExists($path){
      $layoutPath = Yii::getAlias(self::$urlBase.$path);

      return is_file($layoutPath) && file_exists($layoutPath);
    }


    /**
     * Return layout frontend
     * @return string
     */
    public function front(){

        $pagesDetect = self::detectPages('frontend',self::$Filedata['frontend']);
        return  $pagesDetect;
    }

    /**
     * return layout backend
     * @return string
     */
    public function admin(){

        $pagesDetect = self::detectPages('admin',self::$Filedata['admin']);
        return  $pagesDetect;
    }

     /**
     * return layout of instalador
     * @return string
     */
    public function instalador(){

        $pagesDetect = self::detectPages('instalador',self::$Filedata['instalador']);
        return  $pagesDetect;
    }

    /**
     * insert view widget view layout
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
     * detect Views layouts get url
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

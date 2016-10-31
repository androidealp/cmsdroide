<<<<<<< HEAD
<?php
namespace app\_adm\models;

use Yii;
use yii\base\Model;
use \app\components\helpers\LayoutHelper;

/**
 *
 */
class ThemeJson extends  Model
{
    public $area = "";
    public $listarea = [
      'frontend'=>'frontend',
      'admin'=>'admin',
      'instalador'=>'instalador'
    ];
    public $tema = "";
    public $default=0;
    public $layout ="";
    public $pages =[];
    public $file="";
    public $errorFiles = [];



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['area', 'tema','default','layout'], 'required'],
        ];
    }

    /**
     * Find in file and open theme
     */
    public function open($area,$theme, $file){
    $this->file = $file;

      $getparams = (isset($this->file[$area][$theme]))?$this->file[$area][$theme]:0;

      if($getparams){
        $this->area = $area;
        $this->tema = $theme;
        $this->layout = $getparams['layout'];
        $this->default = $getparams['default'];
        $this->pages = (isset($getparams['pages']))?$getparams['pages']:[];
        if(!\app\components\helpers\LayoutHelper::CheckLayoutExists($area.'/'.$theme)){
          $this->errorFiles['theme']= "O tema $theme não foi encontrado na pasta temas / admin";
        }

        if(!\app\components\helpers\LayoutHelper::CheckLayoutExists($area.'/'.$theme.'/'.$this->layout)){
          $this->errorFiles['theme']= "O tema $theme não foi encontrado na pasta temas / admin";
        }
      }

    }
    // yii\helpers\FileHelper::findFiles('.',['only'=>['*.php','*.txt']]);
    public function edit($area,$theme, $file){
       $jsonPath = Yii::getAlias('@app/temas/themas.json');
      unset($file[$area][$theme]);

      $file[$this->area][$this->tema] = [
        "default"=>$this->default,
        "layout"=>$this->layout
      ];

      if($this->default){
        foreach ($file[$this->area] as $theme => $params) {
          if($theme != $this->tema){
            $file[$this->area][$theme]['default'] = 0;
          }
        }
      }

      $filejson = json_encode($file);

      return $this->WriteFileJson($jsonPath,$filejson);
    }

    public function WriteFileJson($filepath, $data){

      $arquive = file_put_contents($filepath, $data, LOCK_EX);

      return $arquive;

    }
}

 ?>
=======
<?php
namespace app\_adm\models;

use Yii;
use yii\base\Model;
use \app\components\helpers\LayoutHelper;

/**
 *
 */
class ThemeJson extends  Model
{
    public $area = "";
    public $listarea = [
      'frontend'=>'frontend',
      'admin'=>'admin',
      'instalador'=>'instalador'
    ];
    public $tema = "";
    public $default=0;
    public $layout ="";
    public $pages =[];
    public $file="";
    public $errorFiles = [];
    public $page_action = [];
    public $page_layout = [];




    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['area', 'tema','default','layout'], 'required'],
        ];
    }

    /**
     * Find in file and open theme
     */
    public function open($area,$theme, $file){
    $this->file = $file;

      $getparams = (isset($this->file[$area][$theme]))?$this->file[$area][$theme]:0;

      if($getparams){
        $this->area = $area;
        $this->tema = $theme;
        $this->layout = $getparams['layout'];
        $this->default = $getparams['default'];

        if(isset($getparams['pages'])){
          $tratar_pages = [];
          $tratar_page_action = [];
          $tratar_page_layout= [];
          foreach ($getparams['pages'] as $pAction => $pLayout) {
            $tratar_pages[] = ['action'=>$pAction, 'layout'=>$pLayout];
            $tratar_page_action[] = $pAction;
            $tratar_page_layout[] = $pLayout;
          }
          $this->page_action = $tratar_page_action;
          $this->page_layout = $tratar_page_layout;
          $this->pages = $tratar_pages;
          //$this->pages = (isset($getparams['pages']))?$getparams['pages']:[];

        }

        if(!\app\components\helpers\LayoutHelper::CheckLayoutExists($area.'/'.$theme)){
          $this->errorFiles['theme']= "O tema $theme não foi encontrado na pasta temas / admin";
        }

        if(!\app\components\helpers\LayoutHelper::CheckLayoutExists($area.'/'.$theme.'/'.$this->layout)){
          $this->errorFiles['theme']= "O tema $theme não foi encontrado na pasta temas / admin";
        }
      }

    }
    // yii\helpers\FileHelper::findFiles('.',['only'=>['*.php','*.txt']]);
    public function edit($area,$theme, $file){
       $jsonPath = Yii::getAlias('@app/temas/themas.json');
      unset($file[$area][$theme]);

      $file[$this->area][$this->tema] = [
        "default"=>$this->default,
        "layout"=>$this->layout
      ];

      if($this->default){
        foreach ($file[$this->area] as $theme => $params) {
          if($theme != $this->tema){
            $file[$this->area][$theme]['default'] = 0;
          }
        }
      }

      $filejson = json_encode($file);

      return $this->WriteFileJson($jsonPath,$filejson);
    }

    public function WriteFileJson($filepath, $data){

      $arquive = file_put_contents($filepath, $data, LOCK_EX);

      return $arquive;

    }
}

 ?>
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535

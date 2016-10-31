<?php
namespace app\components\helpers;
use app\painel\models\UserMenu;

class MenuHelper{

    public static $menuitens = [];

    public static function UserMenu(){
        self::$menuitens = UserMenu::find()->where(['status'=>1])->asArray()->all();

        return new MenuHelper;
    }

    public static function _Items($itensReturn,$parente_id, $item){

      $active = 0;
    //  $url = '/painel/'.\Yii::$app->controller->id.'/'.\Yii::$app->controller->action->id;
      if( strpos($item['url'], \Yii::$app->controller->id) !== false){
        $active = 1;
      }

      if($item['id_parente'] == $parente_id){

          $itensReturn[$item['id']]['linkOptions']=['class'=>'treeview'];

          $icon = (!empty($item['icon']))?'<i class="'.$item['icon'].'"></i>':'';
          $secundarios = self::ListMenu($item['id']);
          $icon2 = ($parente_id==0 && $secundarios)?'<i class="fa fa-angle-left pull-right"></i>':'';
          $icon3 = ($parente_id>0)?'<i class="fa fa-angle-double-right pull-left"></i>':'';
          $itensReturn[$item['id']] = [
          'label'=> $icon3.$icon.' <span>'.$item['item_nome'].'</span>'.$icon2,
          'url' => [$item['url']],
          'active'=>$active,
          ];


         if($secundarios){
              $itensReturn[$item['id']]['items'] = $secundarios;
         }

      } // end if id_parente

      return $itensReturn;

    }
    public static function ListMenu($parente_id = 0){
        $itensReturn = [];

        foreach (self::$menuitens as $linha => $item) {

          if($item['url'] == '#'){
              $itensReturn = self::_Items($itensReturn,$parente_id, $item);
          }else{
              $itensReturn = self::_Items($itensReturn,$parente_id, $item);
          }
        }
        return $itensReturn;
    }
}

<?php
namespace app\_adm\components\helpers;
use app\_adm\models\AdmMenu;
use app\_adm\models\AdmGrupos;
class MenuHelper{

    public static $menuitens = [];

    public static $menu_permissoes = [];

    public static function AdmMenu(){
        self::$menuitens = AdmMenu::find()->where(['status'=>1])->asArray()->all();

        $userId = \Yii::$app->user->identity->grupos_id;

        $grupos = AdmGrupos::find()->where(['id'=>$userId])->one();
        self::$menu_permissoes = $grupos->menu_permissoes;
        return new MenuHelper;
    }

    public static function _Items($itensReturn,$parente_id, $item){

      if($item['id_parente'] == $parente_id){

          $itensReturn[$item['id']]['linkOptions']=['class'=>'treeview'];

          $icon = (!empty($item['icon']))?'<i class="'.$item['icon'].'"></i>':'';
          $secundarios = self::ListMenu($item['id']);
          $icon2 = ($parente_id==0 && $secundarios)?'<i class="fa fa-angle-left pull-right"></i>':'';
          $icon3 = ($parente_id>0)?'<i class="fa fa-angle-double-right pull-left"></i>':'';
          $itensReturn[$item['id']] = [
          'label'=> $icon3.$icon.' <span>'.$item['item_nome'].'</span>'.$icon2,
          'url' => [$item['url']]
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

          if($item['url'] == '#' && in_array($item['id'], self::$menu_permissoes)){
            $itensReturn = self::_Items($itensReturn,$parente_id, $item);
          }else{
            if(in_array($item['id'], self::$menu_permissoes) || in_array($item['id_parente'], self::$menu_permissoes) ){
              $itensReturn = self::_Items($itensReturn,$parente_id, $item);
            }
          }



        }
        return $itensReturn;
    }



}

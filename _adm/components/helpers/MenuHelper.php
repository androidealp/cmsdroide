<?php
namespace app\_adm\components\helpers;
use app\_adm\models\AdmMenu;
class MenuHelper{
    
    public static $menuitens = [];
    
    public static function AdmMenu(){
        self::$menuitens = AdmMenu::find()->where(['status'=>1])->asArray()->all();
        
        return new MenuHelper;
    }
    
    /*
     * 'items' => [
        [
            'label' => 'Home',
            'url' => ['site/index'],
            'linkOptions' => [...],
        ],
        [
            'label' => 'Dropdown',
            'items' => [
                 ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
                 '<li class="divider"></li>',
                 '<li class="dropdown-header">Dropdown Header</li>',
                 ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
            ],
        ],
     */
    public static function ListMenu($parente_id = 0){
        $itensReturn = [];
        
        foreach (self::$menuitens as $linha => $item) {
      
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
                
            } 
            
        }
        return $itensReturn;
    }
    
   
    
}


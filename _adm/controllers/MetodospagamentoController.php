<?php

namespace app\_adm\controllers;
use app\_adm\components\helpers\ControllerHelper;
use Yii;
/**
 * Metodo de pagamento controller
 * @example url - desc
 * @author André Luiz Pereira
 */
class MetodospagamentoController extends ControllerHelper
{
    /**
     *Exibe a página inicial dos metodos.
     *
     * @return mixed
     */
    public function actionIndex()
    {
      \Yii::$app->view->title = "Métodos de pagamento ";
       \Yii::$app->view->params['title-page'] = 'Gerenciador de Métodos de pagamento';
       \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Métodos de pagamento',]];


        return $this->render('index');
    }
}

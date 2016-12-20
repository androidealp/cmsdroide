<?php

namespace app\_adm\controllers;
use Yii;
use app\_adm\components\helpers\ControllerHelper;
use app\_adm\models\LoginForm;

class PainelController extends ControllerHelper
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionErro(){

        $this->render('error');
    }

    /**
     * se o ip do usuário estiver bloqueado os administradores poderão ativar usuando este link com o devido
     * @author André Luiz Pereira <andre@next4.com.br>
     * @param string $k - chave do bloqueio
     * @return string - resposta de sucesso ou erro
     */
    public function actionValidarEmailAdm($k)
    {

      $ipBloqueado = \app\_adm\models\IpBloqueado::find()->where(['hash_desative'=>$k])->one();

      $login = new LoginForm;

      if(!$ipBloqueado)
      {
        throw new \yii\web\HttpException(404, 'Página não encontrada');
      }else{
        $ipBloqueado->delete();

        $login->deleteSessaoIp();

        return $this->redirect(['/_adm/painel']);
      }

      //return $this->render('validaradm');
    }

    public function actionLogin(){

        $model = new LoginForm();

        $ipBloqueado = \app\_adm\models\IpBloqueado::CheckIp();

        if($ipBloqueado)
        {
          return $this->render('login_blocked');
        }

        $checkip = $model->sesssionIp();

        if($checkip['tentativa'] >= 5)
        {
          $model->contactAdm($checkip);
          return $this->render('login_blocked');
        }

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/_adm/painel']);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }

    }

    public function actionLogout(){

        \Yii::$app->user->logout();
        return $this->redirect(['/_adm']);
    }
}

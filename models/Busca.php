<?php
namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use app\_adm\components\helpers\ModelHelper;

/**
 *
 */
class  Busca extends  ModelHelper
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%buscas}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          [['termo'],'required'],
          [['termo'],'string','max'=>100, 'min'=>3],
        ];
    }


    public function search($params)
    {

      $conteudo = Conteudo::find()->joinWith(
        ['categoriaconteudo'=>function($q){
          return $q->where([
            'and',
            'xsdml_categorias_conteudo.status'=>1,
              [
              'or',
                ['xsdml_categorias_conteudo.parent'=>2],
                ['xsdml_categorias_conteudo.id'=>2]
              ],
            ]);
        }]
        )->where(['xsdml_conteudo.status' => 1])->orderBy('xsdml_conteudo.dt_publicacao');


      $dataProvider = new ActiveDataProvider([
      'query' => $conteudo
      ,
      'pagination' => [
          'pageSize' => 30,
          ],
      ]);
      $this->termo = \Yii::$app->request->get('q');
      if (!(\Yii::$app->request->get('q') && $this->validate())) {
          return $dataProvider;
      }

      $conteudo->andFilterWhere(
          [
            'or',
              ['like','lower(titulo)',strtolower($this->termo)],
              ['like','lower(texto_introdutorio)',strtolower($this->termo)],
              ['like','lower(conteudo_total)',strtolower($this->termo)],
          ]
                      );


      return $dataProvider;



    }

}

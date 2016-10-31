<?php
namespace app\_adm\models;

use Yii;
use app\_adm\components\helpers\ModelHelper;
use app\components\helpers\WidgeteffectsHelper;

/**
 * Controlar os dados dos efeitos via json
 * @author André Luiz Pereira <andre@next4.com.br>
 */
class WidgetEffectsMap extends  ModelHelper
{

  const SLIDESHOW = 'slideshow';
  const BD   = 'bd';
  public $path = '@app/temas/widgeteffects/';
  public $key = "";
  public $nome;
  public $desc;
  public $ativar;
  public $params;
  public $items;
  public $order;
  public $json_all_items;


  public static function tableName()
  {
      return '{{%widget_effects_map}}';
  }

  /**
   * Organiza o conteudo com o scenario
   * @author André Luiz Pereira <andre@next4.com.br>
   * @return array - scenarios
   */
  public function getCustomScenarios()
  {
    return [
        self::SLIDESHOW =>  ['key','nome', 'desc','ativar','params','items'],
        self::BD =>    ['effect_key','nome_effect','icon'],
    ];
  }

  /**
   * @inheritdoc
   */
  public function scenarios()
  {
      $scenarios = $this->getCustomScenarios();
      return $scenarios;
  }

  /**
   * Remove das regras os elementos que nao desejo que seja requiridos, deve ser aplicado principalmente no rules
   * @author André Luiz Pereira <andre@next4.com.br>
   * @return array - todos os scenarios
   */
  public function TratarRequired()
  {

    $allscenarios = $this->getCustomScenarios();

    $allscenarios[self::SLIDESHOW] = array_diff($allscenarios[self::SLIDESHOW], ['items']);

    return $allscenarios;

  }

    /**
     * @inheritdoc
     */
    public function rules()
    {
      $allscenarios = $this->TratarRequired();
        return [
          [$allscenarios[self::SLIDESHOW], 'required', 'on' => self::SLIDESHOW],
          [$allscenarios[self::BD], 'required', 'on' => self::BD],
        ];
    }

    /**
     * Salva um novo item adicionado no efeito
     * @author André Luiz Pereira <andre@next4.com.br>
     * @param string $widget - nome do efeito também usado para detectar o arquivo json
     * @return mixed - se verdadeiro retorna q quantidade de bytes salvo, caso contráfio false
     */
    public function saveItem($widget){

      $jsonPath = Yii::getAlias($this->path.$widget.'.json');

      $this->items['order'] = count($this->json_all_items[$this->key]['items']);

      $this->json_all_items[$this->key]['items'][] = $this->items;

      $filejson = json_encode($this->json_all_items);

      return $this->WriteFileJson($jsonPath,$filejson);

    }

    /**
     * Cria um novo efeito baseado no tipo que está no banco
     * @author André Luiz Pereira <andre@next4.com.br>
     * @param string $widget - nome do efeito também usado para detectar o arquivo json
     * @return mixed - se verdadeiro retorna q quantidade de bytes salvo, caso contráfio false
     */

    public function adicionarEfeito($widget)
    {
      $return = false;

      $jsonPath = Yii::getAlias($this->path.$widget.'.json');



      $this->json_all_items[$this->key] = [
        'nome'=>$this->nome,
        'desc'=>$this->desc,
        'ativar'=>$this->ativar,
        'params'=>$this->params,
        'items'=>[]
      ];

      $filejson = json_encode($this->json_all_items);

      return $this->WriteFileJson($jsonPath,$filejson);

    }

    /**
     * Edita um efeito existente
     * @author André Luiz Pereira <andre@next4.com.br>
     * @param string $widget - nome do efeito também usado para detectar o arquivo json
     * @return mixed - se verdadeiro retorna q quantidade de bytes salvo, caso contráfio false
     */
    public function editarEfeito($widget)
    {

        $return = false;
        $jsonPath = Yii::getAlias($this->path.$widget.'.json');

        if(isset($this->json_all_items[$this->key])){
          $this->json_all_items[$this->key] = [
            'nome'=>$this->nome,
            'desc'=>$this->desc,
            'ativar'=>$this->ativar,
            'params'=>$this->params,
            'items'=>$this->items
          ];

          $filejson = json_encode($this->json_all_items);

          $return = $this->WriteFileJson($jsonPath,$filejson);

        }

        return $return;


    }

    /**
     * Deleta um item do efeito preservando a indexação
     * @author André Luiz Pereira <andre@next4.com.br>
     * @param string $widget - nome do efeito também usado para detectar o arquivo json
     * @param string $key - id de localização do efeito no json.
     * @param string $item - index do array dos items para localizar o item desejado
     * @return mixed - se verdadeiro retorna q quantidade de bytes salvo, caso contráfio false
     */
    public function removeItem($widget,$key,$item)
    {

      $return = false;
      $jsonPath = Yii::getAlias($this->path.$widget.'.json');
      $effect = WidgeteffectsHelper::loadEffects($widget.'.json');
      $this->json_all_items = $effect::$Filedata;

      if(isset($this->json_all_items[$key]['items'][$item])){

        unset($this->json_all_items[$key]['items'][$item]);

        $filejson = json_encode($this->json_all_items);

        $return = $this->WriteFileJson($jsonPath,$filejson);
      }

      return $return;

    }

    /**
     * Carrega o arquivo json no formato array
     * @author André Luiz Pereira <andre@next4.com.br>
     * @param string $widget - nome do efeito também usado para detectar o arquivo json
     * @return mixed - se verdadeiro retorna o objeto do model, caso contrário false
     */
    public function loadEffect($widget)
    {
      $return = $this;
      $effect = WidgeteffectsHelper::loadEffects($widget.'.json');
      if($effect::$Filedata){
          $this->json_all_items = $effect::$Filedata;
      }

      return $return;

    }


    /**
     * carrega um efeito para edição
     * @author André Luiz Pereira <andre@next4.com.br>
     * @param string $key - nome do efeito também usado para detectar o arquivo json
     * @return mixed - se verdadeiro retorna o objeto do model, caso contrário false
     */
    public function getItem($key)
    {
      $effect = WidgeteffectsHelper::loadEffects($this->scenario.'.json');
      $this->json_all_items = $effect::$Filedata;
      if($effect::$editavel && count($this->json_all_items) && isset($this->json_all_items[$key])){

          $this->attributes = $this->json_all_items[$key];
          $this->key = $key;
      }

      return $this;
    }

    public function search($params)
    {
      $query = $this->find();

      $dataProvider = new \yii\data\ActiveDataProvider([
          'query' => $query,
      ]);

      if (!($this->load($params) && $this->validate())) {
          return $dataProvider;
      }

      $query->andFilterWhere(
          [
            'and',
              ['like','effect_key',$this->effect_key],
              ['like','nome_effect',$this->nome_effect],

          ]
                      );

      return $dataProvider;
    }


    /**
     * Recupera uma lista baseada no json, para listagem e localização de efeitos
     * @author André Luiz Pereira <andre@next4.com.br>
     * @param string $file - nome do arquivo json que deseja localizar
     * @param tipo nome - desc
     * @return tipo - desc
     */
    public function searchListJson($file)
    {

      $effect = WidgeteffectsHelper::loadEffects($file);

      $dataprivader =new \yii\data\ArrayDataProvider([
        'allModels' => WidgetEffectsMap::getListEffect($effect::$Filedata),
        'pagination' => [
          'pageSize' => 9,
        ],
      ]);

      return $dataprivader;
    }


    /**
     * Listagem de items dentro do efeito
     * @author André Luiz Pereira <andre@next4.com.br>
     * @param string $effect - nome do efeito desejado
     * @return array - Aqui pego todos os efeitos
     */
    public function getListEffect($effect)
    {
      $return = [];

      foreach ($effect as $k => $ef) {

        $return[] = [
          'id'=>$k,
          'nome'=>$ef['nome'],
          'status'=>$ef['ativar'],
          'item_main'=>isset($ef['items'][0]['image'])?$ef['items'][0]['image']:'',
          'count_itens'=>isset($ef['items'])?count($ef['items']):0
        ];

      }

      return $return;

    }

    /**
     * Escreve no json com os dados do efeito do formulário
     * @author André Luiz Pereira <andre@next4.com.br>
     * @param string $filepath - desc
     * @param string $data - dados no formato json
     * @return mixed - objeto se for verdadeiro ou a quantidade de bytes da alteração
     */
    public function WriteFileJson($filepath, $data){

      $arquive = file_put_contents($filepath, $data, LOCK_EX);

      return $arquive;

    }
}

 ?>

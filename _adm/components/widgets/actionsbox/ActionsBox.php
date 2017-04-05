<?php

namespace app\_adm\components\widgets\actionsbox;

use yii\base\Widget;
use yii\helpers\Html;
use \app\components\helpers\LayoutHelper;

class ActionsBox extends Widget {
	private $widview = '';
	private $insertInView = [];
	public $setview = 0; // custom layout em html
	public $titulo = '';
	public $icon = 'fa fa-book';


	public $buttons = [
	/*'default'=>[
		'add'=>[],
		'del'=>[],
		'search'=>[]
	],
	'custom'=>[
		'text'=>'customizado',
		'params'=>['class'=>'teste']
	]*/
	];
	private $types = ['criar'=>'add', 'deletar'=>'del', 'editar'=>'edit'];

	public function init(){

		if(empty($this->titulo)){
			$this->titulo = \Yii::$app->view->params['title-page'];
		}


		$viewfile = ($this->setview)?$this->setview:'ActionsBox';
		//$this->widview = LayoutHelper::loadThemesJson()->WidViews($viewfile,'admin');

		$this->insertInView = [
			'titulo'=>$this->titulo,
			'icon'=>$this->icon,
		];

		$this->elementDetect();
	}

	public function run(){

		$view = ($this->widview)?$this->widview:'actions';

		if(isset($this->buttons['custom'])){
			$view = 'custom';
		}

		return $this->render($view,$this->insertInView);

	}

	private function CheckPermissoes($type)
	{
		['editar'=>'add', 'deletar'=>'del'];
		$return = false;
		foreach (\Yii::$app->view->params['acoes'] as $k => $atributos) {
			if(isset($this->types[$atributos]) && $this->types[$atributos] == $type)
			{
				$return = true;
			}
		}

		return $return;

	}

	private function elementDetect(){
		if(isset($this->buttons['default'])){
			foreach ($this->buttons['default'] as $key => $bt) {
				if($this->CheckPermissoes($key))
				{
					$this->insertInView['buttons'][] = $this->buttons($key, $bt);
				}

			}
		}

		if(isset($this->buttons['custom'])){

			if(isset($this->buttons['custom']['type']) && $this->buttons['custom']['type'] == 'link'){
				$this->insertInView['buttons'][] = Html::a(
				$this->buttons['custom']['text'],
				$this->buttons['custom']['url'],
				$this->buttons['custom']['params']);
			}else{
				$this->insertInView['buttons'][] = Html::button($this->buttons['custom']['text'], $this->buttons['custom']['params']);
			}




		}

	}

	private function buttons($type, $bt){
		$button = '';
		switch ($type) {
			case 'add':
				$button = Html::button('<i class="fa fa-plus"></i> Criar', [
					'class'=>'btn btn-primary btn-sm',
					'data-btaddurl'=>$bt['url'], //eModal.alert("Teste dentro do php");
					'title'=>(isset($bt['title']))?$bt['title']:'Adicionar novo elemento',
					'data-formid'=>(isset($bt['formid']))?$bt['formid']:'',
					'data-pajaxid'=>(isset($bt['pajaxid']))?$bt['pajaxid']:'',
					'data-modalsize'=>(isset($bt['modalsize']))?$bt['modalsize']:'md', // md sm lg xl
					]);
				break;
			case 'del':
				$button = Html::button('<i class="fa fa-minus"></i> Deletar', [
					'class'=>'btn btn-danger btn-sm',
					'title'=>(isset($bt['title']))?$bt['title']:'Deletar elemento(s)',
					'data-btdelurl'=>$bt['url'], //eModal.alert("Teste dentro do php");
					'data-btconfirm'=>(isset($bt['confirm']))?$bt['confirm']:'Deseja realmente deletar?',
					'data-gridid'=>(isset($bt['gridid']))?$bt['gridid']:'', //pajaxid
					'data-pajaxid'=>(isset($bt['pajaxid']))?$bt['pajaxid']:'',
					'data-modalsize'=>(isset($bt['modalsize']))?$bt['modalsize']:'md', // md sm lg xl

					]);
				break;

			default:
				# code...
				break;
		}

		return $button;
	}




}

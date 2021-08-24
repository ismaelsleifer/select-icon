<?php

namespace sleifer\selectIcon;

use yii\helpers\Html;
use yii\widgets\InputWidget;
use yii\helpers\BaseHtml;

class SelectIcon extends InputWidget
{
    public $url = [];
    public $options = [];
    public $hidden_options = [];

    private $_baseUrl;

    public function registerActiveAssets()
    {
        if ($this->_baseUrl === null) {
            $this->_baseUrl = SelectIconAssets::register($this->getView())->baseUrl;
        }
        return $this->_baseUrl;
    }

    public function run()
    {
        $id = BaseHtml::getInputId($this->model, $this->attribute);
        $id = str_replace('-', '_', $id);
        
        $value = $this->model->{$this->attribute};
        $this->registerActiveAssets();

        $this->getView()->registerJs("
            
            
        ");
        
        if(!isset($this->options['class'])){
            $this->options['class'] = 'form-control';
        }
        
        return 
            Html::activeHiddenInput($this->model, $this->attribute,  array_merge($this->hidden_options, ['id' => $id . '-hidden']))
          . Html::textInput($id . '_text', $value && !$this->startQuery ? $value : '', array_merge($this->options, ['id' => $id]));
    }
}

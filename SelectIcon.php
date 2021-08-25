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
        $name = Html::getInputName($this->model, $this->attribute);
        $id = BaseHtml::getInputId($this->model, $this->attribute);
        $value = $this->model->{$this->attribute};
        
        $this->registerActiveAssets();

        $this->getView()->registerJs("
            
                $('#{$id}').autocomplete({
                         source: source,
                         select: function(event, ui) {
                             $('#{$id}-i').attr('class', ui.item.value);
                         },
                     })
                     .data('ui-autocomplete')
                     ._renderItem = function(ul, item) {
                         return $('<li>')
                             .append('<a>' + '<i class=\'' + item.value + '\'></i> - ' + item.label + '</a>')
                             .appendTo(ul);
                };
            
        ");
        
        if(!isset($this->options['class'])){
            $this->options['class'] = 'form-control';
        }
        
        $html = 
            '<div class="input-group">' .
               '<div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="'. $value .'" id="'. $id .'-i"></i>
                    </span>
                </div>'.
                Html::textInput($name, $value, $this->options).
            '</div>';
         return $html;
    }
}

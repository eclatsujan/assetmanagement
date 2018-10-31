<?php
namespace TWMGForm\Types;

class TWMG_Select extends baseForm{
  private $options;
  public function __construct($attr){    
    $this->attr=$attr;
    if(isset($this->attr["options"])){
        $this->setOptions($this->attr["options"]);
        unset($this->attr["options"]);
    }
  }

  public function show(){
    echo "<select {$this->addAttr()} >";

    echo "</select>";
  }

  public function setOptions($options){
    if(is_array($options)){
        foreach($options as $key=>$value){
            if(!is_numeric($key)){
                $key=$value;
            }
            $this->options[$key]=$value;        
        }
    }
  }

  public function getOptionasHtml(){
      
  }
}

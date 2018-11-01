<?php
namespace TWMGForm\Types;

class TWMG_Select extends baseForm{
  private $options;
  public function __construct($attr){    
    $this->attr=$attr;    
    if(isset($this->attr["options"])){    
        $this->options=$this->attr["options"];   
        unset($this->attr["options"]);  
    }
    
  }

  public function show(){   
    echo "<select {$this->addAttr()} >";
        echo $this->getOptionsHtml();
    echo "</select>";
    
  }  

  public function getOptionsHtml(){      
    $html="";  
    foreach($this->options as $key=>$value){
        if(is_numeric($key)){
            $html.="<option>{$value}</option>";
        }
        else{
            $html.="<option value='{$key}'>{$value}</option>";
        }        
    }            
    return $html;
  }
}

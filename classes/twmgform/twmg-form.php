<?php
namespace TWMGForm;
use TWMGForm\Types\TWMG_Textbox;

class TWMG_Form{
  private $data;
  public function __construct($data){
    $this->fields=$data;
  }

  public function display(){
    ob_start();
    foreach($this->fields as $single_field){
      $this->checkType($single_field["type"],$single_field["attributes"]);
    }
    return ob_get_clean();
  }

  public function checkType($type,$attr){
    $class="\TWMGForm\Types\\".$type;
    if(class_exists($class)){
      return (new $class($attr))->show();
    }
  }
}

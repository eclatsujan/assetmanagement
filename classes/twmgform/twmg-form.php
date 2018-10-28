<?php
namespace TWMGForm;
use TWMGForm\Types\TWMG_Textbox;

class TWMG_Form{
  private $data;
  public function __construct($data){
    $this->data=$data;
  }

  public function display(){
    ob_start();
    foreach($this->data as $single_data){
      $this->checkType($single_data["type"]);
    }
    return ob_get_clean();
  }

  public function checkType($type){
    return (new TWMG_Textbox(array("class"=>"form-control","placeholder"=>"Name")))->show();
  }
}

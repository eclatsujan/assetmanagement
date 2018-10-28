<?php
namespace TWMGForm\Types;

class TWMG_Textbox extends baseForm{

  public function __construct($attr){
    $this->attr=$attr;
  }

  public function show(){
    echo "<input type='text' {$this->addAttr()} />";
  }

  public function addAttr(){
    $str="";
    foreach($this->attr as $key=>$attr){
      $str.="{$key}='{$attr}'";
    }
    return $str;
  }
}

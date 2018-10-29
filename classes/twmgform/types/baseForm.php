<?php
namespace TWMGForm\Types;

abstract class baseForm{
  protected $attr;

  public function addAttr(){
    $str="";
    foreach($this->attr as $key=>$attr){
      $str.="{$key}='{$attr}'";
    }
    return $str;
  }
}

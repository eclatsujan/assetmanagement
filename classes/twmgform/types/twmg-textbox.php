<?php
namespace TWMGForm\Types;

class TWMG_Textbox extends baseForm{

  public function __construct($attr){   
    $this->attr=$attr;
  }

  public function show(){
    echo "<input type='text' {$this->addAttr()} />";
  }
}

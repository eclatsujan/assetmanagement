<?php

function view($include_path,$data){
  extract($data);
  include(PLUGIN_DIR.$include_path.".php");
}

<?php
class Decode_Asset_Menu{
	private $page_title;
	private $menu_title;
	private $capability;
	private $menu_slug;
	private $callback;

	public function __construct(){	
		$this->callback=[];	
	}

	public function setPageTitle($title){
		$this->page_title=$title;
		return $this;
	}

	public function setMenuTitle($title){
		$this->menu_title=$title;
		return $this;
	}
	
	public function setCapability($cap){
		$this->capability=$cap;
		return $this;
	}

	public function setSlug($slug){
		$this->menu_slug=$slug;
		return $this;
	}


	public function addMenuPage(){
		add_action('admin_menu',array($this,'displayMenuPage'));
	}
	
	public function displayMenuPage(){
		add_menu_page($this->page_title,$this->menu_title,$this->capability,$this->menu_slug,array($this,'getCallback'));
	}

	public function getCallback(){
		do_action("menu_page_".$this->menu_slug);
	}
}
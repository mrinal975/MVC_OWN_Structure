<?php

class Main extends Route
{
	public $url;
	public $controller;
	public $controllerName="";
	public $methodName="";
	public $controllerPath="app/controllers/";
	public $peraMeter=0;
	public $file="";

	function __construct()
	{
		parent::__construct();
		$this->getUrl();
		$this->route();
	}
	public function getUrl(){
		$this->url=isset($_GET['url']) ? $_GET['url'] :NULL;

		if($this->url!=NULL){
			$this->url=rtrim($this->url,'/');
			$this->url=explode('/',filter_var($this->url,FILTER_SANITIZE_URL));
		}
		else{
			unset($this->url);
		}
	}
	public function route(){
		if (!isset($this->url[1])) {
			if (isset($this->url[0])) {
				$route=$this->url[0];
				//Single Route
				//calling extended class Route
				$this->singleRoute($route);
			}
		}
		else if (!isset($this->url[2])) {
			if (isset($this->url[1])) {
				$route=$this->url[0].'/'.$route=$this->url[1];
				//Double Route For Routing
				//calling extended class Route
				$this->DoubleRoute($route);	
			}
		}
		elseif(count($this->url)>3){
			echo "UnKnown Route";
			return 0;
		}
		//PeraMetter With Two Route
		elseif (isset($this->url[2])) {
			$route=$this->url[0].'/'.$route=$this->url[1];
				//Double Route With Perameter
				$this->DoubleRouteWithPerametter($route);
		}

		else{
			echo "unKnown Route";
		}
		$this->CallControlleAndMethod();

	}
	public function CallControlleAndMethod(){
		$this->file=$this->controllerPath.$this->controllerName.".php";
		if (file_exists($this->file)) {
			include $this->file;
			$this->controller = new $this->controllerName();
			if(method_exists($this->controller,$this->methodName)){
				isset($this->url[2]) ? $this->controller->{$this->methodName}($this->url[2]) : $this->controller->{$this->methodName}();
			}
			else{
				echo "Method Not Exist or Method Name Mismatch in Cottroller";
			}
		}else{
			echo "Controller Does not Exist Controller Name or File Name Mismatch";
		}
	}

}
?>
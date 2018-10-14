<?php
/**
 * 
 */
class Route
{
	public $controllerName="";
	public $methodName="";

	
	function __construct()
	{
		
	}
	public function singleRoute($route){
		if ($route=='a') {
			$this->controllerName="TestController";
			$this->methodName="TestMethod";
		}
		elseif($route=='b'){
			$this->controllerName="TestController";
			$this->methodName="test";
		}
	}
	public function DoubleRoute($route){
		if ($route=='a/b') {
			$this->controllerName="TestController";
			$this->methodName="TestMethod";
		}
	}
	public function DoubleRouteWithPerametter($route){
		if ($route=='b/a') {
			$this->controllerName="TestController";
			$this->methodName="perametterdouble";
		}
		else if ($route=='first/second') {
			$this->controllerName="TestController";
			$this->methodName="perametterdouble";
		}
	}
}
?>
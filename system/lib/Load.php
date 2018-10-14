<?php
class Load
{
	
	public function __construct()
	{

	}
	public function view($file,$data=NULL){

		//echo $file;
		include 'app/views/'.$file.'.php';
	}
	
	public function model($fileName){
		include'app/models/'.$fileName.'.php';
		return new $fileName;
	}

	public function validate($fileName){
		include'app/validation/'.$fileName.'.php';
		return new $fileName;
	}
	public function Route($fileName){
		include '././route/'.$fileName.'.php';
		return new $fileName;
	}
	
}
?>
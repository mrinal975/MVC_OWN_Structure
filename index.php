<?php
spl_autoload_register(function($class){
	include "system/lib/{$class}.php";
});
include "app/config.php";

$main=new Main();


?>
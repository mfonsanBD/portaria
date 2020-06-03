<?php 
session_start();
require "vendor/autoload.php";
require 'configuracao.php';
require 'routers.php';

spl_autoload_register(function($classe){
	if (file_exists('controllers/'.$classe.'.php')) {
		require 'controllers/'.$classe.'.php';
	}
	else if (file_exists('models/'.$classe.'.php')) {
		require 'models/'.$classe.'.php';
	}
	else if (file_exists('core/'.$classe.'.php')) {
		require 'core/'.$classe.'.php';
	}
});

use Dompdf\Dompdf;
$dompdf = new Dompdf();

$core = new Core();
$core->run();
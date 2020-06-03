<?php
require 'ambiente.php';

define("NOME_DO_SITE", 'M8D :: Portaria :: ');

$config = array();
if (AMBIENTE == 'desenvolvimento') {
	define("URL_BASE", 'http://localhost/portaria/');
	$config['banco'] 		= 'portaria';
	$config['host'] 		= 'localhost';
	$config['usuario'] 		= 'root';
	$config['senha'] 		= 'root';
}else{
	define("URL_BASE", 'https://projetocontas.000webhostapp.com/');
	$config['banco'] 		= 'id8995053_testeprojeto';
	$config['host'] 		= 'localhost';
	$config['usuario'] 		= 'id8995053_user';
	$config['senha'] 		= 'Portaria2019*/';
}

global $conexao;

try {
	$conexao = new PDO("mysql:dbname=".$config['banco']."; host=".$config['host']."; charset=utf8", $config['usuario'], $config['senha']);
} catch (PDOException $e) {
	echo "Falha na conexão: ".$e->getMessage();
}
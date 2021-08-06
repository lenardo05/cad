<?php
date_default_timezone_set('America/Sao_Paulo');
require_once 'definicoes.php';

spl_autoload_register(function($classe) {
	
	$classe = str_replace("..", "", $classe);
	
	require_once "$classe.class.php";
	
});
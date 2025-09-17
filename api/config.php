<?php

spl_autoload_register(function ($nomeClasse) {
	$pastaClasses = 'classes/';
	
	$possiveisPastas = [
		$pastaClasses,
		$pastaClasses . 'base/',
		$pastaClasses . 'models/',
		$pastaClasses . 'views/',
		$pastaClasses . 'controllers/'
	];
	
	foreach ($possiveisPastas as $item) {
		$nomeCompletoArquivo = $item . $nomeClasse . '.php';
		
		if (file_exists($nomeCompletoArquivo)) {
			require_once $nomeCompletoArquivo;
			break;
		}
	}
});
session_start();
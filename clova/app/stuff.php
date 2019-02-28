<?php 
	
	// Carga la config
	require_once 'config/config.php';

	
	require_once 'helpers/session_helper.php';

	// Añade todo lo de libs
	spl_autoload_register(function($className){
		require_once 'libs/' . $className . '.php';
	});
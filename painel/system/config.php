<?php

	
	//Banco de dados
	define('HOSTNAME', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', '');
	define('DATABASE', 'painel');

	//url's

	define('URL_BASE', 'http://localhost/exercicios/painel/');
	define('URL_REGISTER', URL_BASE.'paginas/register.php');
	define('URL_PAINEL', URL_BASE.'paginas/painel.php');

	//Dir's

	define('DIR_BASE', $_SERVER['DOCUMENT_ROOT']. 'exercicios/painel/');
	define('DIR_SYSTEM', DIR_BASE.'system/' );

	//File's
	define('FILE_CONFIG', DIR_SYSTEM. 'config.php');
	define('FILE_HELPERS', DIR_SYSTEM . 'helpers.php');
	define('FILE_DATABASE', DIR_SYSTEM . 'database.php');

 ?>
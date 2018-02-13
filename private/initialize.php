<?php
	ob_start(); // output buffering manual start
	/*
	FILE PATHS
	Assign file paths to PHP constants
	__FILE__ returns the current path to this file
	dirname() returns the path to the parent directory
 	*/
 	define('PRIVATE_PATH', dirname(__FILE__));
 	define('PROJECT_PATH', dirname(PRIVATE_PATH));
 	define('PUBLIC_PATH', PROJECT_PATH . '/public');
 	define('SHARED_PATH', PRIVATE_PATH . '/shared');

 	/*
 	URL PATHS
	- assign the root URL to a PHP constant
	- do not need to include the domain
	- use same document root as webserver
	- you can set a hardcoded value:
	- define ("WWW_ROOT", '/~ronyortiz/training2017/php2018/pleiadesmoon/public');
	- in production environment you can use:
	- define("WWW_ROOT", '');
	- can dynamically find everything in URL up to "/public"
	*/
	$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
	$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
	define("WWW_ROOT", $doc_root);

	require_once('functions.php');
	require_once('database.php');
	require_once('query_functions.php');

	$db = db_connect();
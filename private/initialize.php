<?php 
define("SITE_NAME", $_SERVER['SERVER_NAME'] );

date_default_timezone_set('Asia/Manila');

// dirname() returns the path to the parent directory
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

require_once(PRIVATE_PATH.'/functions.php');
require_once('db_credentials.php');
require_once('database_functions.php');
foreach(glob('classes/*.class.php') as $file) {
require_once($file);
}

// Autoload class definitions
function my_autoload($class) {
	if(preg_match('/\A\w+\Z/', $class)) {
	  include('classes/' . $class . '.class.php');
	}
}
spl_autoload_register('my_autoload');

$database = db_connect();
DatabaseObject::set_database($database);

<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("SITE_NAME", $_SERVER['SERVER_NAME'] );

date_default_timezone_set('Asia/Manila');

// dirname() returns the path to the parent directory
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');
define("CLASS_PATH", PRIVATE_PATH . '/classes');

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

require_once(PRIVATE_PATH.'/functions.php');
// require_once('db_credentials.php');


define("DB_SERVER", "us-cdbr-east-02.cleardb.com");
define("DB_USER", "b01244ab209a87");
define("DB_PASS", "2ad7c806");
define("DB_NAME", "heroku_3223da8055cbdc3");


function db_connect() {
					//$db = new MySQLi('localhost', 'root', 'root', 'my_db', '3306', '/var/lib/mysql/mysql.sock')
  $connection = new MySQLi(DB_SERVER, DB_USER, DB_PASS, DB_NAME,'3306','/var/lib/mysql/mysql.sock' );
  confirm_db_connect($connection);
  return $connection;
}

function confirm_db_connect($connection) {
  if($connection->connect_errno) {
    $msg = "Database connection failed: ";
    $msg .= $connection->connect_error;
    $msg .= " (" . $connection->connect_errno . ")";
    exit($msg);
  }
}

function db_disconnect($connection) {
  if(isset($connection)) {
    $connection->close();
  }
}

$database = db_connect();

require_once(CLASS_PATH.'/databaseobject.class.php');
require_once(CLASS_PATH.'/person.class.php');
// require_once('database_functions.php');
// foreach(glob('classes/*.class.php') as $file) {
// require_once($file);
// }
// Autoload class definitions
// function my_autoload($class) {
// 	if(preg_match('/\A\w+\Z/', $class)) {
// 	  include('classes/' . $class . '.class.php');
// 	}
// }
// spl_autoload_register('my_autoload');

$database = db_connect();
DatabaseObject::set_database($database);

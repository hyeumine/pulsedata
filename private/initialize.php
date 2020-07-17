<?php 

define("DB_SERVER", "us-cdbr-east-02.cleardb.com");
define("DB_USER", "b01244ab209a87");
define("DB_PASS", "2ad7c806");
define("DB_NAME", "heroku_3223da8055cbdc3");

// Connecting to and selecting a MySQL database named sakila
// Hostname: 127.0.0.1, username: your_user, password: your_pass, db: sakila
$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Oh no! A connect_errno exists so the connection attempt failed!
if ($mysqli->connect_errno) {
    // The connection failed. What do you want to do? 
    // You could contact yourself (email?), log the error, show a nice page, etc.
    // You do not want to reveal sensitive information

    // Let's try this:
    echo "Sorry, this website is experiencing problems.";

    // Something you should not do on a public site, but this example will show you
    // anyways, is print out MySQL error related information -- you might log this
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
    // You might want to show them something nice, but we will simply exit
    exit;
}

exit();

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
 Person::set_database($database);

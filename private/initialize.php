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
require_once(PRIVATE_PATH.'/status_error_functions.php');
require_once(PRIVATE_PATH.'/database.php');
require_once(CLASS_PATH.'/person.class.php');
require_once(CLASS_PATH.'/qpersonsummary.class.php');
require_once(CLASS_PATH.'/lgu.class.php');
require_once(CLASS_PATH.'/vitalreading.class.php');
require_once(CLASS_PATH.'/session.class.php');

$db = db_connect();

$errors = [];
$session = new Session;
$user_id = $session->user_login();
$lgu = Lgu::find_user_id($user_id);


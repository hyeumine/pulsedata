<?php

define("DB_SERVER", "us-cdbr-east-02.cleardb.com");
define("DB_USER", "b01244ab209a87");
define("DB_PASS", "2ad7c806");
define("DB_NAME", "heroku_3223da8055cbdc3");


function db_connect() {
  $connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
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

if($database){
	echo "ok";
}else{
	echo "error";
}

?>
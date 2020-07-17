<?php

define("DB_SERVER", "us-cdbr-east-02.cleardb.com");
define("DB_USER", "b01244ab209a87 sdfsdfsdf");
define("DB_PASS", "2ad7c806");
define("DB_NAME", "heroku_3223da8055cbdc3");


$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($mysqli ->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli ->connect_error;
  exit();
}else{
	echo "connect";
}
?>
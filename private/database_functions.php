<?php

function db_connect() {

  $db_user = 'b01244ab209a87';
  $db_pass = '2ad7c806';
  $db_name = 'heroku_3223da8055cbdc3';
  $db_host = 'us-cdbr-east-02.cleardb.com';

  // define("DB_SERVER", "us-cdbr-east-02.cleardb.com");
  // define("DB_USER", "b01244ab209a87");
  // define("DB_PASS", "2ad7c806");
  // define("DB_NAME", "heroku_3223da8055cbdc3");

  $connection = new mysqli($db_host, $db_user, $db_pass, $db_name);
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

?>

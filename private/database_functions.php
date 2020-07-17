<?php

function db_connect() {
  // "$pMysqli = new mysqli('p:'.DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);"
  $connection = new mysqli('p:'.DB_SERVER, DB_USER, DB_PASS, DB_NAME);
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

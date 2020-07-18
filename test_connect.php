<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("DB_SERVER", "us-cdbr-east-02.cleardb.com");
define("DB_USER", "b01244ab209a87");
define("DB_PASS", "2ad7c806");
define("DB_NAME", "heroku_3223da8055cbdc3");

// define("DB_SERVER", "localhost");
// define("DB_USER", "root");
// define("DB_PASS", "");
// define("DB_NAME", "pulsedata");

function db_connect() {
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  confirm_db_connect();
  return $connection;
}

function db_disconnect($connection) {
  if(isset($connection)) {
    mysqli_close($connection);
  }
}

function db_escape($connection, $string) {
  return mysqli_real_escape_string($connection, $string);
}

function confirm_db_connect() {
  if(mysqli_connect_errno()) {
    $msg = "Database connection failed: ";
    $msg .= mysqli_connect_error();
    $msg .= " (" . mysqli_connect_errno() . ")";
    exit($msg);
  }
}

function confirm_result_set($result_set) {
  if (!$result_set) {
    exit("Database query failed.");
  }
}

$db = db_connect();

function insert_admin() {
    global $db;

    $sql = "INSERT INTO qperson ";
    $sql .= "(qcode, lgu_code, fname, mname, lname, mobile_number, address, details, start_date, created_at) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, 'OS-02') . "',";
    $sql .= "'" . db_escape($db, 'LGU-0002') . "',";
    $sql .= "'" . db_escape($db, 'Wail') . "',";
    $sql .= "'" . db_escape($db, 'A') . "',";
    $sql .= "'" . db_escape($db, 'He') . "',";
    $sql .= "'" . db_escape($db, '09103045601') . "',";
    $sql .= "'" . db_escape($db, 'State Lahug') . "',";
    $sql .= "'" . db_escape($db, 'incontact with wail hu') . "',";
    $sql .= "'" . db_escape($db, '2020-06-10') . "',";
    $sql .= "'" . db_escape($db, '2020-06-10') . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

insert_admin();

db_disconnect($db);


?>
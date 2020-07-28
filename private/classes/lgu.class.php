<?php 

class Lgu{

	static protected $table_name = "admins";

	protected $hashed_password;
	public $password;

	public function verify_password($password) {
	    return password_verify($password, $this->hashed_password);
	}

	
	public static function find_user_id($id) {

	    global $db;

	    $sql = "SELECT * FROM lgu ";
	    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
	    $sql .= "LIMIT 1";
	    $result = mysqli_query($db, $sql);
	    confirm_result_set($result);
	    $lgu = mysqli_fetch_assoc($result); // find first
	    mysqli_free_result($result);
	    return $lgu; // returns an assoc. array

	}

	public static function find_by_lgu_code($lgu_code) {

	    global $db;

	    $sql = "SELECT * FROM lgu ";
	    $sql .= "WHERE lgu_code='" . db_escape($db, $lgu_code) . "' ";
	    $sql .= "LIMIT 1";
	    $result = mysqli_query($db, $sql);
	    confirm_result_set($result);
	    $lgu = mysqli_fetch_assoc($result); // find first
	    mysqli_free_result($result);
	    return $lgu; // returns an assoc. array

	}

}


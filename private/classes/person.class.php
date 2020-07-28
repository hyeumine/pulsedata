<?php

class Person{
	
  	public const CONDITION_OPTIONS = [
	    1 => 'PUM',
	    2 => 'PUI',
	    3 => 'Covid+'
	];

	public static function find_all_person(){

	    global $db;

	    $sql = "SELECT * FROM qperson ";
	    $sql .= "ORDER BY start_date DESC ";
	    $result = mysqli_query($db, $sql);
	    confirm_result_set($result);
	    return $result;
	}


	public static function find_person_id($id) {
	    global $db;

	    $sql = "SELECT * FROM qperson ";
	    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
	    $sql .= "LIMIT 1";
	    $result = mysqli_query($db, $sql);
	    confirm_result_set($result);
	    $qperson = mysqli_fetch_assoc($result); // find first
	    mysqli_free_result($result);
	    return $qperson; // returns an assoc. array
	}

	public static function find_all_lgu_qperson($lgu_code){

	    global $db;

	    $sql = "SELECT * FROM qperson ";
	  	$sql .= "WHERE lgu_code='" . db_escape($db, $lgu_code) . "' ";
	    $sql .= "ORDER BY fname ASC";
	    $result = mysqli_query($db, $sql);
	    confirm_result_set($result);
	    return $result; // returns an assoc. array
	}

	public static function findQpersonwithSummary(){

		global $db;

		

	}

	public static function insert_person($person){

		global $db;

	    $errors = validate_qperson($person);
	    if (!empty($errors)) {
	      return $errors;
	    }

	    $sql = "INSERT INTO qperson ";
	    $sql .= "(qcode, lgu_code, fname, mname, lname, mobile_number, address, details, start_date, created_at) ";
	    $sql .= "VALUES (";
	    $sql .= "'" . db_escape($db, $person['qcode']) . "',";
	    $sql .= "'" . db_escape($db, $person['lgu_code']) . "',";
	    $sql .= "'" . db_escape($db, $person['fname']) . "',";
	    $sql .= "'" . db_escape($db, $person['mname']) . "',";
	    $sql .= "'" . db_escape($db, $person['lname']) . "',";
	    $sql .= "'" . db_escape($db, $person['mobile_number']) . "',";
	    $sql .= "'" . db_escape($db, $person['address']) . "',";
	    $sql .= "'" . db_escape($db, $person['details']) . "',";
	    $sql .= "'" . db_escape($db, $person['start_date']) . "',";
	    $sql .= "'" . db_escape($db,  current_date() ) . "' ";
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

	public static function update_person($person) {
	    global $db;

	    $errors = validate_qperson($person);
	     if (!empty($errors)) {
	      return $errors;
	    }

	    $sql = "UPDATE qperson SET ";
	    $sql .= "fname='" . db_escape($db, $person['fname']) . "', ";
	    $sql .= "mname='" . db_escape($db, $person['mname']) . "', ";
	    $sql .= "lname='" . db_escape($db, $person['lname']) . "', ";
	    $sql .= "mobile_number='" . db_escape($db, $person['mobile_number']) . "', ";
	    $sql .= "address='" . db_escape($db, $person['address']) . "', ";
	    $sql .= "details='" . db_escape($db, $person['details']) . "' ";
	    //$sql .= "start_date='" . db_escape($db, $person['start_date']) . "' ";
	    // $sql .= "created_at='" . db_escape($db, current_date() ) . "' ";
	    $sql .= "WHERE id='" . db_escape($db, $person['id']) . "' ";
	    $sql .= "LIMIT 1";
	    $result = mysqli_query($db, $sql);

	    // For UPDATE statements, $result is true/false
	    if($result) {
	      return true;
	    } else {
	      // UPDATE failed
	      echo mysqli_error($db);
	      db_disconnect($db);
	      exit;
	    }
	  }

	public static function condition($condition_id) {

		foreach(self::CONDITION_OPTIONS as $key => $value){

			if($key==$condition_id){
				return $value;
			}else{
				 return "Unknown";
			}
		}
	}

	public static function count_rows_qperson(){

		global $db;

		$sql = "SELECT MAX(id) FROM qperson ";
	    $result = mysqli_query($db, $sql);
	    confirm_result_set($result);
	    $num_rows = mysqli_fetch_row($result);
		$total_rows = $num_rows[0]+1;
	    
	    return self::generate_qcode($total_rows);

	}

	public static function generate_qcode($total_rows){

		$data=[];

		$data['generate'] = $generate = "OS-0".$total_rows;

		return $data['generate'];
	}

	public static function delete_person($id) {
	    global $db;

	    $sql = "DELETE FROM qperson ";
	    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
	    $sql .= "LIMIT 1;";
	    $result = mysqli_query($db, $sql);
	    // For DELETE statements, $result is true/false
	    if($result) {
	      return true;
	    } else {
	      // DELETE failed
	      echo mysqli_error($db);
	      db_disconnect($db);
	      exit;
	    }
	}

}

$person = New Person();

?>
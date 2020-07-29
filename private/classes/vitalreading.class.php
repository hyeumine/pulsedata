<?php

class VitalReading{

	public static function findTypeByID($id){

		global $db;

		$sql = "SELECT * FROM qp_type ";
	    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
	    $sql .= "LIMIT 1";
	    $result = mysqli_query($db, $sql);
	    confirm_result_set($result);
	    $reading = mysqli_fetch_assoc($result); // find first
	    mysqli_free_result($result);
	    if($reading){
	    	return $reading;
	    }else{
	    	return no_data_found();
	    }
	}


}

$vitalreading = New VitalReading();
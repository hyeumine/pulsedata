<?php

class Person{
	
	public static function find_all_person(){
		
	    global $db;

	    $sql = "SELECT * FROM qperson ";
	    $sql .= "ORDER BY fname ASC";
	    $result = mysqli_query($db, $sql);
	    confirm_result_set($result);
	    return $result;
	 }
	
}

$person = New Person();

?>
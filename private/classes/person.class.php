<?php

class Person extends DatabaseObject{
	
	function find_all_admins() {
	    global $db;

	    $sql = "SELECT * FROM qperson ";
	    $sql .= "ORDER BY fname ASC";
	    $result = mysqli_query($db, $sql);
	    confirm_result_set($result);
	    return $result;
	 }
	
}

?>
<?php

class QPersonSummary{
	
	public const CONDITION_OPTIONS = [
	    1 => 'Low',
	    2 => 'Mild',
	    3 => 'Severe'
	];

	/*
	* Display table for index
	*
	*/
	public static function findPSmmryReadingByID($id) {

	    global $db;

	    $sql = "SELECT * FROM qperson_summary ";
	    $sql .= "WHERE qperson_id='" . db_escape($db, $id) . "' ";
	    $sql .= "ORDER BY reading_datetime DESC ";
		$result = mysqli_query($db, $sql);
	    confirm_result_set($result);
	    return $result; // returns an assoc. array
	}

	/*
	* 3 column display for All Patients 
	*
	*/
	public static function find_qperson_status_by_id($id) {

	    global $db;

	    $sql = "SELECT * FROM qperson_summary ";
	    $sql .= "WHERE qperson_id='" . db_escape($db, $id) . "' ";
	    $sql .= "ORDER BY reading_datetime DESC ";
	    $sql .= "LIMIT 1";
	    $result = mysqli_query($db, $sql);
	    confirm_result_set($result);
	    $qperson = mysqli_fetch_assoc($result); // find first
	    mysqli_free_result($result);
	    if($qperson){
	    	return $qperson;
	    }else{
	    	return false;
	    }
	}

	public static function subscriber($mobile_number){

		global $db;

		$sql = "SELECT * FROM subscriber ";
	    $sql .= "WHERE subscriber_number='" . db_escape($db, $mobile_number) . "' ";
	    $result = mysqli_query($db, $sql);
	    $subscriber_count = mysqli_num_rows($result);
	    mysqli_free_result($result);
	    return $subscriber_count === 1;

	}

	public static function subscriber_flag($mobile_number){

		$result = self::subscriber($mobile_number);
		if($result){
			$flag = "<i class='fa fa-check-circle text-success'></i>";
		}else{
			$flag = "<i class='fa fa-times-circle text-danger'></i>"; 
		}	

		return html($flag);
	}

	public static function condition($condition_id) {
			
		foreach(self::CONDITION_OPTIONS as $key => $value){

			if($key == $condition_id){
				
				if( $condition_id == 1 ){

					$html = "<span class='badge badge-pill badge-info'>".$value."</span>";

				}elseif( $condition_id == 2 ){

					$html = "<span class='badge badge-pill badge-warning'>".$value."</span>";


				}elseif( $condition_id == 3 ){

					$html = "<span class='badge badge-pill badge-danger'>".$value."</span>";

				}

				
			}else{

				$html = "<span class='badge badge-pill badge-danger'>unknow</span>";
			}			


		}

		return $html;

	}


}

$person_summary = New Person();

?>
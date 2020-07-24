<?php

class QPersonSummary{
	
	public const CONDITION_OPTIONS = [
	    1 => 'Low',
	    2 => 'Mild',
	    3 => 'Severe'
	];

	public static function find_qperson_summary_id($id) {

	    global $db;

	    $sql = "SELECT * FROM qperson_summary ";
	    $sql .= "WHERE qperson_id='" . db_escape($db, $id) . "' ";
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

					$html = "<h5><span class='badge badge-pill badge-info'>".$value."</span></h5>";

				}elseif( $condition_id == 2 ){

					$html = "<h5><span class='badge badge-pill badge-warning'>".$value."</span></h5>";


				}elseif( $condition_id == 3 ){

					$html = "<h5><span class='badge badge-pill badge-danger'>".$value."</span></h5>";

				}

				return $html;
			}

		}

	}


}

$person_summary = New Person();

?>
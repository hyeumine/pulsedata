<?php

class QPersonSummary{
	
	public const CONDITION_OPTIONS = [
	    1 => 'Low',
	    2 => 'Mild',
	    3 => 'Servere'
	];

	public static function find_qperson_summary_id($id) {
	    global $db;

	    $sql = "SELECT * FROM qperson_summary ";
	    $sql .= "WHERE qperson_id='" . db_escape($db, $id) . "' ";
	    $sql .= "LIMIT 1";
	    $result = mysqli_query($db, $sql);
	    confirm_result_set($result);
	    $data = mysqli_fetch_assoc($result); // find first
	    mysqli_free_result($result);
	    return $data; // returns an assoc. array
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
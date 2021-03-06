<?php

date_default_timezone_set('America/Los_Angeles');


function is_post_request() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request() {
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT .$script_path;
}

/*
*  Get the current index of the url like order.php
* 
*/
function current_page(){
	return $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "" : "") 
	. "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

/*
*  Domain is the site name
* 
*/
function is_page_header($current_page, $index ,$html_output=""){

	$html = "";

	if( $current_page == $index ){
		$html = $html_output;
	}	
	
	return html($html);
}

function is_page($current_page, $index){

	if( $current_page == $index ){
		return true;
	}	
	
	return null;
}

function redirect_to($location) {
  header("Location: " . $location);
  exit;
}

function current_date(){

	$date = date("Y-m-d H:i:s");
	return $date;
}

function h($string="") {
  return htmlspecialchars($string);
}

function u($string="") {
  return urlencode($string);
}

function html($paramenter){
	echo $paramenter;
}

function mdyyyy_format($date){
	$strtotime = strtotime($date);
	$date_str = date('Y-m-d', $strtotime);
	$date = DateTime::createFromFormat('Y-m-d', $date_str);
	return $date->format('m-d-Y');
}

function check_date($date){

	if($date===null){
		$html = "";
		$html .= '<span class="badge badge-danger">Unknow</span>';

		return $html;
	}

}

function mdyyyy_time_format($date){
	$phpdate = strtotime( $date );
	return $mysqldate = date( 'Y-m-d H:i:s', $phpdate );
}


function hour_time_format($date){
	
	$phpdate = strtotime( $date );
	return $mysqldate = date( 'H:i:s', $phpdate );
}

function is_blank($value) {
	return !isset($value) || trim($value) === '';
}

function error_404() {
  header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
  exit();
}

function readmore_details($string, $id){

	// strip tags to avoid breaking any html
	$string = strip_tags($string);
	if (strlen($string) > 50 ) {

	    // truncate string
	    $stringCut = substr($string, 0, 50);
	    $endPoint = strrpos($stringCut, ' ');

	    //if the string doesn't contain any space then it will cut without word basis.
	    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);

	    $url = url_for('/staff/patients/show.php?id='.h(u($id)));

	    $string .= "<a class='action text-info' href='".$url ."'>...read more</a>";
	}
	html($string);

}




function no_data_found(){

	$html = "";
	$html .= '<span class="badge badge-danger">Unknow</span>';

	return $html;
}
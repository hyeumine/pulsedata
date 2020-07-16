<?php

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
	
}

function html($paramenter){
	echo $paramenter;
}


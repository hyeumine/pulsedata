<?php

define("SITE_NAME", $_SERVER['SERVER_NAME'] );

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
function is_page($current_page, $index ,$header_title){

	$title = "";
	if( $current_page == $index ){
		$title = $header_title;
	}	
	
	return html($title);
}

function html($paramenter){
	echo $paramenter;
}
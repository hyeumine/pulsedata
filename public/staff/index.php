<?php

// Redirect all default requests to login page
require_once('../../private/initialize.php');
$url = url_for('/staff/patients/');	
header("Location: $url ");

?>

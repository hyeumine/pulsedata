<?php
	if(isset($_REQUEST['access_token']) && isset($_REQUEST['subscriber_number'])){
	 $p =  mysqli_connect("us-cdbr-east-02.cleardb.com","b01244ab209a87","2ad7c806","heroku_3223da8055cbdc3");
	 mysqli_query($p, "INSERT INTO subscriber VALUES(NULL,'".$_REQUEST['access_token']."','".$_REQUEST['subscriber_number']."',NULL)");
	}
?>
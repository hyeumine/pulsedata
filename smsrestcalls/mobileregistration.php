<?php
	 $p =  mysqli_connect("us-cdbr-east-02.cleardb.com","b01244ab209a87","2ad7c806","heroku_3223da8055cbdc3");

	 $res = mysqli_query($p, "SELECT MAX(id) as c FROM qperson WHERE lgu_code='MOB-001'");

	 $c = 0;
	 while($r = mysqli_fetch_assoc($res)){
	    $c = $r['c'];
	 	break;
	 }

	 $res = mysqli_query($p, "INSERT INTO qperson VALUES(NULL,'MOB-". str_pad($c+1, 5, '0', STR_PAD_LEFT) ."','MOB-001','".$_REQUEST['fname']."','".$_REQUEST['mname']."','".$_REQUEST['lname']."','".$_REQUEST['mobile_number']."','".$_REQUEST['address']."','','',NULL)");
	 echo "MOB-". str_pad($c+1, 5, '0', STR_PAD_LEFT);

?>

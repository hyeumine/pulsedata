<?php
	 $p =  mysqli_connect("us-cdbr-east-02.cleardb.com","b01244ab209a87","2ad7c806","heroku_3223da8055cbdc3");

	 $res = mysqli_query($p, "SELECT MAX(id) as c FROM qperson WHERE lgu_code='MOB-001");

	 while($r = mysqli_fetch_assoc($res)){
	 	echo $r['c'];
	 }

?>

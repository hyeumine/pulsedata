<?php
 	$p =  mysqli_connect("us-cdbr-east-02.cleardb.com","b01244ab209a87","2ad7c806","heroku_3223da8055cbdc3");
	$res = mysqli_query($p, "SELECT * FROM subscriber as s JOIN qperson as p ON s.subscriber_number=p.mobile_number WHERE s.subscriber_number='". $_REQUEST['mobile_number'] ."'");
	$b = 0;
	while($r = mysqli_fetch_assoc($res)){
			$b=1;
			if($_REQUEST['qcode'] != $r['qcode']){
				echo  2;
			}
			else{
				echo 0;
			}
			break;
	}
	if($b==0)
		echo 1;
?>
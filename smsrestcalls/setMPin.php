<?php
	 $p =  mysqli_connect("us-cdbr-east-02.cleardb.com","b01244ab209a87","2ad7c806","heroku_3223da8055cbdc3");


	 $res = mysqli_query($p, "SELECT * FROM qperson WHERE qcode='".$_REQUEST['qcode']."'");

	    $b = 0;
		while($r = mysqli_fetch_assoc($res)){
			$b=1;
			mysqli_query($p, "INSERT INTO qcode_mpin VALUES(NULL,'".$_REQUEST['qcode']."','".$_REQUEST['mpin']."')");
			echo 0;
			break;
		}
		if($b==0)
		   echo 1;

?>
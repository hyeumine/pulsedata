<?php
$p =  mysqli_connect("us-cdbr-east-02.cleardb.com","b01244ab209a87","2ad7c806","heroku_3223da8055cbdc3");
$json = file_get_contents('php://input');
$json = stripslashes($json);
$values = json_decode($json, true);
$arr = $values['inboundSMSMessageList']['inboundSMSMessage'];
foreach($arr as $a){
	mysqli_query($p, "INSERT INTO sms_log VALUES(NULL,'".$a['messageId']."','". (explode(':',$a['senderAddress'])[1])."','".$a['message']."','".$a['dateTime']."')");
}
?>
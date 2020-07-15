<?php
	 $p =  mysqli_connect("us-cdbr-east-02.cleardb.com","b01244ab209a87","2ad7c806","heroku_3223da8055cbdc3");
	$res = mysqli_query($p, "SELECT * FROM subscriber as s JOIN qperson as p ON s.subscriber_number=p.mobile_number");

?>
<?php
	if(isset($_REQUEST['message']) && isset($_REQUEST['token'])){
		$token = explode('-',$_REQUEST['token']);
		var_dump($token);
		$postRequest = array(
		    'outboundSMSMessageRequest' =>
		    array(
		    	 "clientCorrelator"=> "123456",
				   "senderAddress"=> "21589965",
				   "outboundSMSTextMessage"=> array("message"=>$_REQUEST['message']),
   					"address"=> "+".$token[1]
		    )
		);

		$cURLConnection = curl_init('https://devapi.globelabs.com.ph/smsmessaging/v1/outbound/21589965/requests?access_token='.$token[0]);
		curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
		curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

		$apiResponse = curl_exec($cURLConnection);
		var_dump($apiResponse);
		curl_close($cURLConnection);
	}
?>
<form action='' method='post'>
<select name='token'>
<?php
	while($r = mysqli_fetch_assoc($res)){
		echo "<option value='". $r['access_token']. "-" . $r['subscriber_number'] ."'>". $r['qcode'] . " - ". $r['subscriber_number']."</option>";
	}

?>
<input type='text' name='message'>
</select>
</form>
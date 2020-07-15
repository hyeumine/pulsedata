<?php
	 $p =  mysqli_connect("us-cdbr-east-02.cleardb.com","b01244ab209a87","2ad7c806","heroku_3223da8055cbdc3");
	$res = mysqli_query($p, "SELECT * FROM subscriber as s JOIN qperson as p ON s.subscriber_number=p.mobile_number");

?>
<?php
	if(isset($_REQUEST['message']) && isset($_REQUEST['token'])){

		$token = explode('-',$_REQUEST['token']);
		var_dump($token);

		$post = [
			'outboundSMSMessageRequest' => [
				"clientCorrelator"=> "123456",
				   "senderAddress"=> "9965",
   				    "address" => "+639664136950",
				   "outboundSMSTextMessage"=> ["message"=>'ert']
			]
		];

		$ch = curl_init('https://devapi.globelabs.com.ph/smsmessaging/v1/outbound/9965/requests?access_token='.$token[0]);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

		// execute!
		$response = curl_exec($ch);

		// close the connection, release resources used
		curl_close($ch);

		// do anything you want with your response
		var_dump($response);

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
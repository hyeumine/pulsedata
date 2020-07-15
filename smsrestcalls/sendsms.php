<?php
	 $p =  mysqli_connect("us-cdbr-east-02.cleardb.com","b01244ab209a87","2ad7c806","heroku_3223da8055cbdc3");
	$res = mysqli_query($p, "SELECT * FROM subscriber as s JOIN qperson as p ON s.subscriber_number=p.mobile_number");

?>
<form action='' method='post'>
<select>
<?php
	while($r = mysqli_fetch_assoc($res)){
		echo "<option value='". $res['access_token'] ."'>". $res['qcode'] . " - ". $res['subscriber_number']."</option>";
	}

?>
<input type='text' name='message'>
</select>
</form>
<?php

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://smsportal.hostpinnacle.co.ke/SMSApi/send",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "userid=BROOKHILLSCHOOL&password=Qz5T3nkS&&sendMethod=quick&mobile=25492867363&msg=Test+From+Developer+Team&senderid=BROOKHILL&msgType=text&duplicatecheck=true&output=json",
		CURLOPT_HTTPHEADER => array(
			"apikey:6ee11d9df2cd22ac1e56b098644649a84e4bb250",
			"cache-control: no-cache",
			"content-type: application/x-www-form-urlencoded"
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		echo $response;
	}
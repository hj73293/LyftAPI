<?php
$CLIENT_ID='18FeLaxUvaHb';
$CLIENT_SECRET='c_ygXWlHPIh9-ZqyOiO_qmWr0SreQhtZ';
$URL='https://api.lyft.com/oauth/token';

//authenticates a token to access the API

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$URL);
curl_setopt($ch, CURLOPT_TIMEOUT, 360); //timeout after 360 seconds
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  //returns as a string instead of console
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_POST, true); //do a regular post
curl_setopt($ch, CURLOPT_POSTFIELDS, array( "grant_type" => "client_credentials" , "scope" => "public" ) ); 
curl_setopt($ch, CURLOPT_USERPWD, "$CLIENT_ID:$CLIENT_SECRET");
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
$result=curl_exec($ch);
curl_close($ch);

$tokenObj = json_decode($result);

//Retrieves the Ride API

$RideURL = 'https://api.lyft.com/v1/ridetypes?lat=37.7833&lng=-122.4167';
$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, $RideURL);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , 'Authorization: Bearer '.$tokenObj->access_token));
curl_setopt($ch1, CURLOPT_TIMEOUT, 30);
$RideType = curl_exec($ch1);
curl_close($ch1);

$RideData = json_decode($RideType);

//Retrieves the Cost API

$CostURL = 'https://api.lyft.com/v1/cost?start_lat=37.7772&start_lng=-122.4233&end_lat=37.7972&end_lng=-122.4533';
$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL, $CostURL);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , 'Authorization: Bearer '.$tokenObj->access_token));
$CostType = curl_exec($ch2);
curl_close($ch2);

$CostData = json_decode($CostType);

?>

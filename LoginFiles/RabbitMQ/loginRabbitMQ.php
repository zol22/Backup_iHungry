<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

//$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

function login($userName,$userPassword)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

	$request1 = array();
	$request1['type'] = "login";
	$request1['username'] = $userName;
    	$request1['password'] = $userPassword;

	$response = $client->send_request($request1);
		
	
	return $response;
}



function register($userName,$userPassword)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

	$request2 = array();
	$request2['type'] = "register";
	$request2['username'] = $userName;
   	$request2['password'] = $userPassword;

	$response = $client->send_request($request2);
		
	
	return $response;
}

?>

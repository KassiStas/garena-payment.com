<?php
	// move the private keyfile to private folder where users cant access via public http
	//define('PRIVATEKEY_FILE', '/var/www/private/prikey.pem');
	$test = false;

	require_once('GWSClient.php');
	require_once('GWSClientException.php');
	require_once('CVO_WSRequest.php');
	require_once('CVO_WSResponse_Message.php');
	require_once('phpseclib0.2.1a/AES.php');

	if ($test) {
		$gcmsws_server = 'http://74.86.179.242';
	} else {
		$gcmsws_server = 'http://67.228.162.189';
	}
	$gcmsws_port = '8900';
	$gcms_app_id = '{D6F5C254-755A-48eb-81B8-719A864681F3}';
	$gcms_auth_key = '{C390066B-E47B-4476-943B-0B2FBB879660}';

	GLOBAL $gcmsws_client;
	$gcmsws_client = new GWSClient($gcmsws_server, $gcmsws_port, $gcms_app_id, $gcms_auth_key, FALSE);



?>
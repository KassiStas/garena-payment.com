<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
set_time_limit(3000);
date_default_timezone_set('Asia/Singapore');

	require_once('include.php');
	$getUserIp = $_SERVER['REMOTE_ADDR'];
	try {
		// $gws_client->set_module('SSOWeb');
		// $test = $gws_client->auth_by_username('userbs3',md5('123'),$getUserIp);		
		// $user = $test->body;
		// var_dump($user);
		// echo "<br>=====</br>";
		 // $rq = $gws_client->check_token_exist($user["token"],$_SERVER['REMOTE_ADDR']); 
         // $userq = $rq->body; 
		// var_dump($userq);	
		// echo "<br>=====</br>";
		$gws_client->set_module('User'); 
        $r = $gws_client->get_fullinfo_by_uid(56109663); 
		$u = $r->body;
		var_dump($u);
	}
	catch (Exception $e) {
		echo $e->getMessage();
	}
?>

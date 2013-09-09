<?php
    // move the private keyfile to private folder where users cant access via public http
    define('PRIVATEKEY_FILE', '/var/www/private/prikey.pem');
    $test = true;

    require_once('GWSClient.php');
    require_once('GWSClientException.php');
    require_once('CVO_WSRequest.php');
    require_once('CVO_WSResponse_Message.php');
    require_once('phpseclib0.2.1a/AES.php');

    if ($test) {
        $gws_server = 'http://203.117.172.220' ;     
		$app_id = '{W0807-06F1CE38-AF9D-4000-A627-06CBD1764E99}';
    } else {
        $gws_server = 'http://sg.ws.garenanow.com' ;           
		$app_id = '{766A70E0-8E29-4797-91E5-0CD05A2DEFA4}';    
    }
    $gws_port = '8900';
    $auth_key = '{C390066B-E47B-4476-943B-0B2FBB879660}';
//    
    //$app_id = '{44676AA2-B337-40bb-A329-58DBE6B7A328}';
    //$auth_key = '{C390066B-E47B-4476-943B-0B2FBB879660}';

    GLOBAL $gws_client;
    $gws_client = new GWSClient($gws_server, $gws_port, $app_id, $auth_key, FALSE);
    $gws_client->enable_log = false;    // make this true to log all webservice API call to logs folder!!!

?>
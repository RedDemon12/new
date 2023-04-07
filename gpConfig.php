<?php
if(session_id() == '') {
    session_start();
}
//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '164220803848-psl7lqj1bagnpk38o72hptfhna3nm07j.apps.googleusercontent.com'; //Google client ID
$clientSecret = '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'; //Google client secret
$redirectURL = 'http://localhost/temp/goghome.php'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to InfoServOps Inhouse Forum');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
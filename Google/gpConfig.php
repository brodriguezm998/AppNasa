<?php
if(!session_id()){
    session_start();
}

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '502854756875-5ier2nhnlrlbrj8stit9asn9abee9o71.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'Cn-sNnMm4zFaau3NnXcxE7hB'; //Google client secret
$redirectURL = 'http://localhost/AppNasa/Google/index.php'; //Callback URL


//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to Google');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
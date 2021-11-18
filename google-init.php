<?php 
// init configuration
require_once 'vendor/autoload.php';
include "./libraries.html"; 

global $client;

$clientID = '572338156481-tdcmanaifjfr0hg0hmhbu2o04i4sqlsq.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost:30001/home.php';
  
// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
?>
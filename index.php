<!DOCTYPE html>
<html>

<?php 
// echo __DIR__;
include "./mysql-connect.php"; 
include "./libraries.html"; 
require_once 'vendor/autoload.php';
 
// init configuration
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
 
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
  
  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;
 
  // now you can use this profile info to create account in your website and make user logged in.
} else {
  echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
}

?>
<head>
</head>
<script>

</script>

<body id="top">
</body>
</html>









<?php 
    // $testString = "hello";
    // $testInt = 4;
    // $sqlTest = "INSERT INTO tbl_test (word, num) VALUES (?, ?)";
    // $stmt = $conn->prepare($sqlTest);
    // $stmt->bind_param("si", $testString, $testInt);

    // if($stmt->execute()){
    //   echo "worked <br><br>";
    // }
    ?>
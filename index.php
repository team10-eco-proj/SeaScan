<?php 
session_start();

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
 
// // authenticate code from Google OAuth Flow
// if (isset($_GET['code'])) {
//   $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
//   $client->setAccessToken($token['access_token']);
  
//   // get profile info
//   $google_oauth = new Google_Service_Oauth2($client);
//   $google_account_info = $google_oauth->userinfo->get();
//   $email =  $google_account_info->email;
//   $name =  $google_account_info->name;
 
//   // now you can use this profile info to create account in your website and make user logged in.
// } else {
//   echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
// }

if(isset($_GET['code'])){ 
  $client->authenticate($_GET['code']); 
  $_SESSION['token'] = $client->getAccessToken(); 
  header('Location: ' . filter_var(GOOGLE_REDIRECT_URL, FILTER_SANITIZE_URL)); 
} 

if(isset($_SESSION['token'])){ 
  $client->setAccessToken($_SESSION['token']); 
} 

if($client->getAccessToken()){ 
  // Get user profile data from google 
  $gpUserProfile = $google_oauthV2->userinfo->get(); 
   
  // Initialize User class 
  $user = new User(); 
   
  // Getting user profile info 
  $gpUserData = array(); 
  $gpUserData['oauth_uid']  = !empty($gpUserProfile['id'])?$gpUserProfile['id']:''; 
  $gpUserData['first_name'] = !empty($gpUserProfile['given_name'])?$gpUserProfile['given_name']:''; 
  $gpUserData['last_name']  = !empty($gpUserProfile['family_name'])?$gpUserProfile['family_name']:''; 
  $gpUserData['email']       = !empty($gpUserProfile['email'])?$gpUserProfile['email']:''; 
  $gpUserData['gender']       = !empty($gpUserProfile['gender'])?$gpUserProfile['gender']:''; 
  $gpUserData['locale']       = !empty($gpUserProfile['locale'])?$gpUserProfile['locale']:''; 
  $gpUserData['picture']       = !empty($gpUserProfile['picture'])?$gpUserProfile['picture']:''; 
   
  // Insert or update user data to the database 
  $gpUserData['oauth_provider'] = 'google'; 
  $userData = $user->checkUser($gpUserData); 
   
  // Storing user data in the session 
  $_SESSION['userData'] = $userData; 
   
  // Render user profile data 
  if(!empty($userData)){ 
      $output     = '<h2>Google Account Details</h2>'; 
      $output .= '<div class="ac-data">'; 
      $output .= '<img src="'.$userData['picture'].'">'; 
      $output .= '<p><b>Google ID:</b> '.$userData['oauth_uid'].'</p>'; 
      $output .= '<p><b>Name:</b> '.$userData['first_name'].' '.$userData['last_name'].'</p>'; 
      $output .= '<p><b>Email:</b> '.$userData['email'].'</p>'; 
      $output .= '<p><b>Gender:</b> '.$userData['gender'].'</p>'; 
      $output .= '<p><b>Locale:</b> '.$userData['locale'].'</p>'; 
      $output .= '<p><b>Logged in with:</b> Google Account</p>'; 
      $output .= '<p>Logout from <a href="logout.php">Google</a></p>'; 
      $output .= '</div>'; 
  }else{ 
      $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>'; 
  } 
}
else{ 
  // Get login url 
  $authUrl = $client->createAuthUrl(); 
   
  // Render google login button 
  $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'">Sign In With Google</a>'; 
} 
?>

<!DOCTYPE html>
<html>

<head>
  <style>
    .gradient-custom {
      /* fallback for old browsers */
      background: #6a11cb;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
    }

    .btn-google {
      color: white !important;
      background-color: #ea4335;
    }

    .btn-google hover {
      color: white !important;
      background-color: #f1837a;
    }

    .d-grid {
      margin-top: -50px
    }

    a {
      color: white;
    }

    a hover {
      color: white;
    }
  </style>
</head>
<script>

</script>

<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">SeaScan</h2>
              <!-- <p class="text-white-50 mb-5">Please enter your login and password!</p> -->
              
             
              <!-- <div class="form-outline form-white mb-4">
                <input type="email" id="typeEmailX" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX">Email</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="typePasswordX" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX">Password</label>
              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button> -->

              <!-- <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div> -->

            </div>
            <div class="d-grid mb-2">
                <button class="btn btn-google btn-login text-uppercase fw-bold" type="submit">
                  <i class="fab fa-google me-2"></i> <?php echo $output; ?>
                </button>
              </div>
            <!-- <div>
              <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a></p>
            </div> -->

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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
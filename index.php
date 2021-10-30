<?php 
session_start();
// print_r($_SESSION);
// echo __DIR__;
include "./mysql-connect.php"; 
include "./libraries.html"; 
include './google-init.php';
require_once 'vendor/autoload.php';
 

if (isset($_SESSION['access_token'])) {
  echo "<script>window.location.href='home.php';</script>";
  exit;
}
 
if(isset($_GET['code'])){ 
  $client->authenticate($_GET['code']); 
  $_SESSION['access_token'] = $client->getAccessToken(); 
  // header('Location: ' . filter_var(GOOGLE_REDIRECT_URL, FILTER_SANITIZE_URL)); 

  $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);

  if (!isset($token["error"])) {
    $client->setAccessToken($token["access_token"]);

    $_SESSION["access_token"] = $token["access_token"];

    $service = new Google_Service_Oauth2($client);
    $data = $service->userinfo->get();
    print_r($data);

    if (!empty($data['given_name'])) {
      $_SESSION['first_name'] = $data['given_name'];
    }

    if (!empty($data['family_name'])) {
      $_SESSION['last_name'] = $data['family_name'];
    }

    if (!empty($data['email'])) {
      $_SESSION['email_id'] = $data['email'];
    }
  }
} 



if($client->getAccessToken()){ 
  // Initialize User class 
  // $user = new User(); 
}
?>

<!DOCTYPE html>
<html>

<head>
  <style>
    .gradient-custom {
      background: #6a11cb;
      background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
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

    .d-grid { margin-top: -50px }
    a { color: white; }
    a:hover { color: white; }
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
                  <i class="fab fa-google me-2"></i> <a href="<?php echo $client->createAuthUrl(); ?>">Sign In With Google</a>
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
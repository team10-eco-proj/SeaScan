<?php 
session_start();
include './google-init.php';

// unset($_SESSION['access_token']);

$client->revokeToken();
session_unset();
session_destroy();

echo "<script>window.location.href='index.php';</script>";
exit;
?>
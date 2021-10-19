<!DOCTYPE html>
<html>

<?php 
// echo $_SERVER['DOCUMENT_ROOT'];
// echo "<br><br>";
echo __DIR__;
// echo "<br><br>";
include "./mysql-connect.php"; 
include "./libraries.html"; 
?>

<head>
<?php 
    // $rootPath = $_SERVER['DOCUMENT_ROOT'] . "/GitHub/SeaScan";
        // echo $rootPath;
?>
</head>
<script>
    $(document).ready(function(){
        $('#navContainer').load('./sideNavBar.php');  
        $('#contentBody').load('./Home/view_home.php');  
    });
</script>

<body id="top">
<!-- START OF SIDE NAV BAR -->

    <div class="row" id="body-row">
        <div id="navContainer" class="col-md-2">
        
        </div>
        <div id="contentBody" class="col-md-10">
        </div>
    </div>
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
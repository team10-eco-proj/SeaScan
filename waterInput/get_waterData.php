<?php 
 include "../mysql-connect.php"; 

$rows = array();
$sql = "SELECT * FROM water_data";

$r = $conn->query($sql);
while($row = $r->fetch_object()){
    $rows[] = $row;
}

// var_dump($r);
// $arr = $r->fetch_assoc();

echo json_encode($rows);
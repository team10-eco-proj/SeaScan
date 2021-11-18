<?php

global $conn;

if(!empty($_ENV['MYSQL_HOST'])){
    $host = $_ENV['MYSQL_HOST'];
}else{
    $host = 'seascan-master-sql';
}
if(!empty($_ENV['MYSQL_USER'])){
    $user = $_ENV['MYSQL_USER'];
}else{
    $user = 'user';
    $user = 'root';
}
if(!empty($_ENV['MYSQL_PASSWORD'])){
    $pass = $_ENV['MYSQL_PASSWORD'];
}else{
    $pass = 'password';
    $pass = 'root';
}
if(!empty($_ENV['MYSQL_DB'])){
    $db_name = $_ENV['MYSQL_DB'];
}else{
    $db_name = 'seascan';
}
///idk
// echo $_ENV['MYSQL_HOST'];
// echo "<br><br>";
// echo "Connecting to Database: $host $user $pass $db_name";
// echo "<br><br>";

$conn = new mysqli($host, $user, $pass, $db_name);
/* check connection */
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}

/* check if server is alive */
// if ($conn->ping()) {
//     // printf ("Our connection is ok!\n");
// } else {
//     // printf ("Error: %s\n", $conn->error);
// }
// echo "<script type='text/javascript'>alert('$conn->connection_status');</script>";

// if ($conn->connect_error) {
     // die("Connection failed: " . $conn->connect_error);
// } 
// echo "Connected to MySQL successfully!";
// echo "<br><br>";

// $res = $conn->query("Select ITEM_NAME, ITEM_DESC, ITEM_ONHAND from MOE_ITEM_T");

// for ($row_no = 0; $row_no < $res->num_rows; $row_no++) {
//     $res->data_seek($row_no);
//     $row = $res->fetch_assoc();
//     echo " Item Name = " . $row['ITEM_NAME'] . " Item Description = " . $row['ITEM_DESC'] . " Item Onhand = " . $row['ITEM_ONHAND'];
//     echo "<br>";
// }

// $res->close();
// $conn->close();

?>
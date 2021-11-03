<?php
include "../mysql-connect.php";

$response;

$temp = filter_input(INPUT_POST, 't', FILTER_SANITIZE_STRING);
$sal = filter_input(INPUT_POST, 's', FILTER_SANITIZE_STRING);
$lat = filter_input(INPUT_POST, 'la', FILTER_SANITIZE_STRING);
$long = filter_input(INPUT_POST, 'lo', FILTER_SANITIZE_STRING);
//$date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);


if($conn === false){
   echo "ERROR: could not connect";
}

$query = "INSERT INTO water_data (temp, salinity, grid_lat, grid_long, user_fk)
VALUES ('$temp', '$sal', '$lat', '$long', 1)";

if(mysqli_query($conn, $query)){
  echo "YES";
}
else{
  echo "NO";
}

// $numRows = $db->affected_rows;
// if($numRows == 1){
//
//  }else{
//      print_r($obj);
//      echo 0;
// }
$response['temp'] = $temp;
$response['salinity'] = $sal;
$response['lat'] = $lat;
$response['long'] = $long;
//$response['date'] = $date;


echo json_encode($response);




//$query = "insert into water_data(temp, salinity, grid_lat, grid_long) values('$temp', '$sal', '$lat', '$long')";

//$run = mysqli_query($conn, $query);


//$start = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


//$sqlUpdateEvent =   "UPDATE tbl_events
//                     SET start = '$start', end='$end', all_day='$allDay'
//                     WHERE event_id = $id";

//echo $sqlUpdateEvent;
//$r_updateEvent = $db->query($sqlUpdateEvent);
// if(isset($_POST['submit'])){
//     if(isset($_REQUEST['btn_waterInputSubmit'])){
//         $SQL = $sqlUpdateEvent = "INSERT INTO water_data (temp, salinity, grid_lat, grid_long, log_time) VALUES ($temp, $sal, $lat, $long, $date)";
//         $result = mysqli_query($SQL);

//     $response['temp'] = $temp;
//     $response['salinity'] = $sal;
//     $response['lat'] = $lat;
//     $response['long'] = $long;
//     $response['date'] = $date;


//     }
// }

//$sqlUpdateEvent = "INSERT INTO water_data (temp, salinity, grid_lat, grid_long, log_time)
// VALUES ($temp, $sal, $lat, $long, $date)";

// $result = mysqli_query($conn, $sql);

// if($run){
//     echo "Form submitted successfully";
// }
?>

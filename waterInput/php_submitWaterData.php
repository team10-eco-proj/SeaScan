<?php
include "../mysql-connect.php"; 

$response;

$temp = filter_input(INPUT_POST, 't', FILTER_SANITIZE_STRING);
$sal = filter_input(INPUT_POST, 's', FILTER_SANITIZE_STRING);
$lat = filter_input(INPUT_POST, 'la', FILTER_SANITIZE_STRING);
$long = filter_input(INPUT_POST, 'lo', FILTER_SANITIZE_STRING);
$date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);

$sql = "INSERT INTO water_data (temp, salinity, grid_lat, grid_long, user_fk)
        VALUES ('$temp', '$sal', '$lat', '$long', 1)";
// echo $sql;

$conn->query($sql);


$numRows = $conn->affected_rows;
if($numRows == 1){
    echo 1;
}else{
    // print_r($obj);
    echo 0;
}

if(!isset($conn)){ 
    printf("\nDISCONNECTED"); 
}else{
    // print_r($conn);
}

// $response['temp'] = $temp;
// $response['salinity'] = $sal;
// $response['lat'] = $lat;
// $response['long'] = $long;
// $response['date'] = $date;



// echo json_encode($response);

// $sqlUpdateEvent =   "UPDATE tbl_events 
//                     SET start = '$start', end='$end', all_day='$allDay'
//                     WHERE event_id = $id";
                    
//echo $sqlUpdateEvent;
//$r_updateEvent = $db->query($sqlUpdateEvent);
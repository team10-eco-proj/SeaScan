<?php
include "../mysql-connect.php"; 

$response;

$temp = filter_input(INPUT_POST, 't', FILTER_SANITIZE_STRING);
$sal = filter_input(INPUT_POST, 's', FILTER_SANITIZE_STRING);
$lat = filter_input(INPUT_POST, 'la', FILTER_SANITIZE_STRING);
$long = filter_input(INPUT_POST, 'lo', FILTER_SANITIZE_STRING);
$date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);

// $start = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


// $sqlUpdateEvent =   "UPDATE tbl_events 
//                     SET start = '$start', end='$end', all_day='$allDay'
//                     WHERE event_id = $id";
                    
//echo $sqlUpdateEvent;
//$r_updateEvent = $db->query($sqlUpdateEvent);
$numRows = $db->affected_rows;
if($numRows == 1){
    // echo 1;
}else{
    print_r($obj);
    // echo 0;
}
$response['temp'] = $temp;
$response['salinity'] = $sal;
$response['lat'] = $lat;
$response['long'] = $long;
$response['date'] = $date;



echo json_encode($response);
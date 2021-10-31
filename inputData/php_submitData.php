<?php
include "../mysql-connect.php"; 

// $response;
$mail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$pw = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
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
$response['email'] = $mail;
$response['pw'] = $pw;

echo json_encode($response);
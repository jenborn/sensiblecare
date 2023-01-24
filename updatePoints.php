<?php
require_once "classes/User.php";

$json = file_get_contents('php://input');
$input = json_decode($json);
$pointValue = $input->pointValue;
$userID = $input->userID;

if(isset($pointValue) && isset($userID)){
    $user = new User(['userID' => $userID, 'pointValue' => $pointValue]);
    $result = $user->updateUserPoints();
    echo json_encode(['status' => $result]);
}else{
    echo "Error!  Point Value and User ID are required";
}
?>
<?php
error_reporting(E_ALL);
//ini_set('display_errors',1);

include('dbcon.php');

$user_id = $_POST['user_id'];

        if(empty($user_id)){
                $errMSG = "오류.";
        }
		
$sql="select * from my_routine where user_id='$user_id'";
$stmt = $con->prepare($sql);
$stmt->execute();
$data = array();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        array_push($data, array('id'=>$row["id"], 'user_id'=>$row["user_id"], 'trainer_id'=>$row["trainer_id"], 'date_message'=>$row["date_message"], 'break_message'=>$row["break_message"], 'lunch_message'=>$row["lunch_message"], 'dinner_message'=>$row["dinner_message"], 'set_message'=>$row["set_message"], 'routine_message'=>$row["routine_message"]));
}
header('Content-Type: application/json; charset=utf8');
$json = json_encode(array("fgy"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
echo $json;
?>

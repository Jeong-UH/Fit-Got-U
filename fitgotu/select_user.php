<?php
error_reporting(E_ALL);
//ini_set('display_errors',1);

include('dbcon.php');

$user_id = $_POST['user_id'];

        if(empty($user_id)){
                $errMSG = "오류.";
        }

$sql="select username, home_address, is_user, weight, height from user where user_id='$user_id'";
$stmt = $con->prepare($sql);
$stmt->execute();
$data = array();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        array_push($data, array('username'=>$row["username"],'home_address'=>$row["home_address"],'is_user'=>$row["is_user"],'weight'=>$row["weight"],'height'=>$row["height"]));
}
header('Content-Type: application/json; charset=utf8');
$json = json_encode(array("fgy"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
echo $json;
?>


<?php
error_reporting(E_ALL);
//ini_set('display_errors',1);

include('dbcon.php');

$trainer_id = $_POST['trainer_id'];

        if(empty($trainer_id)){
                $errMSG = "오류.";
        }

$sql="select * from subscription where trainer_id='$trainer_id'";
$stmt = $con->prepare($sql);
$stmt->execute();
$data = array();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        array_push($data, array('id'=>$row["id"],'user_id'=>$row["user_id"],'trainer_id'=>$row["trainer_id"],'status'=>$row["status"]));
}
header('Content-Type: application/json; charset=utf8');
$json = json_encode(array("fgy"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
echo $json;
?>


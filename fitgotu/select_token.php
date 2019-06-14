
<?php
error_reporting(E_ALL);
//ini_set('display_errors',1);

include('dbcon.php');

$id = $_POST['id'];

        if(empty($id)){
                $errMSG = "오류.";
        }

$sql="select token from fcmtoken where id='$id'";
$stmt = $con->prepare($sql);
$stmt->execute();
$data = array();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        array_push($data, array('token'=>$row["token"]));
}
header('Content-Type: application/json; charset=utf8');
$json = json_encode(array("fgy"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
echo $json;
?>

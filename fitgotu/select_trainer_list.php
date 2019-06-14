
<?php
error_reporting(E_ALL);
//ini_set('display_errors',1);

include('dbcon.php');

$is_user = '트레이너';
$sql="select user_id, username, profile_image, home_address, is_user, youtube, weight, height from user where is_user='$is_user'";
$stmt = $con->prepare($sql);
$stmt->execute();
$data = array();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        array_push($data, array('user_id'=>$row["user_id"],'weight'=>$row["weight"],'height'=>$row["height"],'username'=>$row["username"],'profile_image'=>$row["profile_image"],'home_address'=>$row["home_address"],'is_user'=>$row["is_user"],'youtube'=>$row["youtube"]));
}
header('Content-Type: application/json; charset=utf8');
$json = json_encode(array("fgy"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
echo $json;
?>

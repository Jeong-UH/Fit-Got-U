<?php
error_reporting(E_ALL);
//ini_set('display_errors',1);

include('dbcon.php');

$user_id = $_POST['user_id'];

$sql="select j1,j2,j3,j4,j5,j6,j7,j8,j9,j10,j11,j12 from exercise_joint where user_id='$user_id'";
$stmt = $con->prepare($sql);
$stmt->execute();
$data = array();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        array_push($data, array('j1'=>$row["j1"], 'j2'=>$row["j2"], 'j3'=>$row["j3"], 'j4'=>$row["j4"], 'j5'=>$row["j5"], 'j6'=>$row["j6"], 'j7'=>$row["j7"], 'j8'=>$row["j8"],  'j9'=>$row["j9"], 'j10'=>$row["j10"], 'j11'=>$row["j11"], 'j12'=>$row["j12"]));
}
header('Content-Type: application/json; charset=utf8');
$json = json_encode(array("fgy"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
echo $json;
?>

<?php

    error_reporting(E_ALL);
    //ini_set('display_errors',1);

    include('dbcon.php');

        $user_id=$_POST['user_id'];
        $weight =$_POST['weight'];
        $height =$_POST['height'];
        $address =$_POST['home_address'];
	$youtube = $_POST['youtube'];

        if(empty($user_id) || empty($weight) || empty($height) || empty($address) || empty($youtube)){
                $errMSG = "오류.";
        }

        if(!isset($errMSG)) {
                try{
                        $sql="UPDATE user SET weight='$weight', height='$height', home_address='$address', youtube='$youtube' WHERE user_id='$user_id'";
                        $stmt = $con->prepare($sql);
                        if($stmt->execute())
                        {
                                $successMSG = "success";
                        }
                        else
                        {
                                $errMSG = "failed";
                        }

                } catch(PDOException $e) {
                        die("Database error: " . $e->getMessage());
                }
        }
        if (isset($errMSG)) echo $errMSG;
    if (isset($successMSG)) echo $successMSG;
?>


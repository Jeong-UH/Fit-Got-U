<?php

    error_reporting(E_ALL);
    //ini_set('display_errors',1);

    include('dbcon.php');

        $user_id=$_POST['user_id'];
        $username =$_POST['username'];
	$profile_image = $_POST['profile_image'];

        if(empty($user_id) || empty($username) || empty($profile_image)){
                $errMSG = "오류.";
        }

        if(!isset($errMSG)) {
                try{
                        $sql="UPDATE user SET username='$username', profile_image='$profile_image' WHERE user_id='$user_id'";
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


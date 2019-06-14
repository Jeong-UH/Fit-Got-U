
<?php

    error_reporting(E_ALL);
    //ini_set('display_errors',1);

    include('dbcon.php');

        $user_id=$_POST['user_id'];
        $username =$_POST['username'];
        $profile_image =$_POST['profile_image'];
        $weight =$_POST['weight'];
        $height =$_POST['height'];
        $is_user =$_POST['is_user'];
        $address =$_POST['home_address'];

        if(empty($user_id) || empty($username) || empty($profile_image) || empty($weight) || empty($height) || empty($is_user) || empty($address)){
                $errMSG = "오류.";
        }

        if(!isset($errMSG)) {
                try{
                        $sql="INSERT INTO user(user_id, username, profile_image, weight, height, is_user, home_address) VALUES ('$user_id', '$username', '$profile_image', '$weight', '$height', '$is_user', '$address')";
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


<?php

    error_reporting(E_ALL);
    //ini_set('display_errors',1);

    include('dbcon.php');

        $user_id=$_POST['user_id'];
        $trainer_id =$_POST['trainer_id'];

        if(empty($user_id) || empty($trainer_id)){
                $errMSG = "오류.";
        }

        if(!isset($errMSG)) {
                try{
                        $sql="INSERT INTO subscription(user_id, trainer_id) VALUES ('$user_id', '$trainer_id')";
                        $stmt = $con->prepare($sql);
                        if($stmt->execute())
                        {
                                $successMSG = $con->lastInsertId();
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


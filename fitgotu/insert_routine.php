<?php

    error_reporting(E_ALL);
    //ini_set('display_errors',1);

    include('dbcon.php');

        $user_id=$_POST['user_id'];
        $trainer_id =$_POST['trainer_id'];
        $date_message =$_POST['date_message'];
        $break_message =$_POST['break_message'];
        $lunch_message =$_POST['lunch_message'];
        $dinner_message =$_POST['dinner_message'];
        $set_message =$_POST['set_message'];
        $routine_message =$_POST['routine_message'];

        if(empty($user_id) || empty($trainer_id) || empty($date_message) || empty($break_message) || empty($lunch_message) || empty($dinner_message) || empty($set_message) || empty($routine_message)){
                $errMSG = "오류.";
        }

        if(!isset($errMSG)) {
                try{
                        $sql="INSERT INTO my_routine(user_id, trainer_id, date_message, break_message, lunch_message, dinner_message, set_message, routine_message) VALUES ('$user_id', '$trainer_id', '$date_message', '$break_message', '$lunch_message', '$dinner_message', '$set_message', '$routine_message')";
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

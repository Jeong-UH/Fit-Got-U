<?php

    error_reporting(E_ALL);
    //ini_set('display_errors',1);

    include('dbcon.php');

        $user_id=$_POST['user_id'];
        $j1 =$_POST['j1'];
        $j2 =$_POST['j2'];
        $j3 =$_POST['j3'];
        $j4 =$_POST['j4'];
        $j5 =$_POST['j5'];
        $j6 =$_POST['j6'];
        $j7 =$_POST['j7'];
        $j8 =$_POST['j8'];
        $j9 =$_POST['j9'];
        $j10 =$_POST['j10'];
        $j11 =$_POST['j11'];
        $j12 =$_POST['j12'];

        if(!isset($errMSG)) {
                try{
                        $sql="INSERT INTO exercise_joint(user_id, j1, j2, j3, j4, j5, j6, j7, j8, j9, j10, j11, j12) VALUES ('$user_id', '$j1', '$j2', '$j3', '$j4', '$j5', '$j6', '$j7', '$j8', '$j9', '$j10', '$j11', '$j12')";
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


<?php

    error_reporting(E_ALL);
    //ini_set('display_errors',1);

    include('dbcon.php');

        $id=$_POST['id'];
        $status =$_POST['status'];

        if(empty($id) || empty($status)){
                $errMSG = "오류.";
        }

        if(!isset($errMSG)) {
                try{
                        $sql="UPDATE subscription SET status='$status' WHERE id='$id'";
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


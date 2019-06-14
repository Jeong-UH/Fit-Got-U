
<?php

    error_reporting(E_ALL);
    //ini_set('display_errors',1);

    include('dbcon.php');

        $id=$_POST['id'];
        $token =$_POST['token'];

        if(empty($id) || empty($token)){
                $errMSG = "오류.";
        }

        if(!isset($errMSG)) {
                try{
                        $sql="INSERT INTO fcmtoken(id, token) VALUES ('$id', '$token')";
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


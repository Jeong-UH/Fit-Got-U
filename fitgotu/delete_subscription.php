
<?php

    error_reporting(E_ALL);
    //ini_set('display_errors',1);

    include('dbcon.php');

        $id=$_POST['id'];

        if(empty($id)){
                $errMSG = "111";
        }

        if(!isset($errMSG)) {
                try{
                        $sql="DELETE FROM subscription where id='$id'";
                        $stmt = $con->prepare($sql);
                        if($stmt->execute())
                        {
                                $successMSG = "222";
                        }
                        else
                        {
                                $errMSG = "333";
                        }

                } catch(PDOException $e) {
                        die("Database error: " . $e->getMessage());
                }
        }
        if (isset($errMSG)) echo $errMSG;
    if (isset($successMSG)) echo $successMSG;
?>


<?php 
session_start();
    require('../../function/connection.php');
    if(isset($_POST['updatePosition'])){
        $email123 = $_POST['email'];
        $cId=$_POST['id123'];
        $name =$_POST['clientName'];
        $locate=$_POST['locate'];
        $type=$_POST['business'];
        $tem = $_POST['pattern'];
        $sql1 = "UPDATE client SET clientName = '$name', location='$locate',businessType = '$type',template = '$tem'
        where clientId=$cId";
        $res1 = mysqli_query($con, $sql1);
        if($res1){
            $ww = "select name from usertable where email = '$email123'";
            $ww1 = mysqli_query($con, $ww);
            $ww2 = mysqli_fetch_assoc($ww1);
            date_default_timezone_set("Asia/Bangkok");
            $time = date("Y-m-d H:i:s");
            $message = "edit $name from client";
            $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
            $op = mysqli_query($con, $oi);
            $_SESSION['status'] = "Successfully changed detail of client";
            $_SESSION['status_code'] = "1";
            header("Location: ../../client.php");
            
        }
        else{
            $_SESSION['status'] = "Failed to change detail of client";
            $_SESSION['status_code'] = "0";
            header("Location: ../../client.php");
        }
    }
?>
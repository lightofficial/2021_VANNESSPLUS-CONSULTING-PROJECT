<?php
    session_start();
    require('../../function/connection.php');
    if(isset($_POST['addClient'])){
        $email123 = $_POST['email'];
        $clientName = $_POST['cname'];
        $location = $_POST['locate'];
        $businessType = $_POST['bu'];
        $tem = $_POST['pattern'];
        $id = $_POST['id'];
        $date = date("Y-m-d");
        $q = "INSERT INTO client(clientName,location,businessType,id,clientCreateDate,template) VALUES ('$clientName','$location','$businessType','$id','$date','$tem') ";
        $c = mysqli_query($con, $q);
        if($c){
            $ww = "select name from usertable where email = '$email123'";
            $ww1 = mysqli_query($con, $ww);
            $ww2 = mysqli_fetch_assoc($ww1);
            date_default_timezone_set("Asia/Bangkok");
            $time = date("Y-m-d H:i:s");
            $message = "add $clientName to client";
            $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
            $op = mysqli_query($con, $oi);
            $_SESSION['status'] = "Successfully added Client";
            $_SESSION['status_code'] = "1";
            header("Location: ../../client.php");
        }else{
            $_SESSION['status'] = "Failed to add client";
            $_SESSION['status_code'] = "0";
            header("Location: ../../client.php");
        }
    }
    
?>
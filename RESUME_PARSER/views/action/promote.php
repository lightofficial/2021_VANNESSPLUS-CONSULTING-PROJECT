<?php
session_start();
require('../../function/connection.php');
if (isset($_POST['promote'])) {

    $id = $_POST['id'];
    $email123 = $_POST['email'];
    $email1 = "SELECT email,name FROM usertable where id = $id ";
    $qq = mysqli_query($con, $email1);
    $email = mysqli_fetch_assoc($qq);
    if ($qq) {
        $ww = "select name from usertable where email = '$email123'";
        $ww1 = mysqli_query($con, $ww);
        $ww2 = mysqli_fetch_assoc($ww1);
        date_default_timezone_set("Asia/Bangkok");
        $time = date("Y-m-d H:i:s");
        $message = "promote <b> $email[name] </b>to super admin";
        $oi = "INSERT INTO message(title,mess,time) 
                    VALUES( ' $ww2[name]','$message','$time')";
        $op = mysqli_query($con, $oi);
        $q = "UPDATE usertable SET userstatus=2 where id=$id";
        $c = mysqli_query($con, $q);
        $subject = "You become Super admin";
        $message = "Hi!

You become super admin now. 
Please logout and login again
                        
Thank you
Super Recruit";
        $sender = "From: superrecruit123@gmail.com";
        if (mail($email['email'], $subject, $message, $sender)) {
            $_SESSION['status'] = "Successfully promoted admin  ";
            $_SESSION['status_code'] = "1";

            header("Location: ../../authorization.php");
            exit();
        } else {
            $_SESSION['status'] = "Failed to promote admin";
            $_SESSION['status_code'] = "0";
            header("Location: ../../authorization.php");
        }
    } else {

        echo "something went wrong please try agian";
    }
}

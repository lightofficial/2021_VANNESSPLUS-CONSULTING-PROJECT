<?php
session_start();
require('../../function/connection.php');
if(isset($_POST['success'])){
    $email23 =$_POST['admin123'];
    $canId = $_POST['canId123'];
    $ww = "select name from usertable where email = '$email23'";
    $ww1 = mysqli_query($con, $ww);
    $ww2 = mysqli_fetch_assoc($ww1);
    $yy = "select candidateName from candidate where candidateId  = '$canId'";
    $yy1 = mysqli_query($con, $yy);
    $yy2 = mysqli_fetch_assoc($yy1);
    date_default_timezone_set("Asia/Bangkok");
    $time = date("Y-m-d H:i:s");
    $message = "added resume of $yy2[candidateName]";
    $oi = "INSERT INTO message(title,mess,time) 
                    VALUES( ' $ww2[name]','$message','$time')";
    $op = mysqli_query($con, $oi);
    $_SESSION['status'] = "Successfully added resume of $yy2[candidateName]";
    $_SESSION['status_code'] = "1";
    header("Location: ../../candidate.php");
}
if(isset($_POST['successAdmin'])){
    $email23 =$_POST['admin123'];
    $canId = $_POST['canId123'];
    $ww = "select name from usertable where email = '$email23'";
    $ww1 = mysqli_query($con, $ww);
    $ww2 = mysqli_fetch_assoc($ww1);
    $yy = "select candidateName from candidate where candidateId  = '$canId'";
    $yy1 = mysqli_query($con, $yy);
    $yy2 = mysqli_fetch_assoc($yy1);
    date_default_timezone_set("Asia/Bangkok");
    $time = date("Y-m-d H:i:s");
    $message = "added resume of $yy2[candidateName]";
    $oi = "INSERT INTO message(title,mess,time) 
                    VALUES( ' $ww2[name]','$message','$time')";
    $op = mysqli_query($con, $oi);
    $_SESSION['status'] = "Successfully added resume of $yy2[candidateName]";
    $_SESSION['status_code'] = "1";
    header("Location: ../../candidateAdmin.php");
}

?>
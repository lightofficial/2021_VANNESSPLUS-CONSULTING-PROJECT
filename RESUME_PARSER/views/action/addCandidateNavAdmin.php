<?php
session_start();
require('../../function/connection.php');
if (isset($_POST['addC'])) {
    date_default_timezone_set("Asia/Bangkok");
    $candidateId = $_POST['addC'];
    $email123 = $_POST['email'];
    $id = $_POST['id123'];
    $pig = "select position from job where jobId = $id";
    $chic = mysqli_query($con,$pig);
    $joo = mysqli_fetch_assoc($chic);
    $date = date("Y-m-d H:i:s");
    $q = "INSERT INTO applyjob(candidateId ,jobId ,candidateStatus ,candidateDrop,candidateAddTime) 
        VALUES (' $candidateId','$id','1','0','$date') ";
    $c = mysqli_query($con, $q);
    if ($c) {
        $ww = "select name from usertable where email = '$email123'";
        $ww1 = mysqli_query($con, $ww);
        $ww2 = mysqli_fetch_assoc($ww1);
       
        $time = date("Y-m-d H:i:s");
        $message = "added candidate to ";
        $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
        $op = mysqli_query($con, $oi);
        $_SESSION['status'] = "Successfully added candidate to $joo[position]";
        $_SESSION['status_code'] = "1";
        $_SESSION['modal'] = "1";
        $_SESSION['jobId'] = $id;
        $_SESSION['email'] = $email123;
        header("location: ../../navAdmin.php?var=$id ");
    } else {
        $_SESSION['status'] = "Failed to change detail of job";
        $_SESSION['status_code'] = "0";
        $_SESSION['modal'] = "1";
        header("location: ../../navAdmin.php?var=$id");
    }
}
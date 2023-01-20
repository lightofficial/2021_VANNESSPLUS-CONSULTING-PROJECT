<?php
session_start();
require('../../function/connection.php');
if (isset($_POST['deletePosition'])) {
    $email123 = $_POST['email'];
    $jobId = $_POST['id123'];
    $o1 = "SELECT position as pos from job where jobId = '$jobId'";
    $p1 = mysqli_query($con, $o1);
    $l1 = mysqli_fetch_assoc($p1);
    $sql2 = "DELETE FROM applyjob WHERE jobId=$jobId";
    $res2 = mysqli_query($con, $sql2);
    $sql1 = "DELETE FROM job where jobId=$jobId";
    $res1 = mysqli_query($con, $sql1);

    if ($res1) {
        $ww = "select name from usertable where email = '$email123'";
        $ww1 = mysqli_query($con, $ww);
        $ww2 = mysqli_fetch_assoc($ww1);
        date_default_timezone_set("Asia/Bangkok");
        $time = date("Y-m-d H:i:s");
        $message = "delete $l1[pos] from job";
        $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
        $op = mysqli_query($con, $oi);
        $_SESSION['status'] = "Successfully deleted job";
        $_SESSION['status_code'] = "1";
        header("Location: ../../job.php");

    } else {
        $_SESSION['status'] = "Failed to delete job";
        $_SESSION['status_code'] = "0";
        header("location: ../../job.php");
    }
}

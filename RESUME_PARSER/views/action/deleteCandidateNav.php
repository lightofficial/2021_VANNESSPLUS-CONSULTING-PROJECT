<?php
session_start();
require('../../function/connection.php');
if (isset($_POST['deleteCandidateNav'])) {
    $email123 = $_POST['email'];
    $candidateId = $_POST['id123'];
    $jobId = $_POST['jobId'];
    $o1 = "SELECT candidateName from candidate where candidateId = '$candidateId'";
    $p1 = mysqli_query($con, $o1);
    $l1 = mysqli_fetch_assoc($p1);
    $sql1 = "DELETE FROM applyjob where candidateId=$candidateId";
    $res1 = mysqli_query($con, $sql1);

    if ($res1) {
        $ww = "select name from usertable where email = '$email123'";
        $ww1 = mysqli_query($con, $ww);
        $ww2 = mysqli_fetch_assoc($ww1);
        date_default_timezone_set("Asia/Bangkok");
        $time = date("Y-m-d H:i:s");
        $message = "delete $l1[candidateName] from candidate";
        $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
        $op = mysqli_query($con, $oi);
        $_SESSION['status'] = "Successfully remove candidate";
        $_SESSION['status_code'] = "1";
        header("Location: ../../nav.php?var=$jobId");

    } else {
        $_SESSION['status'] = "Failed to remove candidate";
        $_SESSION['status_code'] = "0";
        header("location: ../../nav.php?var=$jobId");
    }
}

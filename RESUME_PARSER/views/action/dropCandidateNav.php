<?php
session_start();
require('../../function/connection.php');
if (isset($_POST['dropCandidateNav'])) {
    $email123 = $_POST['email'];
    $applyId = $_POST['id123'];
    $jobId = $_POST['jobId'];
    $did = $_POST['dropId'];
    $string = "";
    foreach ($did as $did) {
        $string .= $did . ", ";
    }
    $laststring = rtrim($string, " ,");
    $o1 = "SELECT candidateName from applyjob NATURAL JOIN candidate where applyId = '$applyId'";
    $p1 = mysqli_query($con, $o1);
    $l1 = mysqli_fetch_assoc($p1);
    date_default_timezone_set("Asia/Bangkok");
    $time = date("Y-m-d H:i:s");
    $sql1 = "UPDATE `applyjob` SET candidateDrop='1',dropReason='$laststring',dropDate='$time' where applyId=$applyId";
    $res1 = mysqli_query($con, $sql1);

    if ($res1) {
        $ww = "select name from usertable where email = '$email123'";
        $ww1 = mysqli_query($con, $ww);
        $ww2 = mysqli_fetch_assoc($ww1);
        $message = "drop $l1[candidateName] candidate";
        $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
        $op = mysqli_query($con, $oi);
        $_SESSION['status'] = "Successfully drop candidate";
        $_SESSION['status_code'] = "1";
        header("Location: ../../nav.php?var=$jobId");
    } else {
        $_SESSION['status'] = "Failed to drop candidate";
        $_SESSION['status_code'] = "0";
        header("location: ../../nav.php?var=$jobId");
    }
}
if (isset($_POST['dropCandidateNav2'])) {
    $email123 = $_POST['email'];
    $applyId = $_POST['id123'];
    $jobId = $_POST['jobId'];
    $did = $_POST['dropId'];
    $string = "";
    foreach ($did as $did) {
        $string .= $did . ", ";
    }
    $laststring = rtrim($string, " ,");
    $o1 = "SELECT candidateName from applyjob NATURAL JOIN candidate where applyId = '$applyId'";
    $p1 = mysqli_query($con, $o1);
    $l1 = mysqli_fetch_assoc($p1);
    date_default_timezone_set("Asia/Bangkok");
    $time = date("Y-m-d H:i:s");
    $sql1 = "UPDATE `applyjob` SET candidateDrop='1',dropReason='$laststring',dropDate='$time' where applyId=$applyId";
    $res1 = mysqli_query($con, $sql1);

    if ($res1) {
        $ww = "select name from usertable where email = '$email123'";
        $ww1 = mysqli_query($con, $ww);
        $ww2 = mysqli_fetch_assoc($ww1);
        $message = "drop $l1[candidateName] candidate";
        $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
        $op = mysqli_query($con, $oi);
        $_SESSION['status'] = "Successfully drop candidate";
        $_SESSION['status_code'] = "1";
        header("Location: ../../navAdmin.php?var=$jobId");
    } else {
        $_SESSION['status'] = "Failed to drop candidate";
        $_SESSION['status_code'] = "0";
        header("location: ../../navAdmin.php?var=$jobId");
    }
}
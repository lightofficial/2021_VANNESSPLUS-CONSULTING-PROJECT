<?php
session_start();
require('../../function/connection.php');
if (isset($_POST['deletePosition'])) {
    $email123 = $_POST['email'];
    $id = $_POST['id123'];
    $o1 = "SELECT data_name_first from parser_resume_data where id = '$id'";
    $p1 = mysqli_query($con, $o1);
    $l1 = mysqli_fetch_assoc($p1);
    $sql2 = "DELETE FROM applyjob where candidateId=$candidateId";
    $res2 = mysqli_query($con, $sql2);
    $sql1 = "DELETE FROM parser_resume_data where id=$id";
    $res1 = mysqli_query($con, $sql1);

    if ($res1) {
        $ww = "select name from usertable where email = '$email123'";
        $ww1 = mysqli_query($con, $ww);
        $ww2 = mysqli_fetch_assoc($ww1);
        date_default_timezone_set("Asia/Bangkok");
        $time = date("Y-m-d H:i:s");
        $message = "remove $l1[data_name_first] from candidate";
        $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
        $op = mysqli_query($con, $oi);
        $_SESSION['status'] = "Successfully deleted candidate";
        $_SESSION['status_code'] = "1";
        header("Location: ../../candidate.php");

    } else {
        $_SESSION['status'] = "Failed to delete candidate";
        $_SESSION['status_code'] = "0";
        header("location: ../../candidate.php");
    }
}
if (isset($_POST['deletePosition2'])) {
    $email123 = $_POST['email'];
    $id = $_POST['id123'];
    $o1 = "SELECT data_name_first from parser_resume_data where id = '$id'";
    $p1 = mysqli_query($con, $o1);
    $l1 = mysqli_fetch_assoc($p1);
    $sql2 = "DELETE FROM applyjob where candidateId=$candidateId";
    $res2 = mysqli_query($con, $sql2);
    $sql1 = "DELETE FROM parser_resume_data where id=$id";
    $res1 = mysqli_query($con, $sql1);

    if ($res1) {
        $ww = "select name from usertable where email = '$email123'";
        $ww1 = mysqli_query($con, $ww);
        $ww2 = mysqli_fetch_assoc($ww1);
        date_default_timezone_set("Asia/Bangkok");
        $time = date("Y-m-d H:i:s");
        $message = "remove $l1[data_name_first] from parser_resume_data";
        $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
        $op = mysqli_query($con, $oi);
        $_SESSION['status'] = "Successfully deleted candidate";
        $_SESSION['status_code'] = "1";
        header("Location: ../../candidateAdmin.php");

    } else {
        $_SESSION['status'] = "Failed to delete candidate";
        $_SESSION['status_code'] = "0";
        header("location: ../../candidateAdmin.php");
    }
}

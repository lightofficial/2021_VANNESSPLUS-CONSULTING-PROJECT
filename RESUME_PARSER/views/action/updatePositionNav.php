<?php
session_start();
require('../../function/connection.php');
if (isset($_POST['updatePosition'])) {
    $email123 = $_POST['email'];
    $jobId = $_POST['id123'];
    $pos = $_POST['pos'];
    $keySkill = $_POST['key'];
    $quantity = $_POST['quan'];
    $maximun = $_POST['maximum'];
    $jobLocation = $_POST['joblocat'];
    $level = $_POST['level'];
    $contract = $_POST['contract'];
    $jemail = $_POST['Jemail'];
    $qualifications = $_POST['quali'];
    if ($_POST['dura'] == '') {
        $contractDetailId = "NULL";
    } else {
        $contractDetailId = $_POST['dura'];
    }

    if ($_POST['indus'] == '') {
        $industryId = "NULL";
    } else {
        $industryId = $_POST['indus'];
    }

    if ($_POST['admin13'] == '') {
        $admin = "NULL";
    } else {
        $admin = $_POST['admin13'];
    }

    if ($_POST['client'] == '') {
        $client = "NULL";
    } else {
        $client = $_POST['client'];
    }
    $่jobStatusId = $_POST['status1'];
    echo "jobId=" . $jobId . "<br>" . "position=" . $pos . "<br>" . "contractDetailId=" . $contractDetailId
        . "<br>" . "industryId=" . $industryId . "<br>" . "admin=" . $admin . "<br>" . "client=" . $client . "<br>" . "status=" . $่jobStatusId . "<br>";

    $sql1 = "UPDATE job SET position ='$pos',keySkill='$keySkill',quantity='$quantity',maximumBudget='$maximun'
        ,contractDetailId=$contractDetailId,jobLocation='$jobLocation',level='$level',industryId=$industryId,contract='$contract',emailOfContact='$jemail'
        ,clientId=$client,id=$admin,qualifications='$qualifications',jobStatusId='$่jobStatusId' where jobId=$jobId";
    $res1 = mysqli_query($con, $sql1);
    if ($res1) {
        $ww = "select name from usertable where email = '$email123'";
        $ww1 = mysqli_query($con, $ww);
        $ww2 = mysqli_fetch_assoc($ww1);
        date_default_timezone_set("Asia/Bangkok");
        $time = date("Y-m-d H:i:s");
        $message = "edit $pos from job";
        $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
        $op = mysqli_query($con, $oi); 
        $_SESSION['status'] = "Successfully changed detail of job";
        $_SESSION['status_code'] = '1';
        header("location: ../../nav.php?var=$jobId");


    } else {
        $_SESSION['status'] = "Failed to change detail of job";
        $_SESSION['status_code'] = '0';
        header("location: ../../nav.php?var=$jobId");

    }
}

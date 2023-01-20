<?php
    session_start();
    require('../../function/connection.php');
    if(isset($_POST['changeJob'])){
        $email123 = $_POST['email'];
        $id = $_POST['wut'];
        $jobStatusId = $_POST['birth'];
        $o = "select position from job where `jobId` = '$id'";
        $p = mysqli_query($con,$o);
        $l = mysqli_fetch_assoc($p);
       
        $o1 = "select jobStatus from jobstatus where `jobStatusId` = '$jobStatusId'";
        $p1 = mysqli_query($con,$o1);
        $l1 = mysqli_fetch_assoc($p1);
        $q = "UPDATE `job` SET `jobStatusId` = '$jobStatusId' WHERE `jobId` = '$id' ";
        $c = mysqli_query($con, $q);
        if($c){
            $ww = "select name from usertable where email = '$email123'";
            $ww1 = mysqli_query($con, $ww);
            $ww2 = mysqli_fetch_assoc($ww1);
            date_default_timezone_set("Asia/Bangkok");
            $time = date("Y-m-d H:i:s");
            $message = "update status $l[position] to $l1[jobStatus] ";
            $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
            $op = mysqli_query($con, $oi);
            $_SESSION['status'] = "Successfully changed status of job";
            $_SESSION['status_code'] = "1";
            header("Location: ../../job.php");
        }else{
            $_SESSION['status'] = "Failed to change status of job";
        $_SESSION['status_code'] = "0";
        header("location: ../../job.php");
        }
    }
    if(isset($_POST['changeJob2'])){
        $email123 = $_POST['email'];
        $id = $_POST['wut'];
        $jobStatusId = $_POST['birth'];
        $o = "select position from job where `jobId` = '$id'";
        $p = mysqli_query($con,$o);
        $l = mysqli_fetch_assoc($p);
       
        $o1 = "select jobStatus from jobstatus where `jobStatusId` = '$jobStatusId'";
        $p1 = mysqli_query($con,$o1);
        $l1 = mysqli_fetch_assoc($p1);
        $q = "UPDATE `job` SET `jobStatusId` = '$jobStatusId' WHERE `jobId` = '$id' ";
        $c = mysqli_query($con, $q);
        if($c){
            $ww = "select name from usertable where email = '$email123'";
            $ww1 = mysqli_query($con, $ww);
            $ww2 = mysqli_fetch_assoc($ww1);
            date_default_timezone_set("Asia/Bangkok");
            $time = date("Y-m-d H:i:s");
            $message = "update status $l[position] to $l1[jobStatus] ";
            $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
            $op = mysqli_query($con, $oi);
            $_SESSION['status'] = "Successfully changed status of job";
            $_SESSION['status_code'] = "1";
            header("Location: ../../jobAdmin.php");
        }else{
            $_SESSION['status'] = "Failed to change status of job";
        $_SESSION['status_code'] = "0";
        header("location: ../../jobAdmin.php");
        }
    }

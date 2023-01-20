<?php
session_start();
require('../../function/connection.php');
if (isset($_POST['addJob'])) {
    $email123 = $_POST['email'];
    $keySkill = $_POST['kskill'];
    $pos = $_POST['pos'];
    $quantity = $_POST['quantity'];
    $maximumBudget = $_POST['maxi'];
    $contractDetailId = $_POST['contractdetail'];
    $jobLocation = $_POST['locate'];
    $admin = $_POST['admin'];
    $industryId = $_POST['industry'];
    $jobStatusId = $_POST['jobStatusId'];
    $contract = $_POST['cont'];
    $Jemail = $_POST['Jemail'];
    $client = $_POST['client'];
    $level = $_POST['level'];
    $date = date("Y-m-d");
    $q = "INSERT INTO job(position,keySkill,quantity,maximumBudget,contractDetailId,jobLocation,level,industryId,jobStatusId,contract,emailOfContact,clientId,id,jobCreateDate) 
        VALUES('$pos','$keySkill','$quantity','$maximumBudget',$contractDetailId,'$jobLocation','$level',$industryId,'$jobStatusId','$contract','$Jemail',$client,$admin,'$date')";
    $c = mysqli_query($con, $q);
    if ($c) {
        $ww = "select * from usertable where email = '$email123'";
        $ww1 = mysqli_query($con, $ww);
        $ww2 = mysqli_fetch_assoc($ww1);
        date_default_timezone_set("Asia/Bangkok");
        $time = date("Y-m-d H:i:s");
        $message = "add $pos to job";
        $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
        $op = mysqli_query($con, $oi);
        $_SESSION['status'] = "Successfully created job";
        $_SESSION['status_code'] = "1";
        if ($ww2['userStatus'] == 2) {
            header("Location: ../../job.php");
        }
        else{
            header("Location: ../../jobAdmin.php");
        }
    } else {
        $_SESSION['status'] = "Failed to create job";
        $_SESSION['status_code'] = "0";
        header("location: ../../job.php");
    }
}

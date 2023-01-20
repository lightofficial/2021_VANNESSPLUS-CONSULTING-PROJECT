<?php
session_start();
require('../../function/connection.php');
if (isset($_POST['uploadcan'])) {
    $targetPath = '../../upload/';
    $tempFile = $_FILES['uploadfile']['tmp_name'];
    $targetFile = $targetPath . $_FILES['uploadfile']['name'];
    if (!file_exists($targetFile)) {
        move_uploaded_file($tempFile, $targetFile);
        $name = $_FILES['uploadfile']['name'];
        $type = $_FILES['uploadfile']['type'];
        $sql = "INSERT INTO candidateresume(tName,mime) VALUES('$name','$type')";
        $res = mysqli_query($con, $sql);
        if ($res) {
            $ww = "select name from usertable where email = '$email123'";
            $ww1 = mysqli_query($con, $ww);
            $ww2 = mysqli_fetch_assoc($ww1);
            date_default_timezone_set("Asia/Bangkok");
            $time = date("Y-m-d H:i:s");
            $message = "successfully uploaded candidate";
            $oi = "INSERT INTO message(title,mess,time) 
            VALUES( ' $ww2[name]','$message','$time')";
            $op = mysqli_query($con, $oi);
            $_SESSION['status'] = "Successfully uploaded candidate";
            $_SESSION['status_code'] = "1";
            header("Location: ../../candidate.php");
        } else {
            $_SESSION['status'] = "Failed to upload candidate";
            $_SESSION['status_code'] = "0";
            header("location: ../../candidate.php");
        }
    } else {
        $_SESSION['status'] = "A file with the same name is exists.";
        $_SESSION['status_code'] = "0";
        header("location: ../../candidate.php");
    }
}

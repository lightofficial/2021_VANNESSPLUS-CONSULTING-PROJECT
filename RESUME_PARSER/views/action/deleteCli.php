<?php
session_start();
require('../../function/connection.php');
if (isset($_POST['deleteClient'])) {
    $email123 = $_POST['email'];
    $cliId = $_POST['id123'];
    $o1 = "SELECT clientName as cli from client where clientId = '$cliId'";
    $p1 = mysqli_query($con, $o1);
    $l1 = mysqli_fetch_assoc($p1);
    $didi = "select jobId FROM job where clientId = '$cliId'";
    $dada = mysqli_query($con, $didi);
    while($kiki = mysqli_fetch_assoc($dada)){
        $koko = "DELETE FROM applyjob where jobId = $kiki[jobId]";
        $bobo = mysqli_query($con, $koko);
    }
    $baba = "DELETE FROM job where clientId = '$cliId'";
    $mama = mysqli_query($con, $baba);
    $sql1 = "DELETE FROM client where clientId=$cliId";
    $res1 = mysqli_query($con, $sql1);

    if ($res1) {
        $ww = "select name from usertable where email = '$email123'";
        $ww1 = mysqli_query($con, $ww);
        $ww2 = mysqli_fetch_assoc($ww1);
        date_default_timezone_set("Asia/Bangkok");
        $time = date("Y-m-d H:i:s");
        $message = "delete $l1[cli] from client";
        $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
        $op = mysqli_query($con, $oi);
        $_SESSION['status'] = "Successfully deleted client";
        $_SESSION['status_code'] = "1";
        header("Location: ../../client.php");
    } else {
        $_SESSION['status'] = "Failed to delete client";
        $_SESSION['status_code'] = "0";
        header("Location: ../../client.php");
    }
}

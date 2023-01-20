<?php 
session_start();
    require('../../function/connection.php');
    if(isset($_POST['updateCandidate'])){
        $email123 = $_POST['email'];
        $jobId = $_POST['jobId'];
        $cId=$_POST['id123'];
        $name =$_POST['canName'];
        $email = $_POST['email765'];
        $phone = $_POST['num'];
        $nation = $_POST['nation'];
        $salary = $_POST['salary'];
        $expect = $_POST['expect'];
        $eng = $_POST['eng'];
        $des = $_POST['dess'];
        $start = $_POST['date'];
        $sql1 = "UPDATE candidate SET candidateName='$name',phoneNumber='$phone',candidateEmail='$email',nationnality='$nation',EnglishProficiency='$eng',
        currentSalary='$salary',expectSalary='$expect',startDate='$start',description='$des' where candidateId=$cId";
        $res1 = mysqli_query($con, $sql1);
        if($res1){
            $ww = "select name from usertable where email = '$email123'";
            $ww1 = mysqli_query($con, $ww);
            $ww2 = mysqli_fetch_assoc($ww1);
            date_default_timezone_set("Asia/Bangkok");
            $time = date("Y-m-d H:i:s");
            $message = "edit $name from candidate";
            $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
            $op = mysqli_query($con, $oi);
            $_SESSION['status'] = "Successfully changed detail of candidate";
            $_SESSION['status_code'] = "1";
            header("Location: ../../nav.php?var=$jobId");
        }
        else{
            $_SESSION['status'] = "Failed to change detail of candidate";
            $_SESSION['status_code'] = "0";
            header("Location: ../../nav.php?var=$jobId");
        }
    }
    if(isset($_POST['updateCandidate2'])){
        $email123 = $_POST['email'];
        $jobId = $_POST['jobId'];
        $cId=$_POST['id123'];
        $name =$_POST['canName'];
        $email = $_POST['email765'];
        $phone = $_POST['num'];
        $nation = $_POST['nation'];
        $salary = $_POST['salary'];
        $expect = $_POST['expect'];
        $eng = $_POST['eng'];
        $des = $_POST['dess'];
        $start = $_POST['date'];
        $sql1 = "UPDATE candidate SET candidateName='$name',phoneNumber='$phone',candidateEmail='$email',nationnality='$nation',EnglishProficiency='$eng',
        currentSalary='$salary',expectSalary='$expect',startDate='$start',description='$des' where candidateId=$cId";
        $res1 = mysqli_query($con, $sql1);
        if($res1){
            $ww = "select name from usertable where email = '$email123'";
            $ww1 = mysqli_query($con, $ww);
            $ww2 = mysqli_fetch_assoc($ww1);
            date_default_timezone_set("Asia/Bangkok");
            $time = date("Y-m-d H:i:s");
            $message = "edit $name from candidate";
            $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
            $op = mysqli_query($con, $oi);
            $_SESSION['status'] = "Successfully changed detail of candidate";
            $_SESSION['status_code'] = "1";
            header("Location: ../../navAdmin.php?var=$jobId");
        }
        else{
            $_SESSION['status'] = "Failed to change detail of candidate";
            $_SESSION['status_code'] = "0";
            header("Location: ../../navAdmin.php?var=$jobId");
        }
    }
?>
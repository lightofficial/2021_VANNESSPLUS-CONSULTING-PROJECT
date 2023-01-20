<?php
session_start();
    require('../../function/connection.php');
   
        $candidateName = $_POST['cname'];
        $phoneNumber = $_POST['num'];
        $email = $_POST['email765'];
        $email123 = $_POST['email'];
        $nation = $_POST['nation'];
        $eng = $_POST['eng'];
        $id = $_POST['id']; 
        $date = date("Y-m-d");
        $salary = $_POST['salary'];
        $expect = $_POST['expect'];
        $totalExp = $_POST['total'];
        $notice = $_POST['notice'];
        $major = $_POST['major'];
        $second = $_POST['second'];
        $startDate = $_POST['date'];
        $description = $_POST['desc'];
        $q = "INSERT INTO candidate(candidateName,phoneNumber,candidateEmail,nationnality,candidateCreateDate,EnglishProficiency,currentSalary,expectSalary,TotalExperience,NoticePeriod,MajorSkill,SecondarySkill,startDate,description) 
        VALUES ('$candidateName','$phoneNumber','$email','$nation','$date','$eng',' $salary','$expect','$totalExp','$notice','$major','$second',' $startDate','  $description') ";
        $c = mysqli_query($con, $q);
        if($c){
            $ww = "select name from usertable where email = '$email123'";
            $ww1 = mysqli_query($con, $ww);
            $ww2 = mysqli_fetch_assoc($ww1);
            date_default_timezone_set("Asia/Bangkok");
            $time = date("Y-m-d H:i:s");
            $message = "add $candidateName to candidate";
            $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
            $op = mysqli_query($con, $oi);
            $_SESSION['status'] = "Successfully created Candidate";
            $_SESSION['status_code'] = "1";
            header("Location: ../../candidateAdmin.php");
        }else{
            $_SESSION['status'] = "Failed to add Candidate";
            $_SESSION['status_code'] = "0";
            header("Location: ../../candidateAdmin.php");
        }

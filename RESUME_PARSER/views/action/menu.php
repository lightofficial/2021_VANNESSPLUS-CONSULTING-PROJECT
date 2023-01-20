<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 5px;
        text-align: left;
    }
</style>
<?php

session_start();
require('../../function/connection.php');
if (isset($_POST['cDelete'])) {
    if (!empty($_POST["applyId"])) {
        $aid = $_POST['applyId'];
        $email123 = $_POST['email'];
        $jobId = $_POST['jobId'];
        $count = $_POST['count'];
        $i = 0;
        foreach ($aid as $id) {
            $q = "DELETE FROM applyjob WHERE applyId=$id";
            $c = mysqli_query($con, $q);
            if ($c) {
                ++$i;
                $ww = "select name from usertable where email = '$email123'";
                $ww1 = mysqli_query($con, $ww);
                $ww2 = mysqli_fetch_assoc($ww1);
                date_default_timezone_set("Asia/Bangkok");
                $time = date("Y-m-d H:i:s");
                $message = "remove $count candidates";
                $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
                if ($i == $count) {
                    mysqli_query($con, $oi);
                }
                $_SESSION['status'] = "Successfully remove $count candidates";
                $_SESSION['status_code'] = "1";
                header("Location: ../../nav.php?var=$jobId");
            } else {
                $_SESSION['status'] = "Failed to remove $count candidates";
                $_SESSION['status_code'] = "0";
                header("Location: ../../nav.php?var=$jobId");
            }
        }
    }
}
if (isset($_POST['moveC'])) {
    if (!empty($_POST["applyId"])) {
        $aid =    $_POST['applyId'];
        $email123 = $_POST['email'];
        $jobId = $_POST['jobId'];
        $count = $_POST['count'];
        $statusId = $_POST['moveC'];
        $kk = "SELECT * FROM `candidatestatus` WHERE candidateStatusId  =  $statusId ";
        $ii = mysqli_query($con, $kk);
        $jj = mysqli_fetch_assoc($ii);
        $i = 0;
        foreach ($aid as $id) {
            $q = "UPDATE `applyjob` SET `candidateStatus` = '$statusId'  where applyId=$id";
            $c = mysqli_query($con, $q);
            if ($c) {
                ++$i;
                $ww = "select name from usertable where email = '$email123'";
                $ww1 = mysqli_query($con, $ww);
                $ww2 = mysqli_fetch_assoc($ww1);
                date_default_timezone_set("Asia/Bangkok");
                $time = date("Y-m-d H:i:s");
                $message = "move $count candidates to $jj[candidateStatusName]";
                $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
                if ($i == $count) {
                    mysqli_query($con, $oi);
                }
                $_SESSION['status'] = "Successfully move $count candidates";
                $_SESSION['status_code'] = "1";
                header("Location: ../../nav.php?var=$jobId");
            } else {
                $_SESSION['status'] = "Failed to move $count candidates";
                $_SESSION['status_code'] = "0";
                header("Location: ../../nav.php?var=$jobId");
            }
        }
    }
}

if (isset($_POST['dropnaja'])) {
    if (!empty($_POST["applyId"])) {
        $cid =    $_POST['applyId'];
        $email123 = $_POST['email'];
        $jobId = $_POST['jobId'];
        $count = $_POST['count'];
        $i = 0;
        $did = $_POST['dropId'];
        $string = "";
        foreach ($did as $did) {
            $string .= $did . ", ";
        }
        $laststring = rtrim($string, " ,");
        foreach ($cid as $id) {
            date_default_timezone_set("Asia/Bangkok");
            $time = date("Y-m-d H:i:s");
            $q = "UPDATE `applyjob` SET candidateDrop='1',dropReason='$laststring',dropDate='$time' where applyId='$id'";
            $c = mysqli_query($con, $q);
            if ($c) {
                ++$i;
                $ww = "select name from usertable where email = '$email123'";
                $ww1 = mysqli_query($con, $ww);
                $ww2 = mysqli_fetch_assoc($ww1);
                $message = "drop $count candidates";
                $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
                if ($i == $count) {
                    mysqli_query($con, $oi);
                }
                $_SESSION['status'] = "Successfully drop $count candidates";
                $_SESSION['status_code'] = "1";
                header("Location: ../../nav.php?var=$jobId");
            } else {
                $_SESSION['status'] = "Failed to drop $count candidates";
                $_SESSION['status_code'] = "0";
                header("Location: ../../nav.php?var=$jobId");
            }
        }
    }
}
if (isset($_POST['undodrop'])) {
    if (!empty($_POST["undodrop"])) {
        $id =    $_POST['undodrop'];
        $email123 = $_POST['email'];
        $jobId = $_POST['jobId'];
        $qq = "SELECT * FROM applyjob NATURAL JOIN candidate WHERE applyId='$id'";
        $rr = mysqli_query($con, $qq);
        $aa = mysqli_fetch_assoc($rr);
        $q = "UPDATE `applyjob` SET candidateDrop='0',dropReason=NULL,dropDate=NULL where applyId='$id'";
        $c = mysqli_query($con, $q);
        if ($c) {
            $ww = "select name from usertable where email = '$email123'";
            $ww1 = mysqli_query($con, $ww);
            $ww2 = mysqli_fetch_assoc($ww1);
            date_default_timezone_set("Asia/Bangkok");
            $time = date("Y-m-d H:i:s");
            $message = "undo drop $aa[candidateName] candidate";
            $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
            mysqli_query($con, $oi);
            $_SESSION['status'] = "Successfully undo drop $aa[candidateName] candidates";
            $_SESSION['status_code'] = "1";
            header("Location: ../../nav.php?var=$jobId");
        } else {
            $_SESSION['status'] = "Failed to undo drop $aa[candidateName] candidates";
            $_SESSION['status_code'] = "0";
            header("Location: ../../nav.php?var=$jobId");
        }
    }
}
if (isset($_POST['removedrop'])) {
    if (!empty($_POST["removedrop"])) {
        $id = $_POST['removedrop'];
        $email123 = $_POST['email'];
        $jobId = $_POST['jobId'];
        $o1 = "SELECT candidateName from applyjob NATURAL JOIN candidate where applyId = '$id'";
        $p1 = mysqli_query($con, $o1);
        $l1 = mysqli_fetch_assoc($p1);
        $sql1 = "DELETE FROM applyjob where applyId=$id";
        $res1 = mysqli_query($con, $sql1);
        if ($res1) {
            $ww = "select name from usertable where email = '$email123'";
            $ww1 = mysqli_query($con, $ww);
            $ww2 = mysqli_fetch_assoc($ww1);
            date_default_timezone_set("Asia/Bangkok");
            $time = date("Y-m-d H:i:s");
            $message = "remove $l1[candidateName] candidate";
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
}
if (isset($_POST['sendmail'])) {
    require '../../PHPMailer/PHPMailerAutoload.php';
    require 'credential.php';
    $aid =    $_POST['applyId'];
    $jobId = $_POST['jobId'];
    $email123 = $_POST['email'];

    $mail = new PHPMailer;
    date_default_timezone_set("Asia/Bangkok");
    $dataS = date("Y-m-d");
    $ww = "select * from usertable where email = '$email123'";
    $ww1 = mysqli_query($con, $ww);
    $ww2 = mysqli_fetch_assoc($ww1);
    $name = $ww2['name'];
    $nickname = $ww2['nickname'];
    $tel = $ww2['phoneNumber'];
    $sql = "SELECT candidateresume.tName as filename FROM applyjob NATURAL JOIN candidate NATURAL JOIN candidateresume WHERE applyjob.applyId=$aid";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($res);
    $sql123 = "SELECT applyjob.candidateId as candidateId FROM applyjob WHERE applyjob.applyId =$aid";
    $res123 = mysqli_query($con, $sql123);
    $row123 = mysqli_fetch_assoc($res123);
    $can = $row123['candidateId'];
    $koi = "SELECT * FROM job WHERE jobId = $jobId";
    $tora = mysqli_query($con, $koi);
    $yip = mysqli_fetch_assoc($tora);
    $position = $yip['position'];
    $contact = $yip['contract'];
    $emailContact = $yip['emailOfContact'];
    $fuji = "SELECT * FROM client WHERE clientId  =  $yip[clientId]";
    $zen = mysqli_query($con, $fuji);
    $aka = mysqli_fetch_assoc($zen);
    $pattern = $aka['template'];
    $ray = "select * from candidate where candidateId = $can";
    $nay = mysqli_query($con, $ray);
    $bay = mysqli_fetch_array($nay);
    $mail->isSMTP();
    $mail->CharSet = "utf-8";                                     // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = EMAIL;                 // SMTP username
    $mail->Password = PASS;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom(EMAIL, 'Super Recruit');
    $mail->addAddress($emailContact);     // Add a recipient

    $mail->addReplyTo(EMAIL);
    $secret = "../../upload/";
    echo $file = $row['filename'];
    // foreach ($files as $file) {
    $mail->addAttachment($secret . $file);
    // }
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->AddEmbeddedImage('../../img/email.jpg', 'logo');
    $mail->Subject = "Vanness Plus: Propose $position - $bay[candidateName]";

    if ($pattern == 1) {
        $mail->Body    = '
Dear K.' . $contact . ',<br>
I would like to propose a candidate as below detail;<br><br>
<table style="width:75%; border: 1px solid black;
border-collapse: collapse;">
<tr>
<th style=" border: 1px solid black;border-collapse: collapse;text-align:center;background-color:#fbe4d5 ">Name</th>
<td style=" border: 1px solid black;border-collapse: collapse;text-align:center">' . $bay['candidateName'] . '</td>
</tr>
<tr>
<th style=" border: 1px solid black;border-collapse: collapse;text-align:center;background-color:#fbe4d5">Position</th>
<td style=" border: 1px solid black;border-collapse: collapse;text-align:center">' . $position . '</td>
</tr>
<tr>
<tr>
<th style=" border: 1px solid black;border-collapse: collapse;text-align:center;background-color:#fbe4d5">Current Salary</th>
<td style=" border: 1px solid black;border-collapse: collapse;text-align:center">' . $bay['currentSalary'] . ' baht</td>
</tr>
<tr>
<tr>
<th style=" border: 1px solid black;border-collapse: collapse;text-align:center;background-color:#fbe4d5">Expected Salary</th>
<td style=" border: 1px solid black;border-collapse: collapse;text-align:center">' . $bay['expectSalary'] . ' baht</td>
</tr>
<tr>
<tr>
<th style=" border: 1px solid black;border-collapse: collapse;text-align:center;background-color:#fbe4d5">Start Date</th>
<td style=" border: 1px solid black;border-collapse: collapse;text-align:center">' . $bay['startDate'] . '</td>
</tr>
<tr>
<tr>
<th style=" border: 1px solid black;border-collapse: collapse;text-align:center;background-color:#fbe4d5">Phone No.</th>
<td style=" border: 1px solid black;border-collapse: collapse;text-align:center">' . $bay['phoneNumber'] . '</td>
</tr>
<tr>
<tr>
<th style=" border: 1px solid black;border-collapse: collapse;text-align:center;background-color:#fbe4d5">Email</th>
<td style=" border: 1px solid black;border-collapse: collapse;text-align:center">' . $bay['candidateEmail'] . '</td>
</tr>
<tr>
</table>
<br>
<span>Thanks & Regards </span><br>
<span>' . $name . ' (' . $nickname . ')</span><br>
<span> Mobile: ' . $tel . ' </span><br>
<img  src="cid:logo"></img><br>
<div style="color:#004080">
<b>Vanness Plus Consulting Co., Ltd. </b><br>
Professional recruitment for IT jobs <br>
98 Sathorn Square Building, <br>
North Sathorn Rd., Silom, Bangrak, <br>
Bangkok 10500<br></div>


    ';
    } else if ($pattern == 2) {
        $sss = "SELECT candidate.candidateName,candidate.expectSalary,(((candidate.expectSalary*percent/100)+candidate.expectSalary)+extra) as totalcharge FROM (candidate NATURAL JOIN applyjob NATURAL JOIN job) join client on job.clientId=client.clientId where applyId='$aid'";
        $rrr = mysqli_query($con, $sss);
        $ooo = mysqli_fetch_assoc($rrr);
        $mail->Body    = '
Dear Local TCX Team,<br>
I would like to propose a qualified candidate as below detail;<br><br>
<table style="width:100%;border-collapse: collapse;">
        
    <thead style="height:70px;">
        <tr>
            <th style=" border: 1px solid black;background-color:#7F29C1;text-align:center;color:#fff">Date Submitted</th>
            <th  style=" border: 1px solid black;background-color:#7F29C1;text-align:center;color:#fff">Candidate Name</th>
            <th  style=" border: 1px solid black;background-color:#7F29C1;text-align:center;color:#fff">Proposed Role/Project Site</th>
            <th  style=" border: 1px solid black;background-color:#7F29C1;text-align:center;color:#fff">Nationality/Visa status</th>
            <th  style=" border: 1px solid black;background-color:#7F29C1;text-align:center;color:#fff">Notice Period</th>
            <th style=" border: 1px solid black;background-color:#7F29C1;text-align:center;color:#fff">Total Years of Experience</th>
            <th  style=" border: 1px solid black;background-color:#7F29C1;text-align:center;color:#fff">English Proficiency</th>
            <th  style=" border: 1px solid black;background-color:#7F29C1;text-align:center;color:#fff">Rate</th>
        </tr>
        
        
        </thead>
        
        <tbody style="height:50px">
        <tr>
            <td style=" border: 1px solid black;text-align:center"> $dataS</td>
            <td style=" border: 1px solid black;text-align:center">' . $bay['candidateName'] . '</td>
            <td style=" border: 1px solid black;text-align:center">' . $position . '/' . $aka['clientName'] . '</td>
            <td style=" border: 1px solid black;text-align:center">' . $bay['nationnality'] . '</td>
            <td style=" border: 1px solid black;text-align:center">' . $bay['NoticePeriod'] . '</td>
            <td style=" border: 1px solid black;text-align:center">' . $bay['TotalExperience'] . '</td>
            <td style=" border: 1px solid black;text-align:center">' . $bay['EnglishProficiency'] . '</td>
            <td style=" border: 1px solid black;font-size:13px;width:175px">Current Salary:' . $bay['currentSalary'] . ' baht<br>
            Expected Salary: ' . $bay['expectSalary'] . ' baht<br>
            Total Charge Rate: '.$ooo['totalcharge'].' baht</td>    
        </tr>
           
        
        </tbody>
        </table>
        <br>
        <span>Thanks & Regards </span><br>
         <span>' . $name . ' (' . $nickname . ')</span><br>
        <span> Mobile: ' . $tel . ' </span><br>
        <img  src="cid:logo"></img><br>
        <div style="color:#004080">
        <b>Vanness Plus Consulting Co., Ltd. </b><br>
        Professional recruitment for IT jobs <br>
        98 Sathorn Square Building, <br>
        North Sathorn Rd., Silom, Bangrak, <br>
        Bangkok 10500<br></div>
        
        
            ';
    } else if ($pattern == 3) {
        $mail->Body    = '
        Dear K.' . $contact . ',<br>
I would like to propose a qualified candidate as below detail;<br><br>
<table style="width:100%;border-collapse: collapse;">

<thead style="height:70px">
<tr>
    <th rowspan="2" style=" border: 1px solid black;background-color:#8EE560;text-align:center">No.</th>
    <th rowspan="2" style=" border: 1px solid black;background-color:#8EE560;text-align:center">Name</th>
    <th rowspan="2" style=" border: 1px solid black;background-color:#8EE560;text-align:center">Position</th>
    <th colspan="2" style=" border: 1px solid black;background-color:#8EE560;text-align:center">Experience</th>
    <th colspan="2" style=" border: 1px solid black;background-color:#8EE560;text-align:center">Technical Skill</th>
    <th rowspan="2" style=" border: 1px solid black;background-color:#8EE560;text-align:center">Availability </th>
    <th rowspan="2" style=" border: 1px solid black;background-color:#8EE560;text-align:center">Monthly rate </th>
    
</tr>
<tr>
    <th style=" border: 1px solid black;text-align:center">&emsp;&emsp;Total&emsp;&emsp;</th>
    <th style=" border: 1px solid black;text-align:center">Experience in Position</th>
    <th style=" border: 1px solid black;text-align:center">Major Skill</th>
    <th style=" border: 1px solid black;text-align:center">Secondary Skill</th>
</tr>

</thead>

<tbody style="height:50px">
<tr>
    <td style=" border: 1px solid black;text-align:center">1</td>
    <td style=" border: 1px solid black;text-align:center">' . $bay['candidateName'] . '</td>
    <td style=" border: 1px solid black;text-align:center">' . $position . '</td>
    <td style=" border: 1px solid black;text-align:center">' . $bay['TotalExperience'] . '</td>
    <td style=" border: 1px solid black;text-align:center">' . $bay['TotalExperience'] . '</td>
    <td style=" border: 1px solid black;text-align:center">' . $bay['MajorSkill'] . '</td>
    <td style=" border: 1px solid black;text-align:center">' . $bay['SecondarySkill'] . '</td>
    <td style=" border: 1px solid black;text-align:center">' . $bay['startDate'] . '</td>
    <td style=" border: 1px solid black;text-align:center">' . $bay['expectSalary'] . ' baht</td>    
</tr>
   

</tbody>
</table>
<br>
<span>Thanks & Regards </span><br>
<span>' . $name . ' (' . $nickname . ')</span><br>
<span> Mobile: ' . $tel . ' </span><br>
<img  src="cid:logo"></img><br>
<div style="color:#004080">
<b>Vanness Plus Consulting Co., Ltd. </b><br>
Professional recruitment for IT jobs <br>
98 Sathorn Square Building, <br>
North Sathorn Rd., Silom, Bangrak, <br>
Bangkok 10500<br></div>


    ';
    } else if ($pattern == 4) {
        $mail->Body    = '
Dear K.' . $contact . ',<br>
I would like to propose a qualified candidate as below detail;<br><br>
<table style="width:100%;border-collapse: collapse;">

<thead style="height:70px">
<tr>
    <th rowspan="2" style=" border: 1px solid black;background-color:#16155E;text-align:center;color:#fff">No.</th>
    <th rowspan="2" style=" border: 1px solid black;background-color:#16155E;text-align:center;color:#fff">Position</th>
    <th rowspan="2" style=" border: 1px solid black;background-color:#16155E;text-align:center;color:#fff">Experience</th>
    <th rowspan="2" style=" border: 1px solid black;background-color:#16155E;text-align:center;color:#fff">Name</th>
    <th rowspan="2" style=" border: 1px solid black;background-color:#16155E;text-align:center;color:#fff">Database</th>
    <th rowspan="2" style=" border: 1px solid black;background-color:#16155E;text-align:center;color:#fff">Available date </th>
    <th rowspan="2" style=" border: 1px solid black;background-color:#16155E;text-align:center;color:#fff">Service fee/month (THB) </th>
    <th rowspan="2" style=" border: 1px solid black;background-color:#16155E;text-align:center;color:#fff">Interview date</th>
    
</tr>


</thead>

<tbody style="height:50px">
<tr>
    <td style=" border: 1px solid black;text-align:center">1</td>
    <td style=" border: 1px solid black;text-align:center">' . $position . '</td>
    <td style=" border: 1px solid black;text-align:center">' . $bay['TotalExperience'] . '</td>
    <td style=" border: 1px solid black;text-align:center">' . $bay['candidateName'] . '</td>
    <td style=" border: 1px solid black;text-align:center">-</td>
    <td style=" border: 1px solid black;text-align:center">' . $bay['startDate'] . '</td>
    <td style=" border: 1px solid black;text-align:center">-</td>
    <td style=" border: 1px solid black;text-align:center">-</td>
    
</tr>
   

</tbody>
</table>
<br>
<span>Thanks & Regards </span><br>
<span>' . $name . ' (' . $nickname . ')</span><br>
<span> Mobile: ' . $tel . ' </span><br>
<img  src="cid:logo"></img><br>
<div style="color:#004080">
<b>Vanness Plus Consulting Co., Ltd. </b><br>
Professional recruitment for IT jobs <br>
98 Sathorn Square Building, <br>
North Sathorn Rd., Silom, Bangrak, <br>
Bangkok 10500<br></div>


    ';
    }

    if (!$mail->send()) {
        $_SESSION['status'] = 'Mailer Error: ' . $mail->ErrorInfo;;
        $_SESSION['status_code'] = "0";
        header("Location: ../../nav.php?var=$jobId");
    } else {
        $ww = "select name from usertable where email = '$email123'";
        $ww1 = mysqli_query($con, $ww);
        $ww2 = mysqli_fetch_assoc($ww1);
        date_default_timezone_set("Asia/Bangkok");
        $time = date("Y-m-d H:i:s");
        $message = "sent email to K.$contact ";
        $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
        mysqli_query($con, $oi);
        $_SESSION['status'] = "Successfully sent email to K.$contact";
        $_SESSION['status_code'] = "1";
        header("Location: ../../nav.php?var=$jobId");
    }
}

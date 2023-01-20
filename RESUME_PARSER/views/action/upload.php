<?php
session_start();
require('../../function/connection.php');
if (isset($_POST['upload'])) {
    $j = 0;
    // echo $uploadfile=$_FILES['uploadfile']['tmp_name'];
    $count = count($_FILES['uploadfile']['tmp_name']);
    // echo $count;
    for ($i = 0; $i < $count; $i++) {
        echo $extention = pathinfo($_FILES['uploadfile']['name'][$i], PATHINFO_EXTENSION);
        //check type file 
        if ($extention == "xlsx") {
            require_once '../../PHPExcel/Classes/PHPExcel.php';
            require_once '../../PHPExcel/Classes/PHPExcel/IOFactory.php';
            $email123 = $_POST['email'];
            $objExcel = PHPExcel_IOFactory::load($_FILES['uploadfile']['tmp_name'][$i]);
            foreach ($objExcel->getWorksheetIterator() as $worksheet) {
                if (
                    $worksheet->getCellByColumnAndRow(0, 1)->getValue() == "NO" &&
                    $worksheet->getCellByColumnAndRow(1, 1)->getValue() == "ROLE/POSITION" &&
                    $worksheet->getCellByColumnAndRow(2, 1)->getValue() == "KEY SKILLS" &&
                    $worksheet->getCellByColumnAndRow(3, 1)->getValue() == "VACANCY/QUANTITY" &&
                    $worksheet->getCellByColumnAndRow(4, 1)->getValue() == "MAXIMUM BUDGET" &&
                    $worksheet->getCellByColumnAndRow(5, 1)->getValue() == "TYPE / DURATION" &&
                    $worksheet->getCellByColumnAndRow(6, 1)->getValue() == "JOB LOCATION" &&
                    $worksheet->getCellByColumnAndRow(7, 1)->getValue() == "JOB SCOPE/ QUALIFICATIONS" &&
                    $worksheet->getCellByColumnAndRow(8, 1)->getValue() == "LEVEL / EXP" &&
                    $worksheet->getCellByColumnAndRow(9, 1)->getValue() == "PROJECT INDUSTRY" &&
                    $worksheet->getCellByColumnAndRow(10, 1)->getValue() == "STATUS" &&
                    $worksheet->getCellByColumnAndRow(11, 1)->getValue() == "POINT OF CONTACT"
                ) {
                    $highestrow = $worksheet->getHighestRow();
                    for ($row = 2; $row <= $highestrow; $row++) {
                        $pos = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $keySkill = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                        $quantity = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                        $maximumBudget = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                        $duration = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                        $jobLocation = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                        $qualification = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                        $level = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                        $industry = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                        $status = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                        $contract = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                        $date = date("Y-m-d");

                        if ($duration == '') {
                            $durationId = "NULL";
                        } else {
                            $sqli1 = "SELECT * FROM contractdetail";
                            $res1 = mysqli_query($con, $sqli1);
                            while ($row1 = mysqli_fetch_array($res1)) {
                                if ($row1['contractDetail'] == $duration) {
                                    $durationId = $row1['contractDetailId'];
                                }
                            }
                        }
                        if ($industry == '') {
                            $industryId = "NULL";
                        } else {
                            $sqli2 = "SELECT * FROM industry";
                            $res2 = mysqli_query($con, $sqli2);
                            while ($row2 = mysqli_fetch_array($res2)) {
                                if ($row2['industry'] == $industry) {
                                    $industryId = $row2['industryId'];
                                }
                            }
                        }
                        if ($status == '') {
                            $statusId = 1;
                        } else {
                            $sqli3 = "SELECT * FROM jobstatus";
                            $res3 = mysqli_query($con, $sqli3);
                            while ($row3 = mysqli_fetch_array($res3)) {
                                if ($row3['jobStatus'] == $status) {
                                    $statusId = $row3['jobStatusId'];
                                }
                            }
                        }
                        $sqli = "INSERT INTO job(position,keySkill,quantity,maximumBudget,contractDetailId,jobLocation,qualifications,level,industryId,jobStatusId,emailOfContact,jobCreateDate) 
                                    VALUES('$pos','$keySkill','$quantity','$maximumBudget',$durationId,'$jobLocation','$qualification','$level',$industryId,$statusId,'$contract','$date')";
                        $ins = mysqli_query($con, $sqli);
                        if ($ins) {
                            $j++;
                            $high = $highestrow - 1;
                            $ww = "select name from usertable where email = '$email123'";
                            $ww1 = mysqli_query($con, $ww);
                            $ww2 = mysqli_fetch_assoc($ww1);
                            date_default_timezone_set("Asia/Bangkok");
                            $time = date("Y-m-d H:i:s");
                            $message = "successfully uploaded $high job";
                            $oi = "INSERT INTO message(title,mess,time) 
                                            VALUES( ' $ww2[name]','$message','$time')";
                            if ($j == $high) {
                                $op = mysqli_query($con, $oi);
                            }
                            $_SESSION['status'] = "Successfully uploaded $high job";
                            $_SESSION['status_code'] = "1";
                            header("Location: ../../job.php");
                        } else {
                            $_SESSION['status'] = "Failed to upload job";
                            $_SESSION['status_code'] = "0";
                            header("location: ../../job.php");
                        }
                    }
                } else {
                    $_SESSION['status'] = "Failed to upload,Incorrect template";
                    $_SESSION['status_code'] = "0";
                    header("location: ../../job.php");
                }
            }
        } else {
            $_SESSION['status'] = "Failed to upload,File not this type";
            $_SESSION['status_code'] = "0";
            header("location: ../../job.php");
        }
    }
}
if (isset($_POST['upload2'])) {
    $j = 0;
    // echo $uploadfile=$_FILES['uploadfile']['tmp_name'];
    $count = count($_FILES['uploadfile']['tmp_name']);
    // echo $count;
    for ($i = 0; $i < $count; $i++) {
        echo $extention = pathinfo($_FILES['uploadfile']['name'][$i], PATHINFO_EXTENSION);
        //check type file 
        if ($extention == "xlsx") {
            require_once '../../PHPExcel/Classes/PHPExcel.php';
            require_once '../../PHPExcel/Classes/PHPExcel/IOFactory.php';
            $email123 = $_POST['email'];
            $objExcel = PHPExcel_IOFactory::load($_FILES['uploadfile']['tmp_name'][$i]);
            foreach ($objExcel->getWorksheetIterator() as $worksheet) {
                if (
                    $worksheet->getCellByColumnAndRow(0, 1)->getValue() == "NO" &&
                    $worksheet->getCellByColumnAndRow(1, 1)->getValue() == "ROLE/POSITION" &&
                    $worksheet->getCellByColumnAndRow(2, 1)->getValue() == "KEY SKILLS" &&
                    $worksheet->getCellByColumnAndRow(3, 1)->getValue() == "VACANCY/QUANTITY" &&
                    $worksheet->getCellByColumnAndRow(4, 1)->getValue() == "MAXIMUM BUDGET" &&
                    $worksheet->getCellByColumnAndRow(5, 1)->getValue() == "TYPE / DURATION" &&
                    $worksheet->getCellByColumnAndRow(6, 1)->getValue() == "JOB LOCATION" &&
                    $worksheet->getCellByColumnAndRow(7, 1)->getValue() == "JOB SCOPE/ QUALIFICATIONS" &&
                    $worksheet->getCellByColumnAndRow(8, 1)->getValue() == "LEVEL / EXP" &&
                    $worksheet->getCellByColumnAndRow(9, 1)->getValue() == "PROJECT INDUSTRY" &&
                    $worksheet->getCellByColumnAndRow(10, 1)->getValue() == "STATUS" &&
                    $worksheet->getCellByColumnAndRow(11, 1)->getValue() == "POINT OF CONTACT"
                ) {
                    $highestrow = $worksheet->getHighestRow();
                    for ($row = 2; $row <= $highestrow; $row++) {
                        $pos = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $keySkill = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                        $quantity = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                        $maximumBudget = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                        $duration = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                        $jobLocation = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                        $qualification = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                        $level = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                        $industry = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                        $status = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                        $contract = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                        $date = date("Y-m-d");

                        if ($duration == '') {
                            $durationId = "NULL";
                        } else {
                            $sqli1 = "SELECT * FROM contractdetail";
                            $res1 = mysqli_query($con, $sqli1);
                            while ($row1 = mysqli_fetch_array($res1)) {
                                if ($row1['contractDetail'] == $duration) {
                                    $durationId = $row1['contractDetailId'];
                                }
                            }
                        }
                        if ($industry == '') {
                            $industryId = "NULL";
                        } else {
                            $sqli2 = "SELECT * FROM industry";
                            $res2 = mysqli_query($con, $sqli2);
                            while ($row2 = mysqli_fetch_array($res2)) {
                                if ($row2['industry'] == $industry) {
                                    $industryId = $row2['industryId'];
                                }
                            }
                        }
                        if ($status == '') {
                            $statusId = 1;
                        } else {
                            $sqli3 = "SELECT * FROM jobstatus";
                            $res3 = mysqli_query($con, $sqli3);
                            while ($row3 = mysqli_fetch_array($res3)) {
                                if ($row3['jobStatus'] == $status) {
                                    $statusId = $row3['jobStatusId'];
                                }
                            }
                        }
                        $ww = "select * from usertable where email = '$email123'";
                        $ww1 = mysqli_query($con, $ww);
                        $ww2 = mysqli_fetch_assoc($ww1);
                        $uId = $ww2['id'];
                        $sqli = "INSERT INTO job(position,keySkill,quantity,maximumBudget,contractDetailId,jobLocation,qualifications,level,industryId,jobStatusId,emailOfContact,jobCreateDate,id) 
                                    VALUES('$pos','$keySkill','$quantity','$maximumBudget',$durationId,'$jobLocation','$qualification','$level',$industryId,$statusId,'$contract','$date','$uId')";
                        $ins = mysqli_query($con, $sqli);
                        if ($ins) {
                            $j++;
                            $high = $highestrow - 1;
                            date_default_timezone_set("Asia/Bangkok");
                            $time = date("Y-m-d H:i:s");
                            $message = "successfully uploaded $high job";
                            $oi = "INSERT INTO message(title,mess,time) 
                                            VALUES( ' $ww2[name]','$message','$time')";
                            if ($j == $high) {
                                $op = mysqli_query($con, $oi);
                            }
                            $_SESSION['status'] = "Successfully uploaded $high job";
                            $_SESSION['status_code'] = "1";
                            header("Location: ../../jobAdmin.php");
                        } else {
                            $_SESSION['status'] = "Failed to upload job";
                            $_SESSION['status_code'] = "0";
                            header("location: ../../jobAdmin.php");
                        }
                    }
                } else {
                    $_SESSION['status'] = "Failed to upload,Incorrect template";
                    $_SESSION['status_code'] = "0";
                    header("location: ../../jobAdmin.php");
                }
            }
        } else {
            $_SESSION['status'] = "Failed to upload,File not this type";
            $_SESSION['status_code'] = "0";
            header("location: ../../jobAdmin.php");
        }
    }
}

<?php 
session_start();
    require('../../function/connection.php');
    if(isset($_POST['updateCandidate_Upload'])){
        $email123 = $_POST['email'];
        $cId=$_POST['id123'];
        $first_name_eng = $_POST['first_name_eng'];
        $last_name_eng = $_POST['last_name_eng'];
        $first_name_thai = $_POST['first_name_thai'];
        $last_name_thai = $_POST['last_name_thai'];
        $data_specialized_background = $_POST['data_specialized_background'];
        $data_project_record = $_POST['data_project_record'];
        $data_extra_experiences = $_POST['data_extra_experiences'];
        $data_soft_skill = $_POST['data_soft_skill'];
        $data_operating_system = $_POST['data_operating_system'];
        $data_database = $_POST['data_database'];
        $data_database_features = $_POST['data_database_features'];
        $data_application_servers = $_POST['data_application_servers'];
        $data_securities = $_POST['data_securities'];
        $data_java_script_technologies = $_POST['data_java_script_technologies'];
        $data_report = $_POST['data_report'];
        $data_methodologies = $_POST['data_methodologies'];
        $data_cloud_technologies = $_POST['data_cloud_technologies'];
        $data_programing_language = $_POST['data_programing_language'];
        $data_toolsIDE = $_POST['data_toolsIDE'];
        $data_database_tools = $_POST['data_database_tools'];
        $data_networks = $_POST['data_networks'];
        $data_java_technologies = $_POST['data_java_technologies'];
        $data_version_control_system = $_POST['data_version_control_system'];
        $data_devops_technologies = $_POST['data_devops_technologies'];
        $data_tech_stack = $_POST['data_tech_stack'];
        $data_others = $_POST['data_others'];
        $data_company_work_experiences = $_POST['data_company_work_experiences'];
        $data_education = $_POST['data_education'];
        $data_certification = $_POST['data_certification'];
      


        $sql1 = "UPDATE parser_resume_data SET data_name_first='$first_name_eng',
                                                data_name_last='$last_name_eng',
                                                data_name_first_thai='$first_name_thai',
                                                data_name_last_thai='$last_name_thai',
                                                data_specialized_background='$data_specialized_background',
                                                data_project_record = '$data_project_record',
                                                data_extra_experiences = '$data_extra_experiences',
                                                data_soft_skill = '$data_soft_skill',
                                                data_operating_system = '$data_operating_system',
                                                data_database = '$data_database',
                                                data_database_features = '$data_database_features',
                                                data_application_servers = '$data_application_servers',
                                                data_securities = '$data_securities',
                                                data_java_script_technologies = '$data_java_script_technologies',
                                                data_report = '$data_report',
                                                data_methodologies = '$data_methodologies',
                                                data_cloud_technologies = '$data_cloud_technologies',
                                                data_programing_language = '$data_programing_language',
                                                data_toolsIDE = '$data_toolsIDE',
                                                data_database_tools = '$data_database_tools',
                                                data_networks = '$data_networks',
                                                data_java_technologies = '$data_java_technologies',
                                                data_version_control_system = '$data_version_control_system',
                                                data_devops_technologies = '$data_devops_technologies',
                                                data_tech_stack = '$data_tech_stack',
                                                data_others = '$data_others',
                                                data_company_work_experiences = '$data_company_work_experiences',
                                                data_education = '$data_education',
                                                data_certification = '$data_certification'
                                                WHERE id=$cId";
        $res1 = mysqli_query($con, $sql1);
        if($res1){
            $ww = "select name from usertable where email = '$email123'";
            $ww1 = mysqli_query($con, $ww);
            $ww2 = mysqli_fetch_assoc($ww1);
            date_default_timezone_set("Asia/Bangkok");
            $time = date("Y-m-d H:i:s");
            $message = "edit $data_name_first from parser_resume_data";
            $oi = "INSERT INTO message(title,mess,time) 
                        VALUES( ' $ww2[name]','$message','$time')";
            $op = mysqli_query($con, $oi);
            $_SESSION['status'] = "Successfully changed detail of candidate";
            $_SESSION['status_code'] = "1";
            header("Location: ../../candidate.php");
        }
        else{
            $_SESSION['status'] = "Failed to change detail of candidate";
            $_SESSION['status_code'] = "0";
            header("Location: ../../candidate.php");
        }
        
    }
    if(isset($_POST['updateCandidate2'])){
        $email123 = $_POST['email'];
        $cId=$_POST['id123'];
        $name =$_POST['canName'];
        $email = $_POST['email765'];
        $phone = $_POST['num'];
        $nation = $_POST['nation'];
        $salary = $_POST['salary'];
        $expect = $_POST['expect'];
        $totalExp = $_POST['total'];
        $notice = $_POST['notice'];
        $major = $_POST['major'];
        $second = $_POST['second'];
        $eng = $_POST['eng'];
        $des = $_POST['dess'];
        $start = $_POST['date'];
        $sql1 = "UPDATE candidate SET candidateName='$name',phoneNumber='$phone',candidateEmail='$email',nationnality='$nation',EnglishProficiency='$eng',
        currentSalary='$salary',expectSalary='$expect',NoticePeriod='$notice',TotalExperience='$totalExp',MajorSkill='$major',SecondarySkill='$second',startDate='$start',description='$des' where candidateId=$cId";
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
            header("Location: ../../candidateAdmin.php");
        }
        else{
            $_SESSION['status'] = "Failed to change detail of candidate";
            $_SESSION['status_code'] = "0";
            header("Location: ../../candidateAdmin.php");
        }
    }
?>
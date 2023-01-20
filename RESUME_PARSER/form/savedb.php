<?php

include('server.php');

$errors = array();

if (isset($_POST['confirm_data']))  {
    // personal detail data
    $data_position = mysqli_real_escape_string($conn , $_POST['data_position']);
    $data_name_first = mysqli_real_escape_string($conn , $_POST['data_name_first']);
    $data_name_last = mysqli_real_escape_string($conn , $_POST['data_name_last']);
    $data_name_first_thai = mysqli_real_escape_string($conn , $_POST['data_name_first_thai']);
    $data_name_last_thai = mysqli_real_escape_string($conn , $_POST['data_name_last_thai']);
    // qulification summary
    $data_specialized_background = mysqli_real_escape_string($conn , $_POST['data_specialized_background']);
    $data_project_record = mysqli_real_escape_string($conn , $_POST['data_project_record']);
    $data_extra_experiences = mysqli_real_escape_string($conn , $_POST['data_extra_experiences']);
    $data_soft_skill = mysqli_real_escape_string($conn , $_POST['data_soft_skill']);
    // technical expertise
    $data_operating_system = mysqli_real_escape_string($conn , $_POST['data_operating_system']);
    $data_programing_language = mysqli_real_escape_string($conn , $_POST['data_programing_language']);
    $data_database = mysqli_real_escape_string($conn , $_POST['data_database']);
    $data_toolsIDE = mysqli_real_escape_string($conn , $_POST['data_toolsIDE']);
    $data_database_features = mysqli_real_escape_string($conn , $_POST['data_database_features']);
    $data_database_tools = mysqli_real_escape_string($conn , $_POST['data_database_tools']);
    $data_application_servers = mysqli_real_escape_string($conn , $_POST['data_application_servers']);
    $data_networks = mysqli_real_escape_string($conn , $_POST['data_networks']);
    $data_securities = mysqli_real_escape_string($conn , $_POST['data_securities']);
    $data_java_technologies = mysqli_real_escape_string($conn , $_POST['data_java_technologies']);
    $data_java_script_technologies = mysqli_real_escape_string($conn , $_POST['data_java_script_technologies']);
    $data_version_control_system = mysqli_real_escape_string($conn , $_POST['data_version_control_system']);
    $data_report = mysqli_real_escape_string($conn , $_POST['data_report']);
    $data_design_tools = mysqli_real_escape_string($conn , $_POST['data_design_tools']);
    $data_methodologies = mysqli_real_escape_string($conn , $_POST['data_methodologies']);
    $data_devops_technologies = mysqli_real_escape_string($conn , $_POST['data_devops_technologies']);
    $data_cloud_technologies = mysqli_real_escape_string($conn , $_POST['data_cloud_technologies']);
    $data_tech_stack = mysqli_real_escape_string($conn , $_POST['data_tech_stack']);
    $data_others = mysqli_real_escape_string($conn , $_POST['data_others']);

    // professional experiences
    $data_company_work_experiences = mysqli_real_escape_string($conn , $_POST['data_company_work_experiences']);
    $data_education = mysqli_real_escape_string($conn , $_POST['data_education']);
    $data_certification = mysqli_real_escape_string($conn , $_POST['data_certification']);

    // check query
    // check errors
    if (count($errors) == 0)    {
        $sql = "INSERT INTO parser_resume_data (data_position,data_name_first,data_name_last,data_name_first_thai,data_name_last_thai,data_specialized_background
        ,data_project_record,data_extra_experiences,data_soft_skill,data_operating_system,data_programing_language,data_database,data_toolsIDE,data_database_features
        ,data_database_tools,data_application_servers,data_networks,data_securities,data_java_technologies,data_java_script_technologies,data_version_control_system
        ,data_report,data_design_tools,data_methodologies,	data_devops_technologies,data_cloud_technologies,data_tech_stack,data_others,data_company_work_experiences
        ,data_education,data_certification) 
        VALUES 
        ('$data_position','$data_name_first','$data_name_last','$data_name_first_thai','$data_name_last_thai','$data_specialized_background'
        ,'$data_project_record','$data_extra_experiences','$data_soft_skill','$data_operating_system','$data_programing_language','$data_database'
        ,'$data_toolsIDE','$data_database_features','$data_database_tools','$data_application_servers','$data_networks','$data_securities','$data_java_technologies','$data_java_script_technologies'
        ,'$data_version_control_system','$data_report','$data_design_tools','$data_methodologies','$data_devops_technologies','$data_cloud_technologies','$data_tech_stack','$data_others'
        ,'$data_company_work_experiences','$data_education','$data_certification')";
        mysqli_query($conn,$sql);
        //header('location: success.php');
        
    }
}

?>
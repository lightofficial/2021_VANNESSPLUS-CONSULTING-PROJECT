<style>
    #view {
        font-size: 17px;
        padding-top: 10px;
    }

    b {
        font-weight: 500;
        font-size: 19px;
    }

    textarea::-webkit-scrollbar-track {

        border-radius: 10px;
        background-color: #E9E3D7;
    }

    textarea::-webkit-scrollbar {
        width: 8px;
        height: 12px;
        padding-left: 1px;
        background-color: #fff;
        cursor: context-menu;
    }

    textarea::-webkit-scrollbar-thumb {
        border-radius: 10px;

        background-color: #909090;
    }

    textarea::-webkit-scrollbar-thumb:hover {
        border-radius: 10px;

        background-color: #cccccc;
    }
    strong {
        font-size: 20px;
    }
</style>
<?php

if (isset($_POST["canId"])) {
    $xx = $_POST["canId"];
    $email = $_POST["email"];
    $output = '';
    $con = mysqli_connect('localhost', 'root', '', 'super');
    $sql1 = "SELECT * FROM parser_resume_data WHERE id='" . $_POST["canId"] . "'";
    $res1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_array($res1);
    $output .= '<div class="modal-header">
                    <h4 class="modal-title">Update ' . $row1['data_name_first'] . '</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>  
                <form action="views/action/updateCandidate_Upload.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id123" id="id123" value="' . $xx . '">
                        <input type="hidden" name="email" id="email" value="' . $email . '">
                        <div class="container">

                            <div class="row">
                                <div class="col-md-12">
                                <strong> Personal Detail </strong>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Candidate First Name</label>
                                        <input type="text" class="form-control" name="first_name_eng" id="first_name_eng" value="' . $row1['data_name_first'] . '" >
                                    </div> 

                                    <div class="form-group">
                                        <label>Candidate Thai First Name</label>
                                        <input type="text" class="form-control" name="first_name_thai" id="first_name_thai" value="' . $row1['data_name_first_thai'] . '" >
                                    </div>

                                     
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Candidate Last Name</label>
                                        <input type="text" class="form-control" name="last_name_eng" id="last_name_eng" value="' . $row1['data_name_last'] . '" >
                                    </div>

                                    <div class="form-group">
                                        <label>Candidate Thai Last Name</label>
                                        <input type="text" class="form-control" name="last_name_thai" id="last_name_thai" value="' . $row1['data_name_last_thai'] . '" >
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <strong> Qulification Summary </strong>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Specialized Background</label>
                                        <textarea type="text" class="form-control" name="data_specialized_background" id="data_specialized_background">' . $row1['data_specialized_background'] . '</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Proven project record as position </label>
                                        <textarea type="text" class="form-control" name="data_project_record" id="data_project_record">' . $row1['data_project_record'] . '</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Extra related experience</label>
                                        <textarea type="text" class="form-control" name="data_extra_experiences" id="data_extra_experiences">' . $row1['data_extra_experiences'] . '</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Soft Skill </label>
                                        <textarea type="text" class="form-control" name="data_soft_skill" id="data_soft_skill">' . $row1['data_soft_skill'] . '</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <strong> Technical Expertise </strong>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>operating system</label>
                                        <textarea type="text" class="form-control" name="data_operating_system" id="data_operating_system">' . $row1['data_operating_system'] . '</textarea>
                                    </div>
                                 
                                    <div class="form-group">
                                        <label>database</label>
                                        <textarea type="text" class="form-control" name="data_database" id="data_database">' . $row1['data_database'] . '</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>database features</label>
                                        <textarea type="text" class="form-control" name="data_database_features" id="data_database_features">' . $row1['data_database_features'] . '</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>application servers</label>
                                        <textarea type="text" class="form-control" name="data_application_servers" id="data_application_servers">' . $row1['data_application_servers'] . '</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>securities</label>
                                        <textarea type="text" class="form-control" name="data_securities" id="data_securities">' . $row1['data_securities'] . '</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>javascript technologies</label>
                                        <textarea type="text" class="form-control" name="data_java_script_technologies" id="data_java_script_technologies">' . $row1['data_java_script_technologies'] . '</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>report</label>
                                        <textarea type="text" class="form-control" name="data_report" id="data_report">' . $row1['data_report'] . '</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>methodologies</label>
                                        <textarea type="text" class="form-control" name="data_methodologies" id="data_methodologies">' . $row1['data_methodologies'] . '</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>cloud technologies</label>
                                        <textarea type="text" class="form-control" name="data_cloud_technologies" id="data_cloud_technologies">' . $row1['data_cloud_technologies'] . '</textarea>
                                    </div>

                                    
                                    
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>programing language</label>
                                        <textarea type="text" class="form-control" name="data_programing_language" id="data_programing_language">' . $row1['data_programing_language'] . '</textarea>
                                    </div>
                               
                                    <div class="form-group">
                                        <label>toolsIDE</label>
                                        <textarea type="text" class="form-control" name="data_toolsIDE" id="data_toolsIDE">' . $row1['data_toolsIDE'] . '</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>database tools</label>
                                        <textarea type="text" class="form-control" name="data_database_tools" id="data_database_tools">' . $row1['data_database_tools'] . '</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>networks</label>
                                        <textarea type="text" class="form-control" name="data_networks" id="data_networks">' . $row1['data_networks'] . '</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>java technologies</label>
                                        <textarea type="text" class="form-control" name="data_java_technologies" id="data_java_technologies">' . $row1['data_java_technologies'] . '</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>version control system</label>
                                        <textarea type="text" class="form-control" name="data_version_control_system" id="data_version_control_system">' . $row1['data_version_control_system'] . '</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>devops technologies</label>
                                        <textarea type="text" class="form-control" name="data_devops_technologies" id="data_devops_technologies">' . $row1['data_devops_technologies'] . '</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>tech stack</label>
                                        <textarea type="text" class="form-control" name="data_tech_stack" id="data_tech_stack">' . $row1['data_tech_stack'] . '</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>others</label>
                                        <textarea type="text" class="form-control" name="data_others" id="data_others">' . $row1['data_others'] . '</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <strong> Professional Experiences </strong>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Company Experiences </label>
                                        <textarea type="text" class="form-control" name="data_company_work_experiences" id="data_company_work_experiences">' . $row1['data_company_work_experiences'] . '</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <strong> Education </strong>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Education</label>
                                        <textarea type="text" class="form-control" name="data_education" id="data_education">' . $row1['data_education'] . '</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <strong>Certification</strong>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Certification</label>
                                        <textarea type="text" class="form-control" name="data_certification" id="data_certification">' . $row1['data_certification'] . '</textarea>
                                    </div>
                                </div>

                                </div>
                        </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" style="background-color:#5757d1;border-radius: 5px;color:#ffffff" class="btn" name="updateCandidate_Upload" value="Save">
                    </div>
                </form>';



    echo $output;
}

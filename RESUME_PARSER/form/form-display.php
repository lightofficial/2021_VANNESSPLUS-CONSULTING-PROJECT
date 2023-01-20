<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            formData
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width , intital-scale=1">
        <!-- stylesheet -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

        <!-- javascript -->
        <script type="text/javascript" src="../assets/js/data_reading_v1.js"></script>
    </head>

    <style>
            body    {
                background-color: #121212;
            }
            img.center  {
                display: block;
                margin: 0 auto;
            }
    </style>

    <body>
        <div class="panel-body">
            <div id="form_confirm_div" class="form-group" >
                <form action="#" name="form_confirm_user" class="text-center">
                    <label for="user_identification" >
                        <label class="text-light">Identification ID : </label>
                        <input type="text" name="identification_ID" id="identification_ID">
                        <input type="button" class="btn btn-primary" value="Search" onclick="FetchData()">
                        <input type="button" class="btn btn-danger" value="Delete" onclick="DeleteIdentifierID()">
                        <button class="btn btn-warning" onClick="window.location.href=window.location.href">Refresh</button>
                    </label>
                </form>
             </div>

        <div class="container">       
            <div id="signupbox" style=" margin-top:50px" class="mainbox">
            <img class="center rounded-circle img-profile" src="../img/logo2.png" width="90" height="90" alt=""><br><br>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Candidate CV-Parser Form</div>
                    </div>  
                    <div class="panel-body" >
                        <form target="_blank" action="savedb.php" method="post" >
                            <!-- <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' /> -->
                                <div class="text-center" style="margin-bottom: 20px">
                                    <h3>Personal Detail</h3>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_position">position</label>
                                    <input type="text" name="data_position" id="data_position" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert position here...">
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_name_first">first name</label>
                                    <input type="text" name="data_name_first" id="data_name_first" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert first name here..." >
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_name_last">last name</label>
                                    <input type="text" name="data_name_last" id="data_name_last" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert last name here...">
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_name_first_thai">thai first name</label>
                                    <input type="text" name="data_name_first_thai" id="data_name_first_thai" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert thai first name here...">
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_name_last_thai">thai last name</label>
                                    <input type="text" name="data_name_last_thai" id="data_name_last_thai" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert thai last name here...">
                                </div>
        
                                <div class="text-center" style="margin-bottom: 20px">
                                    <h3>Qulification Summary </h3>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_specialized_background">specialized background</label>
                                    <textarea type="text" name="data_specialized_background" id="data_specialized_background" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert specialized background here..."></textarea>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_project_record">project record</label>
                                    <textarea type="text" name="data_project_record" id="data_project_record" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="proven project record as position"></textarea>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_extra_experiences">extra experiences</label>
                                    <textarea type="text" name="data_extra_experiences" id="data_extra_experiences" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert extra related experiences here..."></textarea>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_soft_skill">soft skill</label>
                                    <textarea type="text" name="data_soft_skill" id="data_soft_skill" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert soft skill here..."></textarea>
                                </div>

                                <div class="text-center" style="margin-bottom: 20px">
                                    <h3>Technical Expertise </h3>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_operating_system">operating system</label>
                                    <textarea type="text" name="data_operating_system" id="data_operating_system" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert your operating system here..."></textarea>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_programing_language">programing language</label>
                                    <textarea type="text" name="data_programing_language" id="data_programing_language" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert your programing language here..."></textarea>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_database">database</label>
                                    <textarea type="text" name="data_database" id="data_database" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert database here..."></textarea>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_toolsIDE">toolsIDE</label>
                                    <textarea type="text" name="data_toolsIDE" id="data_toolsIDE" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert toolsIDE here..."></textarea>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_database_features">database features</label>
                                    <textarea type="text" name="data_database_features" id="data_database_features" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert database feature here..."></textarea>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_database_tools">database tools</label>
                                    <textarea type="text" name="data_database_tools" id="data_database_tools" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert database tools here..."></textarea>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_application_servers">application servers</label>
                                    <textarea type="text" name="data_application_servers" id="data_application_servers" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert application servers here..."></textarea>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_networks">networks</label>
                                    <textarea type="text" name="data_networks" id="data_networks" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert networks skill here..."></textarea>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_securities">securities</label>
                                    <textarea type="text" name="data_securities" id="data_securities" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert securities skill here..."></textarea>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="">java technologies</label>
                                    <textarea type="text" name="data_java_technologies" id="data_java_technologies" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert java technologies here..."></textarea>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_java_script_technologies">javascript technologies</label>
                                    <textarea type="text" name="data_java_script_technologies" id="data_java_script_technologies" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert javascript technologies here..."></textarea>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_version_control_system">version control system</label>
                                    <textarea type="text" name="data_version_control_system" id="data_version_control_system" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert data version control system here..."></textarea>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_report">report</label>
                                    <textarea type="text" name="data_report" id="data_report" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert reports skill here..."></textarea>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_design_tools">design tools</label>
                                    <textarea type="text" name="data_design_tools" id="data_design_tools" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert design tools here..."></textarea>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_methodologies">methodologies</label>
                                    <textarea type="text" name="data_methodologies" id="data_methodologies" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert methodologies here..."></textarea>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_devops_technologies">devops technologies</label>
                                    <textarea type="text" name="data_devops_technologies" id="data_devops_technologies" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert devops technologies here..."></textarea>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_cloud_technologies">cloud technologies</label>
                                    <textarea type="text" name="data_cloud_technologies" id="data_cloud_technologies" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert cloud technologies here..."></textarea>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_tech_stack">tech stack</label>
                                    <textarea type="text" name="data_tech_stack" id="data_tech_stack" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert data tech stack here..."></textarea>
                                </div>
                                
                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_others">others</label>
                                    <textarea type="text" name="data_others" id="data_others" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert others here..."></textarea>
                                </div>

                                <div class="text-center" style="margin-bottom: 20px">
                                    <h3>Professional Experiences</h3>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_company_work_experiences">company experiences</label>
                                    <textarea type="text" name="data_company_work_experiences" id="data_company_work_experiences" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert working experiences here..."></textarea>
                                </div>

                                <div class="text-center" style="margin-bottom: 20px">
                                    <h3>Education</h3>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_education">education</label>
                                    <textarea type="text" name="data_education" id="data_education" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert experiences here..."></textarea>
                                </div>

                                <div class="text-center" style="margin-bottom: 20px">
                                    <h3>Certification</h3>
                                </div>

                                <div class="input-group">
                                    <label class="text-left col-md-2" for="data_certification">certification</label>
                                    <textarea type="text" name="data_certification" id="data_certification" style="margin-bottom: 10px" class="form-control col-md-10" placeholder="insert certification here..."></textarea>
                                </div>
                                
                                 <div class="form-group"> 
                                    <div class="aab controls col-md-4 "></div>
                                    <div class="controls text-center ">
                                            <div class="input-group">
                                                <button type="submit" name="confirm_data" class="btn btn-primary btn btn-info">Confirm</button>
                                            </div>
                                    </div>
                                </div> 
                            
                        </form>
                    </div>
                    <div class="panel-footer">
                    </div>
                </div>
            </div> 
        </div>
        </div>            
    </body>
</html>
<style>
    #view {
        font-size: 14px;
    }

    b {
        font-weight: 500;
        font-size: 16px;
    }
    strong {
        font-weight: 1000;
        font-size: 20px;
    }
</style>
<?php

if (isset($_POST["cId"])) {
    $can_upload = $_POST['cId'];
    $output = '';
    $con = mysqli_connect('localhost', 'root', '', 'super');
    $sql1 = "SELECT * FROM parser_resume_data where id = $can_upload";
    $res1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_array($res1);
    // $sql3 = "SELECT name FROM job left JOIN usertable ON usertable.id = job.id WHERE usertable.id='$row1[id]'";
    // $res3 = mysqli_query($con, $sql3);
    // $row3 = mysqli_fetch_array($res3);
    // $sql2 = "SELECT * FROM job right JOIN client ON client.clientId = job.clientId WHERE client.clientId = '$row1[clientId]' ";
    // $res2 = mysqli_query($con, $sql2);
    // $row2 = mysqli_fetch_array($res2);
    $output .= ' <div class="modal-header">
     <span style="color:#5757d1;font-weight:500;font-size:25px;">' . $row1['data_name_first'] . '</span>
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 </div> 
 <div class="modal-body">
     <div class="container">
        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <div class="col-md-4 " id="view">
                <b>Candidate No.  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-8" id="view">
                ' . $row1['id'] . '
            </div>
        </div>

        </div>
            <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <strong> Personal Detail </strong>
        </div>

        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <div class="col-md-4 " id="view">
                <b>Candidate First Name  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-8" id="view">
                ' . $row1['data_name_first'] . '
            </div>
        </div>

        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <div class="col-md-4 " id="view">
                <b>Candidate Last Name  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-8" id="view">
                ' . $row1['data_name_last'] . '
            </div>
        </div>

        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <div class="col-md-4 " id="view">
                <b>Candidate Thai First Name  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-8" id="view">
                ' . $row1['data_name_first_thai'] . '
            </div>
        </div>

        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <div class="col-md-4 " id="view">
                <b>Candidate Thai Last Name  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-8" id="view">
                ' . $row1['data_name_last_thai'] . '
            </div>

        </div>
            <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <strong> Qualification Summary </strong>
        </div>

        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <div class="col-md-4 " id="view">
                <b>Specialized Background  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-8" id="view">
                ' . $row1['data_specialized_background'] . '
            </div>
        </div>

        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <div class="col-md-4 " id="view">
                <b>Proven project record as position   </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-8" id="view">
                ' . $row1['data_project_record'] . '
            </div>
        </div>

        
        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <div class="col-md-4 " id="view">
                <b>Extra related experience   </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-8" id="view">
                ' . $row1['data_extra_experiences'] . '
            </div>
        </div>

        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <div class="col-md-4 " id="view">
                <b>Soft Skill   </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-8" id="view">
                ' . $row1['data_soft_skill'] . '
            </div>
        </div>

        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <strong> Technical Expertise </strong>
        </div>
        
        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <div class="col-md-4 " id="view">
                <b>Operating System   </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-8" id="view">
                ' . $row1['data_operating_system'] . '
            </div>
        </div>
        
        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <div class="col-md-4 " id="view">
                <b>Programing Language   </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-8" id="view">
                ' . $row1['data_programing_language'] . '
            </div>
        </div>

        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <div class="col-md-4 " id="view">
                <b>Database   </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-8" id="view">
                ' . $row1['data_database'] . '
            </div>
        </div>

        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <div class="col-md-4 " id="view">
                <b>Tools and IDE   </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-8" id="view">
                ' . $row1['data_toolsIDE'] . '
            </div>
        </div>

        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <strong> Professional Experiences </strong>
        </div>

        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <div class="col-md-4 " id="view">
                <b>Company Experiences</b><b style="float:right">  :</b>
            </div>
            <div class="col-md-8" id="view">
                ' . $row1['data_company_work_experiences'] . '
            </div>
        </div>

        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <strong> Education </strong>
        </div>

        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <div class="col-md-4 " id="view">
                <b>Education</b><b style="float:right">  :</b>
            </div>
            <div class="col-md-8" id="view">
                ' . $row1['data_education'] . '
            </div>
        </div>

        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <strong> Certification </strong>
        </div>

        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <div class="col-md-4 " id="view">
                <b>Certification</b><b style="float:right">  :</b>
            </div>
            <div class="col-md-8" id="view">
                ' . $row1['data_certification'] . '
            </div>
        </div>
        
    </div>
               </div>  <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>';



    echo $output;
}

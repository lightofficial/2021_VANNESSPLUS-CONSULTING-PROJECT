<style>
    #view {
        font-size: 17px;
    }

    b {
        font-weight: 500;
        font-size: 19px;
    }
</style>
<?php

if (isset($_POST["cId"])) {
    $can = $_POST['cId'];
    $output = '';
    $con = mysqli_connect('localhost', 'root', '', 'super');
    $sql1 = "SELECT * FROM candidate where candidateId = $can";
    $res1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_array($res1);
    // $sql3 = "SELECT name FROM job left JOIN usertable ON usertable.id = job.id WHERE usertable.id='$row1[id]'";
    // $res3 = mysqli_query($con, $sql3);
    // $row3 = mysqli_fetch_array($res3);
    // $sql2 = "SELECT * FROM job right JOIN client ON client.clientId = job.clientId WHERE client.clientId = '$row1[clientId]' ";
    // $res2 = mysqli_query($con, $sql2);
    // $row2 = mysqli_fetch_array($res2);
    $output .= ' <div class="modal-header">
     <span style="color:#5757d1;font-weight:500;font-size:25px;">' . $row1['candidateName'] . '</span>
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 </div> 
 <div class="modal-body">
     <div class="container">
        
        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <div class="col-md-3 " id="view">
                <b>Candidate Name  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-9" id="view">
                ' . $row1['candidateName'] . '
            </div>
        </div>
        <div class="row" style="padding-left:20px;padding-right:20px">
            <div class="col-md-3" id="view">
                <b>Phone Number  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-9" id="view">
                ' . $row1['phoneNumber'] . '
            </div>
        </div>
        <div class="row" style="padding-left:20px;padding-right:20px">
            <div class="col-md-3" id="view">
                <b>Candidate Email  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-9" id="view">
                ' . $row1['candidateEmail'] . '  
            </div>
        </div>
        <div class="row" style="padding-left:20px;padding-right:20px">
            <div class="col-md-3" id="view">
                <b>Nationality  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-9" id="view">
                ' . $row1['nationnality'] . '
            </div>
        </div>
        <div class="row" style="padding-left:20px;padding-right:20px">
            <div class="col-md-3" id="view">
                <b>English Proficiency  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-9" id="view">
                ' . $row1['EnglishProficiency'] . '
            </div>
        </div>
        <div class="row" style="padding-left:20px;padding-right:20px">
            <div class="col-md-3" id="view">
                <b>Current Salary  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-9" id="view">
                ' . $row1['currentSalary'] . ' baht
            </div>
        </div>
        <div class="row" style="padding-left:20px;padding-right:20px">
            <div class="col-md-3" id="view">
                <b> Expect Salary  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-9" id="view">
                ' . $row1['expectSalary'] . ' baht
            </div>
        </div>
        <div class="row" style="padding-left:20px;padding-right:20px">
            <div class="col-md-3" id="view">
                <b>Start Date  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-9" id="view">
                ' . $row1['startDate'] . '
            </div>
        </div>
        <div class="row" style="padding-left:20px;padding-bottom:20px;padding-right:20px">
            <div class="col-md-3" id="view">
                <b>Description  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-9" id="view">
                ' . nl2br($row1['description']) . '
            </div>
        </div>
    </div>
               </div>  <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>';



    echo $output;
}

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

if (isset($_POST["bId"])) {

    $output = '';
    $con = mysqli_connect('localhost', 'root', '', 'super');
    $sql1 = "SELECT * FROM (((job left JOIN industry on job.industryId=industry.industryId) LEFT JOIN contractdetail on job.contractDetailId=contractdetail.contractDetail) LEFT JOIN usertable on usertable.id = job.id) left join client on client.clientId = job.clientId WHERE jobId='" . $_POST["bId"] . "'";
    $res1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_array($res1);
    $sql3 = "SELECT name FROM job left JOIN usertable ON usertable.id = job.id WHERE usertable.id='$row1[id]'";
    $res3 = mysqli_query($con, $sql3);
    $row3 = mysqli_fetch_array($res3);
    $sql2 = "SELECT * FROM job right JOIN client ON client.clientId = job.clientId WHERE client.clientId = '$row1[clientId]' ";
    $res2 = mysqli_query($con, $sql2);
    $row2 = mysqli_fetch_array($res2);
    
    $output .= ' <div class="modal-header">
     <span style="color:#5757d1;font-weight:500;font-size:25px;">' . $row1['position'] . '</span>
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 </div> 
 <div class="modal-body">
     <div class="container">
        
        <div class="row" style="padding-top:20px;padding-left:20px;padding-right:20px">
            <div class="col-md-3 " id="view">
                <b>Key skill  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-9" id="view">
                ' . $row1['keySkill'] . '
            </div>
        </div>
        <div class="row" style="padding-left:20px;padding-right:20px">
            <div class="col-md-3" id="view">
                <b>Quantity  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-9" id="view">
                ' . $row1['quantity'] . '
            </div>
        </div>
        <div class="row" style="padding-left:20px;padding-right:20px">
            <div class="col-md-3" id="view">
                <b>Maximum budget  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-9" id="view">
                ' . $row1['maximumBudget'] . '  Bath
            </div>
        </div>
        <div class="row" style="padding-left:20px;padding-right:20px">
            <div class="col-md-3" id="view">
                <b>Job location  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-9" id="view">
                ' . $row1['jobLocation'] . '
            </div>
        </div>
        <div class="row" style="padding-left:20px;padding-right:20px">
            <div class="col-md-3" id="view">
                <b>Level  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-9" id="view">
                ' . $row1['level'] . '
            </div>
        </div>
        <div class="row" style="padding-left:20px;padding-right:20px">
            <div class="col-md-3" id="view">
                <b>Industry </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-9" id="view">
                ' . $row1['industry'] . '
            </div>
        </div>
        <div class="row" style="padding-left:20px;padding-right:20px">
            <div class="col-md-3" id="view">
                <b> Job Owner  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-9" id="view">
                ' . $row1['name'] . '
            </div>
        </div>
        <div class="row" style="padding-left:20px;padding-right:20px">
            <div class="col-md-3" id="view">
                <b>Contact Person  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-9" id="view">
                ' . $row1['contract'] . '
            </div>
        </div>
        <div class="row" style="padding-left:20px;padding-right:20px">
        <div class="col-md-3" id="view">
            <b>Contact email  </b><b style="float:right">  :</b>
        </div>
        <div class="col-md-9" id="view">
            ' . $row1['emailOfContact'] . '
        </div>
    </div>
        <div class="row" style="padding-left:20px;padding-right:20px">
            <div class="col-md-3" id="view">
                <b>Client  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-9" id="view">
                ' . $row1['clientName'] . '
            </div>
        </div>
        <div class="row" style="padding-left:20px;padding-bottom:20px;padding-right:20px">
            <div class="col-md-3" id="view">
                <b>Qualifications  </b><b style="float:right">  :</b>
            </div>
            <div class="col-md-9" id="view">
                ' . nl2br($row1['qualifications']) . '
            </div>
        </div>
    </div>
               </div>  <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>';



    echo $output;
}

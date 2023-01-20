<style>
    #view {
        font-size: 17px;
        padding-top: 10px;
    }

    b {
        font-weight: 500;
        font-size: 19px;
    }

    textarea::-webkit-scrollbar {
        width: 14.6px;
        height: 16px;
    }

    textarea::-webkit-scrollbar-thumb {
        height: 6px;
        border: 4px solid rgba(0, 0, 0, 0);
        background-clip: padding-box;
        border-radius: 12px;
        background-color: #909090;
        box-shadow: inset -1px -1px 0px rgba(0, 0, 0, 0.05), inset 1px 1px 0px rgba(0, 0, 0, 0.05);
    }

    textarea::-webkit-scrollbar-button {
        width: 0;
        height: 0;
        display: none;
    }

    textarea::-webkit-scrollbar-corner {
        background-color: transparent;
    }

    textarea::-webkit-scrollbar-thumb:hover {
        border-radius: 10px;

        background-color: #cccccc;
    }
</style>
<?php
$con = mysqli_connect('localhost', 'root', '', 'super');
if (isset($_POST["bId"])) {
    $xx = $_POST["bId"];
    $email = $_POST["email"];
    $uId = $_POST["uId"];
    $output = '';
    $sql1 = "SELECT *,usertable.id as uid FROM (((job left JOIN industry on job.industryId=industry.industryId) LEFT JOIN contractdetail on job.contractDetailId=contractdetail.contractDetailId) LEFT JOIN usertable on usertable.id = job.id) left join client on client.clientId = job.clientId WHERE jobId='" . $xx . "'";
    $res1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_array($res1);
    $sql2 = "SELECT * FROM job natural join jobstatus WHERE jobId='" . $xx . "'";
    $res2 = mysqli_query($con, $sql2);
    $row2 = mysqli_fetch_array($res2);
    $output .= '<div class="modal-header">
     <h4 class="modal-title">Edit ' . $row1['position'] . '</h4>
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 </div>  
     <form action="views/action/updatePosition.php" method="POST">
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="hidden" name="id123" id="id123" value="' . $xx . '">
                                    <input type="hidden" name="email" id="email" value="' . $email . '">
                                    <div class="form-group">
                                        <label>Position</label>
                                        <input type="text" class="form-control" name="pos" id="pos" value="' . $row1['position'] . '" >
                                    </div>
                                    <div class="form-group">
                                        <label>Key skill</label>
                                        <input type="text" class="form-control" name="key" id="key" value="' . $row1['keySkill'] . '">
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" class="form-control" name="quan" id="quan" value="' . $row1['quantity'] . '">
                                    </div>
                                    <div class="form-group">
                                        <label>Maximum Budget</label>
                                        <input type="number" class="form-control" name="maximum" id="maximum" value="' . $row1['maximumBudget'] . '">
                                    </div>
                                   
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Level</label>
                                        <input type="text" class="form-control" name="level" id="level" value="' . $row1['level'] . '" min="0">
                                    </div>
                                    <div class="form-group">
                                        <label>Duration</label>';

    $sql1 = "SELECT * FROM contractdetail";
    $rrr = mysqli_query($con, $sql1);

    $output .= ' <select name="dura" id="dura" class="form-control">
                                            <option value="' . $row1['contractDetailId'] . '">' . $row1['contractDetail'] . '</option>';

    while ($roo = mysqli_fetch_array($rrr)) {

        if ($roo['contractDetailId'] != $row1['contractDetailId']) {
            $output .= '  <option value="' . $roo['contractDetailId'] . '">' . $roo['contractDetail'] . '</option>';
        }
    }
    $output .= ' 
                                        </select>
                                    </div>
                                    <div class="form-group">
                                    <label>Project Industry</label>';


    $sql1 = "SELECT * FROM industry";
    $rrr = mysqli_query($con, $sql1);

    $output .= ' <select name="indus" id="indus" class="form-control">
                                            <option value="' . $row1['industryId'] . '">' . $row1['industry'] . '</option>';

    while ($roo = mysqli_fetch_array($rrr)) {

        if ($roo['industryId'] != $row1['industryId']) {
            $output .= '  <option value="' . $roo['industryId'] . '">' . $roo['industry'] . '</option>';
        }
    }
    $output .= ' </select>
                                    </div>
                                    
                                    <div class="form-group">
                            <label>Reponsible Admin</label>';


    $sql1 = "SELECT * FROM usertable where userStatus=1 AND id='$uId'";
    $rrr = mysqli_query($con, $sql1);

    $output .= ' <select name="admin13" id="admin13" class="form-control">
                                                                    <option value="' . $row1['uid'] . '">' . $row1['name'] . '</option>';

    while ($roo = mysqli_fetch_array($rrr)) {

        if ($roo['id'] != $row1['uid']) {
            $output .= '  <option value="' . $roo['id'] . '">' . $roo['name'] . '</option>';
        }
    }
    $output .= '
                            </select>
                        </div>
                                   
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                <label>Client</label>';

$sql1 = "SELECT * FROM client";
$rrr = mysqli_query($con, $sql1);

$output .=  ' <select name="client" id="client" class="form-control" >
                                <option value="' . $row1['clientId'] . '">' . $row1['clientName'] . '</option>';

while ($roo = mysqli_fetch_array($rrr)) {

if ($roo['clientId'] != $row1['clientId']) {
$output .= '<option value="' . $roo['clientId'] . '">' . $roo['clientName'] . '</option>';
}
}

$output .= '</select>
                            </div>
                                   
                                    <div class="form-group">
                                        <label>Contact Person</label>
                                        <input type="text" class="form-control" name="contract" id="contract" cols="30" rows="1" value="' . $row1['contract'] . '">
                                    </div>
                                    <div class="form-group">
                                    <label>Contact email</label>
                                    <input type="email" class="form-control" name="Jemail" id="Jemail" value="' . $row1['emailOfContact'] . '">
                                </div>
                                <div class="form-group">
                                    <label>Job Status</label>';

    $sql1 = "SELECT * FROM jobstatus";
    $rrr = mysqli_query($con, $sql1);

    $output .= ' <select name="status1" id="status1" class="form-control">
                                    <option value="' . $row2['jobStatusId'] . '">' . $row2['jobStatus'] . '</option>';

    while ($roo = mysqli_fetch_array($rrr)) {

        if ($roo['jobStatusId'] != $row2['jobStatusId']) {
            $output .= '  <option value="' . $roo['jobStatusId'] . '">' . $roo['jobStatus'] . '</option>';
        }
    }
    $output .= ' 
                                </select>
                            </div>
                            </div> 
                            <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                <div class="form-group">
                                <label>Job location</label>
                                <input type="text" class="form-control" name="joblocat" id="joblocat" value="' . $row1['jobLocation'] . ' " min="0">
                            </div>
                                </div>
                                <div class="col-md-8">
                                <div class="form-group">
                                <label>Qualifications</label>
                                <textarea class="form-control" name="quali" id="quali" cols="30" rows="3">' . $row1['qualifications'] . '</textarea>
                            </div>
                                </div>
                            </div>
                        </div>
                           
                            
                        </div>
                        
                    </div>
                    
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" style="background-color:#5757d1;border-radius: 5px;color:#ffffff" class="btn" name="updatePosition2" value="Save">
                    </div>
                </form>';



    echo $output;
}

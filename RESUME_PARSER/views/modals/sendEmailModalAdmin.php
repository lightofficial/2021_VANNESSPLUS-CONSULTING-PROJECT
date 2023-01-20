<?php require('../../function/connection.php');?>
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
</style>
<?php

if (isset($_POST["id"])) {
    $xx = $_POST["id"];
    $email = $_POST["email"];
    $jobId = $_POST["jobId"];
    $koi = "SELECT * FROM job WHERE jobId = $jobId";
    $tora = mysqli_query($con,$koi);
    $yip = mysqli_fetch_assoc($tora);
   
    $output = '';
    $con = mysqli_connect('localhost', 'root', '', 'super');

    $output .= ' <div class="modal-header">
    <h4 class="modal-title">Send email candidates</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<form action="views/action/menuAdmin.php" method="POST">
    <div class="modal-body"> 
    <input type="hidden" name="jobId" id="jobId" value="' . $jobId . '">
    <input type="hidden" name="email" id="email" value="' . $email . '">';
   
    $output .= '<input type="hidden" name="applyId" id="applyId" value="' . $xx . '">';
    $output .= 'send email to '.$yip['position'].' ?
  
    </div> 
   
    <div class="modal-footer">
        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
        <input type="submit" style="border-radius: 5px;color:#ffffff" class="btn btn-success" name="sendmail" value="Send">
    </div>
</form>';



    echo $output;
}

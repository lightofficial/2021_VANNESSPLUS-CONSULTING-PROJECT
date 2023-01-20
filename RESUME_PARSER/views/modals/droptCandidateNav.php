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

    #body::-webkit-scrollbar {
        width: 15.6px;
        height: 50px;
    }

    #body::-webkit-scrollbar-thumb {
        height: 6px;
        border: 4px solid rgba(0, 0, 0, 0);
        background-clip: padding-box;
        border-radius: 12px;
        background-color: #909090;
        box-shadow: inset -1px -1px 0px rgba(0, 0, 0, 0.05), inset 1px 1px 0px rgba(0, 0, 0, 0.05);
    }

    #body::-webkit-scrollbar-button {
        width: 0;
        height: 0;
        display: none;
    }

    #body::-webkit-scrollbar-corner {
        background-color: transparent;
    }

    #body::-webkit-scrollbar-thumb:hover {
        border-radius: 10px;

        background-color: #cccccc;
    }

    

    #header {

        background-color: #16a085;
        color: #fff;
        text-align: center;
    }

    /* .table-title {
        padding-bottom: 15px;
        background: #5757d1;
        color: black;
        padding: 16px 30px;
        margin: -20px -25px 10px;
        border-radius: 1px 1px 0 0;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
    } */

    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }

    .table-title .btn-group {
        float: right;
    }

    .table-title .btn {
        color: #fff;
        float: right;
        font-size: 13px;
        border: none;
        min-width: 50px;
        border-radius: 1px;
        border: none;
        outline: none !important;
        margin-left: 10px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
    }

    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }

    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }

    /* table.table tr th,
    table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    } */

    table.table tr th:first-child {
        width: auto;
    }

    table.table tr th:last-child {
        width: auto;
    }

    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }

    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }
    tr:hover {
        background-color: #f5f5f5;
        transform: scale(1.02);
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }

    #undodrop {
        border: none;
        background: #fff;
        color: #0275d8;
        font-size: 15px;
        outline: none;
        cursor: pointer;
    }

    #undodrop:hover {
        color:#909090;
    }

    #removedrop {
        border: none;
        background: #fff;
        color: #0275d8;
        font-size: 15px;
        outline: none;
        cursor: pointer;
    }

    #removedrop:hover {
        color: #909090;

    }
</style>
<?php

if (isset($_POST["jobId"])) {
    $stage = $_POST["stage"];
    $email = $_POST["email"];
    $jobId = $_POST["jobId"];
    $con = mysqli_connect('localhost', 'root', '', 'super');
    $s = "SELECT * FROM applyjob NATURAL JOIN candidate WHERE jobId='$jobId' AND candidateDrop='1' AND candidateStatus='$stage' ORDER BY dropDate";
    $r = mysqli_query($con, $s);
    $s2 = "SELECT * FROM candidatestatus WHERE candidateStatusId='$stage'";
    $r2 = mysqli_query($con, $s2);
    $row2 = mysqli_fetch_assoc($r2);
    $output = '';

    $output .= ' <div class="modal-header">
    <h4 class="modal-title">Drop list in '.$row2['candidateStatusName'].' stage</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<form action="views/action/menu.php" method="POST">
    <div class="modal-body" id="body"> 
    <input type="hidden" name="jobId" id="jobId" value="' . $jobId . '">
    <input type="hidden" name="email" id="email" value="' . $email . '">

            <div class="container-fluid" style="height: 440px;">


                <table class="table table-striped table-hover text-center">
                    <thead>
                        <tr id="header">

                            <th>Candidate Name</th>
                            <th>Drop Reason</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">';

    while ($row = mysqli_fetch_array($r)) {
        $string = str_replace(', ', '<br>', $row['dropReason']);
        $output .= '        
                            <tr>
                                <td>' . $row['candidateName'] . '</td>
                                <td>' . $string . '</td>
                                <td><button type="submit" name="undodrop" id="undodrop" value="' . $row['applyId'] . '"><i class="fas fa-sync-alt"></i></button>
                                <button type="submit" name="removedrop" id="removedrop" value="' . $row['applyId'] . '"><i class="fas fa-trash-alt"></i></button></td>
                            </tr>';
    }
    $output .= '</tbody>
                </table>

            </div>
    </div> 
   
    <div class="modal-footer">
        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
    </div>
</form>';



    echo $output;
}

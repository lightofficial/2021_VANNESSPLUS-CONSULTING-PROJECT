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
        cursor:context-menu;
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

if (isset($_POST["applyId"])) {
    $xx = $_POST["applyId"];
    $email =$_POST["email"];
    $jobId = $_POST["jobId"];
    $output = '';
    $con = mysqli_connect('localhost', 'root', '', 'super');
    $sql1 = "SELECT * FROM applyjob NATURAL JOIN candidate WHERE applyId='" . $_POST["applyId"] . "'";
    $res1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_array($res1);
    $sql2 = "SELECT * FROM dropreason";
    $res2 = mysqli_query($con, $sql2);
    $output .= '<div class="modal-header">
                    <h4 class="modal-title">Drop ' . $row1['candidateName'] . '</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>  
                <form action="views/action/dropCandidateNav.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id123" id="id123" value="' . $xx . '">
                        <input type="hidden" name="email" id="email" value="' . $email . '">
                        <input type="hidden" name="jobId" id="jobId" value="' . $jobId . '">';
                        $output .= '  <h5>Choose your drop reason ...</h5>
        
        <div class="form-group">';
    while ($row2 = mysqli_fetch_array($res2)) {
        $output .= '
        <label class="label">
        <input type="checkbox" class="label__checkbox" name="dropId[]" id="dropId[]" value="' . $row2['dropReason'] . '">
        <span class="label__text">
            <span class="label__check">
                <i class="fa fa-check icon"></i>
            </span>
        </span>
    </label>' . $row2['dropReason'] . '<br>';
    }
    $output .= '</div>
    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" style="border-radius: 5px;color:#ffffff"; class="btn btn-danger" name="dropCandidateNav" value="Drop">
                    </div>
                </form>';



    echo $output;
}

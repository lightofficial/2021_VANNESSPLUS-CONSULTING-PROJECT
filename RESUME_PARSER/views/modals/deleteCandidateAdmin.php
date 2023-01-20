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

if (isset($_POST["canId"])) {
    $xx = $_POST["canId"];
    $email =$_POST["email"];
    $output = '';
    $con = mysqli_connect('localhost', 'root', '', 'super');
    $sql1 = "SELECT * FROM candidate WHERE candidateId='" . $_POST["canId"] . "'";
    $res1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_array($res1);
    $output .= '<div class="modal-header">
                    <h4 class="modal-title">Delete ' . $row1['candidateName'] . '</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>  
                <form action="views/action/deleteCandidate1.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id123" id="id123" value="' . $xx . '">
                        <input type="hidden" name="email" id="email" value="' . $email . '">
                        '."Do you want to delete this candidate?".'
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" style=";border-radius: 5px;color:#ffffff" class="btn btn-danger" name="deletePosition2" value="Delete">
                    </div>
                </form>';



    echo $output;
}

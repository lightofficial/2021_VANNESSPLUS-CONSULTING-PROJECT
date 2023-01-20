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

if (isset($_POST["cId"])) {
    $xx = $_POST["cId"];
    $email = $_POST["email"];
    $output = '';
    
    $con = mysqli_connect('localhost', 'root', '', 'super');
    $sql1 = "SELECT * FROM client  WHERE clientId='$xx'";
    $res1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_array($res1);
    $output .= '<div class="modal-header">
     <h4 class="modal-title">Edit ' . $row1['clientName'] . '</h4>
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 </div>  
     <form action="views/action/updateClient.php" method="POST">
                    <div class="modal-body">
                        
                               
                                    <input type="hidden" name="id123" id="id123" value="' . $xx . '">
                                    <input type="hidden" name="email" id="email" value="' . $email . '">
                                    <div class="form-group">
                                        <label>Client Name</label>
                                        <input type="text" class="form-control" name="clientName" id="clientName" value="'. $row1['clientName'].'" >
                                    </div>
                                    <div class="form-group">
                                        <label>Locaiton</label>
                                        <input type="text" class="form-control" name="locate" id="locate" value="'. $row1['location'].'">
                                    </div>
                                    <div class="form-group">
                                    <label>Business type</label>
                                    <input type="text" class="form-control" name="business" id="business" value="'. $row1['businessType'].'">
                                    </div>
                                    <div class="form-group">
                                    <label>Email template</label>
                                    <select class="form-control" name="pattern" id="pattern" value="' . $row1['template'] . '" >
                                    <option value="' . $row1['template'] . '">template ' . $row1['template'] . '</option>';
                                    for($i=1;$i<=4;$i++){
                                        if ($i != $row1['template']) {
                                            $output .= '  <option value="' . $i . '"> template ' . $i . '</option>';
                                        }
                                    }
                                    $output .= '
                                    </select>
                                    </div>
                                   
                                
                                
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" style="background-color:#5757d1;border-radius: 5px;color:#ffffff" class="btn" name="updatePosition" value="Save">
                    </div>
                </form>';



    echo $output;
}


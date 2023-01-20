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

if (isset($_POST["canId"])) {
    $xx = $_POST["canId"];
    $email = $_POST["email"];
    $output = '';
    $con = mysqli_connect('localhost', 'root', '', 'super');
    $sql1 = "SELECT * FROM candidate WHERE candidateId='" . $_POST["canId"] . "'";
    $res1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_array($res1);
    $output .= '<div class="modal-header">
                    <h4 class="modal-title">Update ' . $row1['candidateName'] . '</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>  
                <form action="views/action/updateCandidate.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id123" id="id123" value="' . $xx . '">
                        <input type="hidden" name="email" id="email" value="' . $email . '">
                        <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                        <div class="form-group">
                            <label>Candidate Name</label>
                            <input type="text" class="form-control" name="canName" id="canName" value="' . $row1['candidateName'] . '" >
                        </div>
                    
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" class="form-control" name="num" id="num" pattern="[0]{1}[0-9]{9}" value="' . $row1['phoneNumber'] . '">
                        </div>
                      
                        </div>
                        <div class="col-md-4">
                    <div class="form-group">
                        <label>English Proficiency</label>
                        <input type="text" class="form-control" name="eng" id="eng" value="' . $row1['EnglishProficiency'] . '" >
                    </div>
                    <div class="form-group">
                    <label>Notice Period</label>
                    <input type="text" class="form-control" name="notice" id="notice" value="'. $row1['NoticePeriod'].'">

                </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                        <label>Current Salary</label>
                        <input type="number" class="form-control" name="salary" id="salary" min="0" value="' . $row1['currentSalary'] . '" >
                    </div>
                    <div class="form-group">
                    <label>Expect Salary</label>

                        <input type="number" class="form-control" name="expect" id="expect" min="0" value="' . $row1['expectSalary'] . '" >
                    </div>
                   
                        </div>
                       
                            
                                <div class="col-md-4">
                                <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email765" id="email765" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="' . $row1['candidateEmail'] . '">
                            </div>
                            <div class="form-group">
                            <label>Nationality</label>
                            <input type="text" class="form-control" name="nation" id="nation" value="' . $row1['nationnality'] . '" >
                        </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                            <label>Total Years of Experience</label>
                            <input type="text" class="form-control" name="total" id="total" value="' . $row1['TotalExperience'] . '" >
                        </div>
                        <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" class="form-control" name="date" id="date" value="'. $row1['startDate'].'">

                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                            <label>Major Skill</label>
                            <input type="text" class="form-control" name="major" id="major" value="' . $row1['MajorSkill'] . '" >
                        </div>
                        <div class="form-group">
                            <label>Secondary Skill</label>
                            <input type="text" class="form-control" name="second" id="second" value="' . $row1['SecondarySkill'] . '" >
                        </div>
                                </div>
                                <div class="col-md-12">
                                <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="dess" id="dess" cols="30" rows="4">' . $row1['description'] . '</textarea>
                            </div>
                                </div>
                            </div>
                            
                        
                        
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" style="background-color:#5757d1;border-radius: 5px;color:#ffffff" class="btn" name="updateCandidate2" value="Save">
                    </div>
                </form>';



    echo $output;
}

<?php require_once "function/controllerUserData.php"; ?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$time = time();
if ($email != false && $password != false) {
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if ($status == "verified") {
            if ($code != 0) {

                $update_otp = "UPDATE usertable SET code = '0' WHERE email = '$email'";
                $update_res = mysqli_query($con, $update_otp);
            }
        } else {
            header('Location: views/register/verification.php');
        }
    }
} else {
    header('Location: login.php');
}
$checkstatus=$fetch_info['userStatus'];
if($checkstatus==1){
    header("Location: jobAdmin.php");
    exit();
}
?>
<!DOCTYPE html>

<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="img/logo5.jpg">
    <title>Super Recruit | Candidate</title>
    <link rel="stylesheet" href="css/sty31.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../../js/sweetalert.min.js"></script>
    <?php include "library/script.php" ?>
    <?php include "library/boostrap.php" ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Style here !-->
    <link rel="stylesheet" href="css/candidate_style.css">
  


    

   
    <!-- <link id="bootstrap-css" href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link id="dropzone-css" href="assets/css/dropzone.css" rel="stylesheet">

    
    <link id="font-awesome-css" href="assets/css/font-awesome.min.css" rel="stylesheet">

    
   <link href="css/dropzone.css" rel="stylesheet"> -->
   
</head>

<body style="background:#E9E3D7">
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-head">
            <img class="img-profile rounded-circle" src="img/logo2.png" width="90" height="90" alt=""><br><br>
            <span><?php echo $fetch_info['name'] ?></span><br>
            <span><?php echo $fetch_info['email'] ?></span>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="home.php"><span class="fas fa-home"></span>
                        <span>Home</span></a>
                </li>
                <li>
                    <a href="client.php"><span class="fas fa-landmark"></span>
                        <span>Client</span></a>
                </li>
                <li>
                    <a href="job.php"><span class="fas fa-briefcase"></span>
                        <span>Jobs</span></a>
                </li>
                <li>
                    <a href="authorization.php"><span class="fas fa-users"></span>
                        <span>Authorization</span></a>
                </li>
                <li>
                    <a href="candidate.php" class="active"><span class="fas fa-user-plus"></span>
                        <span>Candidate</span></a>
                </li>
            </ul>
        </div>
        <div class="sidebar-logout">
            <ul>
                <li>
                    <a href="logout.php"><span class="fas fa-sign-out-alt"></span>
                        <span>Logout</span></a>
                </li>
            </ul>

        </div>
    </div>
    <div class="main-content">
        <header>
            <h4>
                <label for="nav-toggle">
                    <span class="fas fa-bars"></span>
                </label>
            </h4>
            <div class="client-w ml-auto">
                <span style="color: #5757d1;font-weight: 1000;">Super</span>
                <span style="color: #C80000;font-weight: 1000;"> Recruit</span>
            </div>
        </header>

        <main>
            <div id="myNav" class="overlay" style="background-color: #FCF7E4;">
               
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                <div class="overlay-content" id="viewSlide">

                </div>

            </div>
            <script>
                // function openNav() {
                //     document.getElementById("myNav").style.width = "80%";

                // }
                function openNav123(canId) {
                    var cId = canId;
                    var email = "<?php echo $email ?>";
                    console.log(cId);
                    $.ajax({
                        url: "candidatenav.php",
                        method: "post",
                        data: {
                            cId: cId,
                            email:email
                        },
                        success: function(data) {
                            $('#viewSlide').html(data);
                            jQuery.noConflict();
                            document.getElementById("myNav").style.width = "75%";
                        }
                    });
                };

                function closeNav() {
                    document.getElementById("myNav").style.width = "0%";
                    setTimeout(function() {
                        location.reload();
                    }, 800);


                }
            </script>
            <!-- Complete Form -->
            <div class="container-fluid">
                <span style="margin-left:50 px;margin-top:30px;font-size:20px;">Candidate</span>
                <a style="color:#5757d1;font-size:20px"><i class="fas fa-plus-circle" onclick="chooseAdd()"></i></a>
            </div>
            <script>
                function addCandidate() {
                    jQuery.noConflict();
                    $('#choosemodal').modal('hide')
                    setTimeout(function() {
                        $('#addCandidate').modal('show');
                    }, 300);
                }
            </script>
            <div class="container-fluid">
                <div class="table-wrapper">
                    <div class="table-title">
                        <span style="color: #fff;font-weight:500;font-size:25px">Candidate</span>
                    </div>
                    <table class="table table-striped table-hover table-responsive-lg" id="wtf1">
                        <thead>
                            <tr>
                                <th style="text-align:center">No.</th>
                                <th>Candidate Name</th>
                                <th style="text-align:center">Edit</th>
                                <th>Candidate Create Date</th>
                                <th style="text-align:center">Download</th>
                                <th style="text-align:center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            $sql = "SELECT * FROM candidate";
                            $re = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($re)) {

                            ?>
                                <tr>
                                    <td style="text-align:center"><?php echo ++$i; ?></td>
                                    <td><a id="job" onclick="view_datacan(<?php echo $row['candidateId']; ?>)"><?php echo $row['candidateName'] ?></td>
                                    <td style="text-align:center"><i id="gg" class="fas fa-edit" onclick="updateCandidate('<?php echo $row['candidateId'] ?>','<?php echo $email ?>')"></i></td>
                                    <td><?php echo $row['candidateCreateDate'] ?></td>
                                    <td style="text-align:center"><i id="gg" class="fas fa-file" onclick="openNav123('<?php echo $row['candidateId'] ?>')"></i></td>
                                    <td style="text-align:center"><i id="gg" class="fas fa-trash-alt" onclick="deleteCandidate('<?php echo $row['candidateId'] ?>','<?php echo $email ?>')"></i></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
           <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
           <!-- Upload Form -->
           <div class="container-fluid">
                <div class="table-wrapper">
                    <div class="table-title">
                        <span style="color: #fff;font-weight:500;font-size:25px">Candidate CV-PARSER </span>
                    </div>
                    
                    <table class="table table-striped table-hover table-responsive-lg" id="wtf2">
                        <thead>
                            <tr>
                                <th style="text-align:center">No.</th>
                                <th>Candidate Name</th>
                                <th style="text-align:center">Edit</th>
                                <th>Candidate ID</th>
                                <th style="text-align:center">Download</th>
                                <th style="text-align:center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            $sql = "SELECT * FROM parser_resume_data";
                            $connected = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($connected)) {
                            
                            ?>
                                <tr>
                                <td style="text-align:center"><?php echo ++$i; ?></td>
                                    <td><a id="job" onclick="view_datacan_upload(<?php echo $row['id']; ?>)"><?php echo $row['data_name_first'] ?></td>
                                    <td style="text-align:center"><i id="gg" class="fas fa-edit" onclick="updateCandidateUpload('<?php echo $row['id'] ?>','<?php echo $email ?>')"></i></td>
                                    <td><?php echo $row['id'] ?></td>
                                    <td style="text-align:center"><i id="gg" class="fas fa-file" onclick="openNav123('<?php echo $row['id'] ?>')"></i></td>
                                    <td style="text-align:center"><i id="gg" class="fas fa-trash-alt" onclick="deleteCandidateUpload('<?php echo $row['id'] ?>','<?php echo $email ?>')"></i></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
            <script>
                function view_datacan(xxx) {
                    var cId = xxx;

                    console.log(cId);

                    $.ajax({
                        url: "views/modals/viewCan.php",
                        method: "post",
                        data: {
                            cId: cId
                        },
                        success: function(data) {
                            $('#canDetail').html(data);
                            jQuery.noConflict();
                            $('#canModal').modal("show");


                        }
                    });

                };
            </script>

            <script>
                function view_datacan_upload(xxx) {
                    var cId = xxx;

                    console.log(cId);

                    $.ajax({
                        url: "views/modals/viewCan_Upload.php",
                        method: "post",
                        data: {
                            cId: cId
                        },
                        success: function(data) {
                            $('#canDetail').html(data);
                            jQuery.noConflict();
                            $('#canModal').modal("show");


                        }
                    });

                };
            </script>

            <script>
                $(document).ready(function() {
                    $('#wtf1').DataTable();
                });

                $(document).ready(function() {
                    $('#wtf2').DataTable();
                });
            </script>
            <script>
                function chooseAdd() {
                    jQuery.noConflict();
                    $('#choosemodal').modal('show');

                }

                function deleteCandidate(xxx, email) {
                    var canId = xxx;
                    var email = email;
                    console.log(canId);
                    $.ajax({
                        url: "views/modals/deleteCandidate.php",
                        method: "post",
                        data: {
                            canId: canId,
                            email: email
                        },
                        success: function(data) {
                            $('#deleteCandidateModal').html(data);
                            jQuery.noConflict();
                            $('#deleteModal').modal("show");
                        }
                    });
                };

                function deleteCandidateUpload(xxx, email) {
                    var canIdUpload = xxx;
                    var email = email;
                    console.log(canIdUpload);
                    $.ajax({
                        url: "views/modals/deleteCandidateUpload.php",
                        method: "post",
                        data: {
                            canIdUpload: canIdUpload,
                            email: email
                        },
                        success: function(data) {
                            $('#deleteCandidateModal').html(data);
                            jQuery.noConflict();
                            $('#deleteModal').modal("show");
                        }
                    });
                };

                function updateCandidate(xxx, email) {
                    var canId = xxx;
                    var email = email;
                    console.log(canId);
                    $.ajax({
                        url: "views/modals/editCandidate.php",
                        method: "post",
                        data: {
                            canId: canId,
                            email: email
                        },
                        success: function(data) {
                            $('#updateCandidateModal').html(data);
                            jQuery.noConflict();
                            $('#updateModal').modal("show");
                        }
                    });

                };

                function updateCandidateUpload(xxx, email) {
                    var canId = xxx;
                    var email = email;
                    console.log(canId);
                    $.ajax({
                        url: "views/modals/editCandidate_Upload.php",
                        method: "post",
                        data: {
                            canId: canId,
                            email: email
                        },
                        success: function(data) {
                            $('#updateCandidateModal').html(data);
                            jQuery.noConflict();
                            $('#updateModal').modal("show");
                        }
                    });

                };

                function upload() {

                    jQuery.noConflict();
                    $('#choosemodal').modal('hide')
                    setTimeout(function() {
                        $('#upload').modal('show');
                    }, 300);

                }
            </script>
            <div id="canModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:1000px">
                    <div class="modal-content" id="canDetail">

                    </div>
                </div>
            </div>
            <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width:500px">
                    <div class="modal-content" id="deleteCandidateModal">

                    </div>
                </div>
            </div>
            <div id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 960px;">
                    <div class="modal-content" id="updateCandidateModal">

                    </div>
                </div>
            </div>
            <div id="choosemodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 670px;">
                    <div class="modal-content" id="choosemodaldetail">
                        <div class="modal-header">
                            <h4 class="modal-title" style="border-radius: none;">Create Job</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>

                        <div class="modal-body">
                            <div class="container" style="text-align: center;">
                                <div class="row">

                                    <div class="col-md-6 ">
                                        <button class="btn" id="kako" onclick="addCandidate()" style="margin-left: 10px;">
                                            <span class="btn__inner">
                                                <span class="btn__slide"></span>

                                                <span class="btn__content">Complete a Form</span>
                                            </span>
                                        </button>
                                    </div>

                                    <div class="col-md-6 ">
                                        <button class="btn " id="kako" onclick="window.location.href='uploadCandidate.php'" style="margin-left: 20px;">
                                            <span class="btn__inner">
                                                <span class="btn__slide"></span>
                                                <span class="btn__content">&nbsp;&nbsp;&nbsp;&emsp;Import file&emsp;&nbsp;&nbsp;&nbsp;</span>
                                            </span>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- <div id="upload" class="modal fade" style="margin:auto">
                <div class="modal-dialog" style="max-width:500px">
                    <div class="modal-content" id="upload">
                        <div class="modal-header">
                            <h4 class="modal-title">Upload file</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <form action="views/action/uploadCandidate.php" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="hidden" name="email" id="email" value="<?php echo $email ?>">
                                <input type="file" name="uploadfile" id="uploadfile" multiple> 
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" style="background-color:#5757d1;border-radius: 5px;color:#ffffff" class="btn" name="uploadcan" value="Upload">
                            </div>
                        </form>
                    </div>
                </div>
            </div> --> 
           

            <div id="addCandidate" class="modal fade" style="margin:auto">
                <div class="modal-dialog" style="max-width: 537px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Create Candidate</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.reload();">&times;</button>
                        </div>
                        <form action="views/action/addCandidate.php" method="POST" id="addCandidateForm">
                            <div class="modal-body">
                                <input type="hidden" name="email" id="email" value="<?php echo $email ?>">
                                <input type="hidden" name="id" id="id" value="<?php echo $fetch_info['id'] ?>">
                                <div class="tab">
                                    <div class="form-group">
                                        <label>Candidate Name*</label>
                                        <input type="text" class="form-control" name="cname" id="cname">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="tel" class="form-control" name="num" id="num" pattern="[0]{1}[0-9]{9}">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email765" id="email765">
                                    </div>
                                    <div class="form-group">
                                        <label>Nationality </label>
                                        <input type="text" class="form-control" name="nation" id="nation">
                                    </div>
                                </div>

                                <div class="tab">
                                    <div class="form-group">
                                        <label>English Proficiency</label>
                                        <input type="text" class="form-control" name="eng" id="eng">
                                    </div>

                                    <div class="form-group">
                                        <label>Current Salary</label>
                                        <input type="number" class="form-control" name="salary" id="salary" min="0" placeholder="E.g.20000">
                                    </div>
                                    <div class="form-group">
                                        <label>Expect Salary</label>
                                        <input type="number" class="form-control" name="expect" id="expect" min="0" placeholder="E.g.20000">
                                    </div>
                                    <div class="form-group">
                                        <label>Total Years of Experience</label>
                                        <input type="text" class="form-control" name="total" id="total">
                                    </div>
                                </div>
                                <?php date_default_timezone_set("Asia/Bangkok");
                                $time = date("Y-m-d"); ?>
                                <div class="tab">
                                    <div class="form-group">
                                        <label>Notice Period</label>
                                        <input type="text" class="form-control" name="notice" id="notice">
                                    </div>
                                    <div class="form-group">
                                        <label>Major Skill</label>
                                        <input type="text" class="form-control" name="major" id="major">
                                    </div>
                                    <div class="form-group">
                                        <label>Secondary Skill</label>
                                        <input type="text" class="form-control" name="second" id="second">
                                    </div>
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input type="date" class="form-control" name="date" id="date" value="<?= date('Y-m-d', time()); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea rows="6" cols="55" name="desc" id="desc"></textarea>
                                    </div>
                                </div>





                                <div style="text-align:center;margin-top:40px;">
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>

                                </div>


                            </div>

                            <div class="modal-footer">

                                <div style="float:right;">
                                    <button type="button" class="btn" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" class="btn" id="nextBtn" class="btn" onclick="nextPrev(1)">Next</button>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php include('views/notification/noti.php') ?>
        </main>

    </div>
    <!-- Footer -->
    <footer style="background: #E9E3D7;">
        <div class="container-fluid" style="margin-top: 10px;">
            <p style="color: #000000;">Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> Vanness Plus Consulting Co., Ltd.
            </p>
            <?php //<i class="fa fa-copyright" aria-hidden="true"></i><span style="color: #80888C"> Vanness plus consulting co. ltd</span>
            ?>
        </div>
    </footer>

    <script>
        var currentTab = 0;
        showTab(currentTab);

        function showTab(n) {

            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";

            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";

            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }

            fixStepIndicator(n)
        }

        function nextPrev(n) {

            var x = document.getElementsByClassName("tab");

            if (n == 1 && !validateForm()) return false;

            x[currentTab].style.display = "none";

            currentTab = currentTab + n;

            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("addCandidateForm").submit();
                return false;
            }

            showTab(currentTab);
        }

        function validateForm() {

            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[0].getElementsByTagName("input");
            var phoneno = /^\(?([0]{1})\)?[-. ]?([0-9]{5})[-. ]?([0-9]{4})$/;

            if (y[0].value == "") {

                y[0].className += " invalid";
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Please enter your name',
                    button: "OK"
                })
                valid = false;
            } else if (!y[1].value == "") {

                if (!y[1].value.match(phoneno)) {
                    y[1].className += " invalid";
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Please enter a valid phone number',
                        button: "OK"
                    })
                    valid = false;
                }
            } else if (!y[2].value == "") {

                if (!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(y[2].value)) {
                    y[2].className += " invalid";
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Please enter a valid email',
                        button: "OK"
                    })
                    valid = false;
                }


            }




            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid;
        }

        function fixStepIndicator(n) {

            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }

            x[n].className += " active";
        }
    </script>
    <script type="text/javascript" language="javascript" src="function/auto.js"></script>
    <script src="assets/js/dropzone.min.js"></script>
    <script src="assets/js/scripts.js"></script>

</body>

</html>
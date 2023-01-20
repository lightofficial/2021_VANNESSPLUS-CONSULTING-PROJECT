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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="img/logo5.jpg">
    <title>Super Recruit | Job</title>
    <link rel="stylesheet" href="css/sty31.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php include "library/script.php" ?>
    <?php include "library/boostrap.php" ?>
    <style>
        body {
            overflow-x: hidden;
        }

        table,
        tr,
        td {
            border: none;

            overflow-x: auto;
        }

        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            margin: 30px 0;
            border-radius: 1px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
        }

        #header {

            background-color: #16a085;
            color: #fff;
            text-align: center;
        }

        .table-title {
            padding-bottom: 15px;
            /* background: linear-gradient(40deg, #5D80A8, #E9E3D7) !important; */
            background: #5757d1;
            color: black;
            padding: 16px 30px;
            margin: -20px -25px 10px;
            border-radius: 1px 1px 0 0;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
        }

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

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

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

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }

        tr:hover {
            background-color: #f5f5f5;
            transform: scale(1.02);
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
        }

        table.table td a:hover {
            color: #2196F3;
        }

        tr {
            transition: all .2s ease-in;
            cursor: pointer;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #F44336;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table .avatar {
            border-radius: 1px;
            vertical-align: middle;
            margin-right: 10px;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 1px !important;
            text-align: center;
            padding: 0 6px;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a,
        .pagination li.active a.page-link {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }

        /* Custom checkbox */


        .modal .modal-dialog {

            max-width: 1000px;
        }

        .modal #choosemodaldetail {
            border-radius: 15px;
        }

        .modal #upload {

            max-width: 500px;
        }

        .modal-footer #upload {
            border-radius: 15px;

        }

        .modal .modal-header,
        .modal .modal-body,
        .modal .modal-footer {
            padding: 20px 30px;

        }

        .modal .modal-content {
            border-radius: 1px;
        }

        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 1px 1px;
        }

        .modal .modal-title {
            display: inline-block;
        }

        .modal .form-control {
            text-align: left;
            border-radius: 1px;
            box-shadow: none;
            border-color: #dddddd;
        }

        .modal textarea.form-control {
            text-align: left;
            resize: vertical;
        }

        .modal .btn {
            border-radius: 1px;
            min-width: 100px;
        }

        .modal form label {
            font-weight: normal;
        }

        table::-webkit-scrollbar {
            width: 14.6px;
            height: 16px;
        }

        table::-webkit-scrollbar-thumb {
            height: 6px;
            border: 4px solid rgba(0, 0, 0, 0);
            background-clip: padding-box;
            border-radius: 12px;
            background-color: #909090;
            box-shadow: inset -1px -1px 0px rgba(0, 0, 0, 0.05), inset 1px 1px 0px rgba(0, 0, 0, 0.05);
        }

        table::-webkit-scrollbar-button {
            width: 0;
            height: 0;
            display: none;
        }

        table::-webkit-scrollbar-corner {
            background-color: transparent;
        }

        table::-webkit-scrollbar-thumb:hover {
            border-radius: 10px;

            background-color: #cccccc;
        }

        body::-webkit-scrollbar {
            width: 15.6px;
            height: 18px;
        }

        body::-webkit-scrollbar-thumb {
            height: 6px;
            border: 4px solid rgba(0, 0, 0, 0);
            background-clip: padding-box;
            border-radius: 12px;
            background-color: #909090;
            box-shadow: inset -1px -1px 0px rgba(0, 0, 0, 0.05), inset 1px 1px 0px rgba(0, 0, 0, 0.05);
        }

        body::-webkit-scrollbar-button {
            width: 0;
            height: 0;
            display: none;
        }

        body::-webkit-scrollbar-corner {
            background-color: transparent;
        }

        body::-webkit-scrollbar-thumb:hover {
            border-radius: 10px;

            background-color: #cccccc;
        }

        .modal-body::-webkit-scrollbar {
            width: 15.6px;
            height: 18px;
        }

        .modal-body::-webkit-scrollbar-thumb {
            height: 6px;
            border: 4px solid rgba(0, 0, 0, 0);
            background-clip: padding-box;
            border-radius: 12px;
            background-color: #909090;
            box-shadow: inset -1px -1px 0px rgba(0, 0, 0, 0.05), inset 1px 1px 0px rgba(0, 0, 0, 0.05);
        }

        .modal-body::-webkit-scrollbar-button {
            width: 0;
            height: 0;
            display: none;
        }

        .modal-body::-webkit-scrollbar-corner {
            background-color: transparent;
        }

        .modal-body::-webkit-scrollbar-thumb:hover {
            border-radius: 10px;

            background-color: #cccccc;
        }

        #job:hover,
        #status:hover {
            color: #C80000;
        }

        #gg {
            color: #909090;
            font-size: 15px;
        }

        #gg:hover {
            color: #C80000;
        }

        .modal-body {
            max-height: 568px;
            overflow: hidden;
            overflow-y: scroll;
        }

        .overlay {
            height: 90%;
            width: 0;
            position: fixed;
            z-index: 1;
            right: 0;
            top: 70;
            background-color: #fff;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 30px 0px 0px 30px;
            overflow-x: hidden;
            transition: 0.5s;
            overflow-y: hidden;

        }

        /* Position the content inside the overlay */
        .overlay-content {
            /* position: relative;
            top: 25%;
            width: 100%;
            text-align: center; */
            margin-top: 30px;
            /* 30px top margin to avoid conflict with the close button on smaller screens */
        }

        /* .overlay a {
            padding: 8px;
            text-decoration: none;
            font-size: 36px;
            color: #000;
            display: block;
            transition: 0.3s;
        } */

        .overlay a:hover,
        .overlay a:focus {
            color: #f1f1f1;
            text-decoration: none;
        }

        .overlay .closebtn {
            position: absolute;
            top: 20px;
            right: 45px;
            font-size: 30px;
            color: #000;
        }

        @media screen and (max-height: 450px) {
            .overlay a {
                font-size: 20px
            }

            .overlay .closebtn {
                top: 15px;
                right: 35px;
            }
        }

        #ji {
            color: gray;
        }

        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        .alert {
            background: #fff;
            padding: 20px 35px;
            min-width: 420px;
            position: absolute;
            right: 30;
            top: 85px;
            border-radius: 4px;
            z-index: 1500;
            overflow: hidden;
            opacity: 0;
            pointer-events: none;
        }

        .alert.showAlert {
            opacity: 1;
            pointer-events: auto;
        }

        .alert.show {
            animation: show_slide 1s ease forwards;
        }

        @keyframes show_slide {
            0% {
                transform: translateX(100%);
            }

            40% {
                transform: translateX(-10%);
            }

            80% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-10px);
            }
        }

        .alert.hide {
            animation: hide_slide 1s ease forwards;
        }

        @keyframes hide_slide {
            0% {
                transform: translateX(-10px);
            }

            40% {
                transform: translateX(0%);
            }

            80% {
                transform: translateX(-10%);
            }

            100% {
                transform: translateX(110%);
            }
        }

        .alert .fa-check-circle {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #5cb85c;
            font-size: 25px;
        }

        .alert .fa-times-circle {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #d9534f;
            font-size: 25px;
        }

        .alert .msg {
            padding: 0 20px;
            font-size: 16px;
            color: #6E6E6E;
        }

        .alert .close-btn {
            position: absolute;
            right: 0px;
            top: 50%;
            transform: translateY(-50%);
            background: #fff;
            padding: 20px 18px;
            cursor: pointer;
        }

        .alert .close-btn:hover {
            background: #fff;
        }

        .alert .close-btn .fas {

            color: #6E6E6E;
            font-size: 20px;
            line-height: 40px;
        }

        @media only screen and (max-width: 560px) {
            .alert {
                right: 15px;
                padding: 20px 35px;
                min-width: 70px;
                top: 70px;

            }

            .alert .fa-check-circle {

                font-size: 22px;
            }

            .alert .fa-times-circle {

                font-size: 22px;
            }

            .alert .msg {

                font-size: 15px;

            }

            .alert .close-btn .fas {


                font-size: 16px;

            }

            #kako {
                font-size: 14px;
            }
        }

        @media only screen and (max-width: 768px) {
            .alert {
                right: 15px;
                padding: 20px 35px;
                min-width: 70px;
                top: 70px;

            }

            .alert .fa-check-circle {

                font-size: 22px;
            }

            .alert .fa-times-circle {

                font-size: 22px;
            }

            .alert .msg {

                font-size: 15px;

            }

            .alert .close-btn .fas {


                font-size: 16px;

            }

            #kako .btn-content {
                font-size: 10px;
            }
        }



        #kako {
            /* Clean style */
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            border: none;
            background: none;
            padding: 0;
            color: var(--button-text-color);
            cursor: pointer;
            height: 200px;

            --button-text-color: var(--background-color);
            --button-text-color-hover: var(--button-background-color);
            --border-color: #7d8082;
            --button-background-color: #ece8e1;
            --highlight-color: #ff4655;
            --button-inner-border-color: transparent;
            --button-bits-color: var(--background-color);
            --button-bits-color-hover: var(--button-background-color);

            position: relative;
            padding: 8px;
            margin-bottom: 20px;

            font-weight: bold;
            font-size: 17px;
            transition: all 0.15s ease;
        }

        #kako::before,
        #kako::after {
            content: "";
            display: block;
            position: absolute;
            right: 0;
            left: 0;
            height: calc(50% - 5px);
            border: 1px solid var(--border-color);
            transition: all 0.15s ease;
        }

        #kako::before {
            top: 0;
            border-bottom-width: 0;
        }

        #kako::after {
            bottom: 0;
            border-top-width: 0;
        }

        #kako:active,
        #kako:focus {
            outline: none;
        }

        #kako:active::before,
        #kako:active::after {
            right: 3px;
            left: 3px;
        }

        #kako:active::before {
            top: 3px;
        }

        .btn:active::after {
            bottom: 3px;
        }

        .btn__inner {
            position: relative;
            display: block;
            padding: 80px 40px;
            background-color: #ece8e1;
            overflow: hidden;
            box-shadow: inset 0px 0px 0px 1px var(--button-inner-border-color);
        }

        .btn__inner::before {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 2px;
            height: 2px;
            background-color: var(--button-bits-color);
        }

        .btn__inner::after {
            content: "";
            display: block;
            position: absolute;
            right: 0;
            bottom: 0;
            width: 4px;
            height: 4px;
            background-color: var(--button-bits-color);
            transition: all 0.5s ease;
        }

        .btn__slide {
            display: block;
            position: absolute;
            top: 0;
            bottom: -10px;
            left: -25px;
            width: 0;
            background-color: var(--highlight-color);
            transform: skew(-15deg);
            transition: all 0.5s ease;
        }

        .btn__content {
            position: relative;
        }

        #kako:hover {
            color: var(--button-text-color-hover);
        }

        #kako:hover .btn__slide {
            width: calc(100% + 45px);
        }

        #kako:hover .btn__inner::after {
            background-color: var(--button-bits-color-hover);
        }
    </style>
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
                    <a href="job.php" class="active"><span class="fas fa-briefcase"></span>
                        <span>Jobs</span></a>
                </li>
                <li>
                    <a href="authorization.php"><span class="fas fa-users"></span>
                        <span>Authorization</span></a>
                </li>
                <li>
                    <a href="candidate.php"><span class="fas fa-user-plus"></span>
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


            <!-- <script>
                // function openNav() {
                //     document.getElementById("myNav").style.width = "80%";

                // }
                function openNav(jobId) {
                    var jId = jobId;
                    console.log(jId);
                    $.ajax({
                        url: "nav.php",
                        method: "post",
                        data: {
                            jId: jId
                        },
                        success: function(data) {
                            $('#body').html(data);
                             jQuery.noConflict();
                             
                            window.location.href = 'nav.php';
                        }
                    });
                };

                function closeNav() {
                    document.getElementById("myNav").style.width = "0%";
                    setTimeout(function() {
                        location.reload();
                    }, 800);


                }
            </script> -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <span style="margin-left:50px;margin-top:30px;font-size:20px">Job</span>
                        <a style="color:#5757d1;font-size:20px"><i class="fas fa-plus-circle" onclick="chooseAdd()"></i></a><br>


                    </div>


                </div>
            </div>


            <div class="container-fluid">
                <div class="table-wrapper">
                    <div class="table-title">
                        <span style="color: #fff;font-weight:500;font-size:25px">Job </span>
                    </div>
                    <table class="table table-striped table-hover table-responsive-lg" id="wtf1">
                        <thead>
                            <tr>
                                <th style="text-align:center">No.</th>
                                <th>Position</th>
                                <th></th>
                                <!-- <th>Key skills</th> -->
                                <th style="text-align: center;">Vacancy/Quantity</th>
                                <th>Job location</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Create date</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            $sql = "SELECT * FROM job natural join jobstatus order by jobId";
                            $re = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($re)) {

                            ?>
                                <tr>
                                    <td style="text-align:center"><?php echo ++$i; ?></td>
                                    <td><a id="job" onclick="view_data(<?php echo $row['jobId']; ?>)"><?php echo $row['position'] ?></td>
                                    <td><i id="gg" class="fas fa-edit" onclick="updatePosition('<?php echo $row['jobId'] ?>','<?php echo $email ?>')"></i></td>
                                    <!-- <td><?php echo $row['keySkill'] ?></td> -->
                                    <td style="text-align: center;"><?php echo $row['quantity'] ?></td>
                                    <td><?php echo $row['jobLocation'] ?></td>
                                    <td style="text-align: center;"><a id="status" onclick="changestatus('<?php echo $row['jobStatusId']; ?>','<?php echo $row['jobId']; ?>')"><?php echo $row['jobStatus'] ?></a></td>
                                    <td style="text-align: center;"><?php echo $row['jobCreateDate'] ?></td>
                                    <td><i id="gg" class="fas fa-user-plus" onClick="window.location='nav.php?var=<?php echo $row['jobId'] ?>'"></i></td>
                                    <td><i id="gg" class="fas fa-trash-alt" onclick="deletePosition('<?php echo $row['jobId'] ?>','<?php echo $email ?>')"></i></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#wtf1').DataTable();
                });
            </script>

            <script>
                function deletePosition(xxx, email) {
                    var jobId = xxx;
                    var email = email;
                    console.log(jobId);
                    $.ajax({
                        url: "views/modals/deleteJob.php",
                        method: "post",
                        data: {
                            jobId: jobId,
                            email: email
                        },
                        success: function(data) {
                            $('#deleteJobDetail').html(data);
                            jQuery.noConflict();
                            $('#deleteModal').modal("show");
                        }
                    });

                };
            </script>

            <script>
                function updatePosition(xxx, email) {
                    var bId = xxx;
                    var email = email;
                    console.log(email);
                    $.ajax({
                        url: "views/modals/editJob.php",
                        method: "post",
                        data: {
                            bId: bId,
                            email: email
                        },
                        success: function(data) {
                            $('#editModaldetail').html(data);
                            jQuery.noConflict();
                            $('#editModal').modal("show");
                        }
                    });

                };
            </script>
            <script>
                function view_data(xxx) {
                    var bId = xxx;

                    console.log(bId);

                    $.ajax({
                        url: "views/modals/view.php",
                        method: "post",
                        data: {
                            bId: bId
                        },
                        success: function(data) {
                            $('#bill_detail').html(data);
                            jQuery.noConflict();
                            $('#dataModal').modal("show");


                        }
                    });

                };
            </script>
            <script>
                function changestatus(qq, ww) {
                    jQuery.noConflict();
                    console.log(qq);
                    console.log(ww);
                    $('#changestatus').modal('show');
                    $('#birth').val(qq);
                    $('#wut').val(ww);
                }

                function chooseAdd() {
                    jQuery.noConflict();
                    $('#choosemodal').modal('show');

                }

                function addJob() {
                    jQuery.noConflict();
                    $('#choosemodal').modal('hide')
                    setTimeout(function() {
                        $('#addJob').modal('show');
                    }, 300);


                }

                function upload() {

                    jQuery.noConflict();
                    $('#choosemodal').modal('hide')
                    setTimeout(function() {
                        $('#upload').modal('show');
                    }, 300);

                }

                function viewpos() {
                    jQuery.noConflict();
                    $('#pos123').modal('show');
                }
            </script>
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
                                        <button class="btn" id="kako" onclick="addJob()" style="margin-left: 10px;">
                                            <span class="btn__inner">
                                                <span class="btn__slide"></span>

                                                <span class="btn__content">Complete a Form</span>
                                            </span>
                                        </button>
                                    </div>

                                    <div class="col-md-6 ">
                                        <button class="btn " id="kako" onclick="upload()" style="margin-left: 20px;">
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
            
            <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width:500px">
                    <div class="modal-content" id="deleteJobDetail">

                    </div>
                </div>
            </div>

            <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" id="editModaldetail">

                    </div>
                </div>
            </div>

            <div id="dataModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" id="bill_detail">

                    </div>
                </div>
            </div>
            <div id="addJob" class="modal fade" style="margin:auto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Create Job</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <form action="views/action/addJob.php" method="POST">
                            <div class="modal-body" id="addjobmodal">
                                <input type="hidden" name="id" id="id" value="<?php echo $fetch_info['id'] ?>">
                                <div class="container-fluid">
                                    <div class="row ">
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label>Position*</label>
                                                <input type="hidden" name="email" id="email" value="<?php echo $email ?>">
                                                <input type="text" class="form-control " name="pos" id="pos" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Key skills</label>
                                                <input type="text" class="form-control" name="kskill" id="kskill">
                                            </div>
                                            <div class="form-group">
                                                <label>Quantity</label>
                                                <input type="number" class="form-control" name="quantity" id="quantity">
                                            </div>
                                            <div class="form-group">
                                                <label>Maximum budget (Bath)</label>
                                                <input type="number" class="form-control" name="maxi" id="maxi">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Level / Exp</label>
                                                <input type="text" class="form-control" name="level" id="level">
                                            </div>
                                            <div class="form-group">
                                                <label>Duration</label>
                                                <?php
                                                $sql1 = "SELECT * FROM contractdetail";
                                                $rrr = mysqli_query($con, $sql1);
                                                ?>
                                                <select name="contractdetail" id="contractdetail" class="form-control">
                                                    <option value=null>Select duration</option>
                                                    <?php
                                                    while ($roo = mysqli_fetch_array($rrr)) {
                                                    ?>
                                                        <option value="<?php echo $roo['contractDetailId']; ?>"><?php echo $roo['contractDetail']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Project Industry</label>
                                                <?php
                                                $sql1 = "SELECT * FROM industry";
                                                $rrr = mysqli_query($con, $sql1);
                                                ?>
                                                <select name="industry" id="industry" class="form-control">
                                                    <option value=null>Select industry</option>
                                                    <?php
                                                    while ($roo = mysqli_fetch_array($rrr)) {
                                                    ?>
                                                        <option value="<?php echo $roo['industryId']; ?>"><?php echo $roo['industry']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Reponsible Admin</label>
                                                <?php

                                                $sql1 = "SELECT * FROM usertable where userStatus=1 ";
                                                $rrr = mysqli_query($con, $sql1);
                                                ?>
                                                <select name="admin" id="admin" class="form-control">
                                                    <option value=null>Select admin</option>

                                                    <?php
                                                    while ($roo = mysqli_fetch_array($rrr)) {
                                                    ?>
                                                        <option value="<?php echo $roo['id']; ?>"><?php echo $roo['name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Client</label>
                                                <?php
                                                $sql1 = "SELECT * FROM client";
                                                $rrr = mysqli_query($con, $sql1);
                                                ?>
                                                <select name="client" id="client" class="form-control" required>
                                                    <option value=null>Select client</option>
                                                    <?php
                                                    while ($roo = mysqli_fetch_array($rrr)) {
                                                    ?>
                                                        <option value="<?php echo $roo['clientId']; ?>"><?php echo $roo['clientName']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Contact Person</label>
                                                <input type="text" class="form-control" name="cont" id="cont" required>

                                            </div>
                                            <div class="form-group">
                                                <label>Contact email</label>
                                                <input type="email" class="form-control" name="Jemail" id="Jemail" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Job Status</label>
                                                <?php
                                                $sql1 = "SELECT * FROM jobstatus";
                                                $rrr = mysqli_query($con, $sql1);
                                                ?>
                                                <select name="jobStatusId" id="jobStatusId" class="form-control">

                                                    <?php
                                                    while ($roo = mysqli_fetch_array($rrr)) {
                                                    ?>
                                                        <option value="<?php echo $roo['jobStatusId']; ?>"><?php echo $roo['jobStatus']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Job location</label>
                                                        <input type="text" class="form-control" name="locate" id="locate">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Qualifications</label>
                                                        <textarea class="form-control" name="quali" id="quali" cols="30" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" style="background-color:#5757d1;border-radius: 5px;color:#ffffff" class="btn" name="addJob" value="Continue">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="upload" class="modal fade" style="margin:auto">
                <div class="modal-dialog" style="max-width:500px">
                    <div class="modal-content" id="upload">
                        <div class="modal-header">
                            <h4 class="modal-title">Upload file</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <form action="views/action/upload.php" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="hidden" name="email" id="email" value="<?php echo $email ?>">
                                <input type="file" name="uploadfile[]" id="uploadfile" accept=".xlsx" multiple>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" style="background-color:#5757d1;border-radius: 5px;color:#ffffff" class="btn" name="upload" value="Upload">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="changestatus" class="modal fade" style="margin: auto;">
                <div class="modal-dialog" style="max-width: 500px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Change job status</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <form action="views/action/updateStatusJob.php" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="email" id="email" value="<?php echo $email ?>">
                                <input type="hidden" name="wut" id="wut">

                                <div class="form-group">
                                    <label>Job Status</label>
                                    <?php
                                    $sql1 = "SELECT * FROM jobstatus";
                                    $rrr = mysqli_query($con, $sql1);
                                    ?>
                                    <select name="birth" id="birth" class="form-control">
                                        <?php
                                        while ($roo = mysqli_fetch_array($rrr)) {
                                        ?>
                                            <option value="<?php echo $roo['jobStatusId']; ?>"><?php echo $roo['jobStatus']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" style="background-color:#5757d1;border-radius: 5px;color:#ffffff" class="btn" name="changeJob" value="Change">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php include('views/notification/noti.php') ?>
        </main>

    </div>

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
    <!-- End of Footer -->





    <script type="text/javascript" language="javascript" src="function/auto.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>


</html>
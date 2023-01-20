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
if($checkstatus!=1){
    header("Location: home.php");
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

    <!-- Viewport -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" /> -->




    <!-- Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700|Open+Sans" rel="stylesheet"> -->

    <!-- Libraries/Plugins -->
    <!-- <link id="bootstrap-css" href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link id="dropzone-css" href="assets/css/dropzone.css" rel="stylesheet"> -->

    <!-- Icons Library -->
    <!-- <link id="font-awesome-css" href="assets/css/font-awesome.min.css" rel="stylesheet"> -->

    <!-- Main CSS -->
    <!-- <link href="css/dropzone.css" rel="stylesheet"> -->
    <style>
        body {
            overflow-x: hidden;
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


        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
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

        #job:hover,
        #status:hover {
            color: #C80000;
        }

        #gg {
            color: #909090;
            font-size: 16px;
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

        #regForm {
            background-color: #ffffff;
            margin: 100px auto;
            padding: 40px;
            width: 70%;
            min-width: 300px;
        }

        input.invalid {
            background-color: #ffdddd;
        }


        .tab {
            display: none;
        }


        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        /* Mark the active step: */
        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #04AA6D;
        }

        textarea {
            max-width: 100%;
        }

        .overlay {
            /* Height & width depends on how you want to reveal the overlay (see JS below) */
            height: 85%;
            width: 0;
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            right: 0;
            top: 70;
            background-color: #fff;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            /* Black fallback color */
            border-radius: 30px 0px 0px 30px;
            overflow-x: hidden;
            /* Disable horizontal scroll */
            transition: 0.5s;
            /* 0.5 second transition effect to slide in or slide down the overlay (height or width, depending on reveal) */
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
                <!-- <li>
                    <a href="homeAdmin.php"><span class="fas fa-home"></span>
                        <span>Home</span></a>
                </li> -->
                <!-- <li>
                    <a href="client.php"><span class="fas fa-landmark"></span>
                        <span>Client</span></a>
                </li> -->
                <li>
                    <a href="jobAdmin.php"><span class="fas fa-briefcase"></span>
                        <span>Jobs</span></a>
                </li>
                <!-- <li>
                    <a href="authorization.php"><span class="fas fa-users"></span>
                        <span>Authorization</span></a>
                </li> -->
                <li>
                    <a href="candidateAdmin.php" class="active"><span class="fas fa-user-plus"></span>
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
            <div id="myNav" class="overlay">

                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                <div class="overlay-content" id="viewSlide">

                </div>

            </div>
            <script>
                // function openNav() {
                //     document.getElementById("myNav").style.width = "80%";

                // }
                function openNav(canId) {
                    var cId = canId;
                    var email = "<?php echo $email ?>";
                    console.log(cId);
                    $.ajax({
                        url: "candidatenav.php",
                        method: "post",
                        data: {
                            cId: cId,
                            email: email
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
            <div class="container-fluid">
                <span style="margin-left:50px;margin-top:30px;font-size:20px">Candidate</span>
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
                        <span style="color: #fff;font-weight:500;font-size:25px">Candidate </span>
                    </div>
                    <table class="table table-striped table-hover table-responsive-lg" id="wtf1">
                        <thead>
                            <tr>
                                <th style="text-align:center">No.</th>
                                <th>Candidate Name</th>
                                <th style="text-align:center">Edit</th>
                                <th>Candidate Create Date</th>
                                <th style="text-align:center">View File</th>
                               
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
                                    <td style="text-align:center"><i id="gg" class="fas fa-file" onclick="openNav('<?php echo $row['candidateId'] ?>')"></i></td>
                                   
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
           
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
                $(document).ready(function() {
                    $('#wtf1').DataTable();
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
                        url: "views/modals/deleteCandidateAdmin.php",
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

                function updateCandidate(xxx, email) {
                    var canId = xxx;
                    var email = email;
                    console.log(canId);
                    $.ajax({
                        url: "views/modals/editCandidateAdmin.php",
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
                                        <button class="btn " id="kako" onclick="window.location.href='uploadCandidateAdmin.php'" style="margin-left: 20px;">
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
            <div id="upload" class="modal fade" style="margin:auto">
                <div class="modal-dialog" style="max-width:500px">
                    <div class="modal-content" id="upload">
                        <div class="modal-header">
                            <h4 class="modal-title">Upload file</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <form action="views/action/uploadCandidate.php" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="hidden" name="email" id="email" value="<?php echo $email ?>">
                                <!-- <input type="file" name="uploadfile" id="uploadfile" multiple> -->
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" style="background-color:#5757d1;border-radius: 5px;color:#ffffff" class="btn" name="uploadcan" value="Upload">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <!-- <div class="wrapper">

                    <section class="container-fluid inner-page">

                        <div class="row">

                            <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-12 full-dark-bg">


                                <h4 class="section-sub-title"><span>Upload</span> Your Files</h4>
                                <form action="file-upload.php" method="POST" class="dropzone files-container" enctype="multipart/form-data">
                                    <div class="fallback">
                                        <input type="file" name="file" id="file" multiple />
                                        <?php $xxx = $fetch_info['id']; ?>
                                        <input type="hidden" name="id789" id="id789" value="<?php echo $xxx; ?>">
                                    </div>
                                </form>


                                <span>Only JPG, PNG, PDF, DOC (Word), XLS (Excel), PPT, ODT and RTF files types are supported.</span>
                                <span>Maximum file size is 25MB.</span>


                                <h4 class="section-sub-title"><span>Uploaded</span> Files (<span class="uploaded-files-count">0</span>)</h4>
                                <span class="no-files-uploaded">No files uploaded yet.</span>


                                <div class="preview-container dz-preview uploaded-files">
                                    <div id="previews">
                                        <div id="onyx-dropzone-template">
                                            <div class="onyx-dropzone-info">
                                                <div class="thumb-container">
                                                    <img data-dz-thumbnail />
                                                </div>
                                                <div class="details">
                                                    <div>
                                                        <span data-dz-name></span> <span data-dz-size></span>
                                                    </div>
                                                    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                                                    <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                                    <div class="actions">
                                                        <a href="#!" data-dz-remove><i class="fa fa-times"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div id="warnings">
                                    <span>Warnings will go here!</span>
                                </div>
                            </div>
                        </div>
                    </section>
                </div> -->
            </div>
           

            <div id="addCandidate" class="modal fade" style="margin:auto">
                <div class="modal-dialog" style="max-width: 537px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Create Candidate</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.reload();">&times;</button>
                        </div>
                        <form action="views/action/addCandidateAdmin.php" method="POST" id="addCandidateForm">
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
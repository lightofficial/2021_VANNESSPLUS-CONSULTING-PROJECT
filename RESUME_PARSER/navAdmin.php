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
<!Doctype html>
<html lang="">

<head>
    <meta charset="UTF-8">

    <title>Super Recruit | Apply Job</title>

    <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="image/png" href="img/logo5.jpg">


    <link href="css/nav3.css" type="text/css" rel="stylesheet" />

    <link rel="stylesheet" href="css/sty31.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../../js/sweetalert.min.js"></script>
    <?php include "library/script.php" ?>
    <?php include "library/boostrap.php" ?>


    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        body {
            overflow-x: hidden;
        }

        tr {
            transition: all .2s ease-in;
            cursor: pointer;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        th,
        td {
            padding: 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }



        h1 {
            font-weight: 600;
            text-align: center;
            background-color: #16a085;
            color: #fff;
            padding: 10px 0px;
        }



        /* tr:hover {
background-color: #f5f5f5;
transform: scale(1.02);
box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
} */



        .wrapper {

            position: relative;
            margin-left: auto;
            height: 45px;
            width: 24vw;
            background: #fff;
            line-height: 60px;
            border-radius: 50px;

            display: inline-flex;
            justify-content: center;
        }

        .wrapper#dropt {
            position: relative;
            margin-left: auto;
            height: 45px;
            width: 45px;
            background: #fff;
            line-height: 60px;
            border-radius: 50px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.25);
            display: inline-flex;
            justify-content: center;
        }

        .wrapper .icon {
            margin: 0 20px;

            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;

            position: relative;
            z-index: 1000;
            transition: 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .wrapper .icon button {
            border: none;
            background-color: #fff;
            height: 40px;
            width: 40px;
            outline: none;
            border-radius: 50%;

            z-index: 1000;

            transition: 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .wrapper .icon button i {

            line-height: 20px;
            font-size: 18px;
        }

        .wrapper .icon .tooltip {
            position: absolute;
            top: 0;
            z-index: 1000;
            background: #fff;
            color: #fff;
            padding: 8px 16px;
            font-size: 16px;
            font-weight: 400;
            border-radius: 25px;
            opacity: 0;
            pointer-events: none;
            box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.1);
            transition: 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .wrapper .icon:hover .tooltip {
            top: -50px;
            opacity: 1;
            pointer-events: auto;
        }

        .icon .tooltip:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            background: #fff;
            left: 50%;
            bottom: -6px;
            transform: translateX(-50%) rotate(45deg);
            transition: 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .wrapper .icon:hover button {
            color: #fff;
        }

        .wrapper .icon:hover button,
        .wrapper .icon:hover .tooltip {
            text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.4);
        }

        .wrapper .move:hover button,
        .wrapper .move:hover .tooltip,
        .wrapper .move:hover .tooltip:before {
            background: #3B5999;
        }

        .wrapper .share:hover button,
        .wrapper .share:hover .tooltip,
        .wrapper .share:hover .tooltip:before {
            background: #46C1F6;
        }

        .wrapper .drop:hover button,
        .wrapper .drop:hover .tooltip,
        .wrapper .drop:hover .tooltip:before {
            background: #e1306c;
        }

        .wrapper .remove:hover button,
        .wrapper .remove:hover .tooltip,
        .wrapper .remove:hover .tooltip:before {
            background: #333;
        }

        #white {
            background: #fff;
            height: 475px;
            padding-top: 0px;
            overflow: hidden;
            overflow-y: scroll;



        }

        #white::-webkit-scrollbar {
            width: 15.6px;
            height: 18px;
        }

        #white::-webkit-scrollbar-thumb {
            height: 6px;
            border: 4px solid rgba(0, 0, 0, 0);
            background-clip: padding-box;
            border-radius: 12px;
            background-color: #909090;
            box-shadow: inset -1px -1px 0px rgba(0, 0, 0, 0.05), inset 1px 1px 0px rgba(0, 0, 0, 0.05);
        }

        #white::-webkit-scrollbar-button {
            width: 0;
            height: 0;
            display: none;
        }

        #white::-webkit-scrollbar-corner {
            background-color: transparent;
        }

        #white::-webkit-scrollbar-thumb:hover {
            border-radius: 10px;

            background-color: #cccccc;
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

        tbody {
            max-height: 500;
            overflow: hidden;
            overflow-y: scroll;
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

        #halo {

            position: absolute;

            height: 45px;
            width: min-content;
            background: #E9E3D7;
            line-height: 60px;
            right: 20;
            z-index: 1006;
            display: inline-flex;
            justify-content: center;



        }

        #halo .icon {
            margin: 0 15px;
            text-align: center;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            position: relative;
            z-index: 1005;
            transition: 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        #halo .icon span {

            height: 40px;
            width: 40px;

            border-radius: 50%;
            position: relative;
            z-index: 1006;

            transition: 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        #halo .icon span i {
            line-height: 40px;
            font-size: 16px;
        }

        #halo .icon .tooltip {
            position: absolute;
            top: 0;

            background: #fff;
            color: #fff;
            padding: 8px 16px;
            font-size: 16px;
            font-weight: 400;
            border-radius: 25px;
            opacity: 0;
            pointer-events: none;
            box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.1);
            transition: 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            text-align: center;
        }

        #halo .icon:hover .tooltip {
            top: -50px;
            opacity: 1;
            pointer-events: auto;
        }

        #halo .icon:hover #lawa {
            z-index: 1006;
            top: -75px;
            opacity: 1;
            pointer-events: auto;

        }

        .icon .tooltip:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            background: #fff;
            left: 50%;
            bottom: -6px;
            transform: translateX(-50%) rotate(45deg);
            transition: 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            z-index: 1006;
        }

        #halo .icon:hover span {
            color: #fff;
        }

        #halo .icon:hover span,
        #halo .icon:hover .tooltip {
            text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.4);
        }

        #halo .add:hover span,
        #halo .add:hover .tooltip,
        #halo .add:hover .tooltip:before {
            background: #0275d8;
        }

        #halo .edit:hover span,
        #halo .edit:hover .tooltip,
        #halo .edit:hover .tooltip:before {
            background: #f0ad4e;
        }

        #halo .delete:hover span,
        #halo .delete:hover .tooltip,
        #halo .delete:hover .tooltip:before {
            background: #d9534f;
        }

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

        .modal-body {
            max-height: 568px;
            overflow: hidden;
            overflow-y: scroll;
        }

        .alert {
            background: #fff;
            padding: 20px 35px;
            min-width: 420px;
            position: absolute;
            right: 15;
            top: 90px;
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
            #ty {
                font-size: 20px;
            }

            #halo .icon {
                font-size: 14px;
            }

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
        }
    </style>


</head>

<body style="background:#E9E3D7" id="body">
    <?php

    $xx = $_GET['var'];


    $con = mysqli_connect('localhost', 'root', '', 'super');
    $sql2 = "SELECT * FROM job LEFT JOIN client ON job.clientId = client.clientId WHERE job.jobId = '$xx'";
    $res2 = mysqli_query($con, $sql2);
    $row2 = mysqli_fetch_array($res2);
    ?>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar" style="z-index: 1002;">
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
                    <a href="jobAdmin.php" class="active"><span class="fas fa-briefcase"></span>
                        <span>Jobs</span></a>
                </li>
                <!-- <li>
                    <a href="authorization.php"><span class="fas fa-users"></span>
                        <span>Authorization</span></a>
                </li> -->
                <li>
                    <a href="candidateAdmin.php"><span class="fas fa-user-plus"></span>
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
        <header style="z-index: 1005;">
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
            <?php
            $uId = $fetch_info['id'];
            ?>
            <div class="display" style="width:100%">
                <h4 id="ty"><?php echo $row2['position'] ?></h4>
                <span id="tu" style="display: inline;margin-top:8px"><i class="fas fa-landmark"></i> <?php echo $row2['clientName'] ?></span>
                <div class="wrappered" id="halo"><br><br>
                    <div class="icon add" style="z-index: 2006;">
                        <div class="tooltip" id="lawa" >
                            Add Candidate
                        </div>
                        <span onclick="addCandidate('<?php echo $xx ?>','<?php echo $email ?>')"><i class="fas fa-user-plus"></i></i></span>
                    </div>
                   
                </div><br>




            </div>
            <div class="scroll-card scroll-z-depth mt-4">
                <div class="scroll-tabs scroll-tabs-bg" scroll="true">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#one" data-toggle="tab">&emsp;New Candidates&emsp;</a></li>
                        <li><a href="#two" data-toggle="tab"> &emsp;&emsp;Interested&emsp;&emsp; </a></li>
                        <li><a href="#three" data-toggle="tab">&emsp;&emsp;Shortlisted&emsp;&emsp;</a></li>
                        <li><a href="#four" data-toggle="tab">&emsp;Client Submission&emsp; </a></li>
                        <li><a href="#five" data-toggle="tab">&emsp;Client Interview&emsp; </a></li>
                        <li><a href="#six" data-toggle="tab">&emsp;&emsp;Offered&emsp;&emsp;</a></li>
                        <li><a href="#seven" data-toggle="tab">&emsp;&emsp;Hired&emsp;&emsp;</a></li>
                        <li><a href="#eight" data-toggle="tab">&emsp;&emsp;Started&emsp;&emsp;</a></li>
                        <li><a href="#nine" data-toggle="tab">&emsp;Probation passed&emsp;</a></li>

                    </ul>
                </div>

                <div class="scroll-card-body">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="one">
                            <?php include('views/stage/NewCandidates.php') ?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="two">
                            <?php include('views/stage/interest.php') ?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="three">
                            <?php include('views/stage/Shortlisted.php') ?> </div>
                        <div role="tabpanel" class="tab-pane" id="four">
                            <?php include('views/stage/ClientSub.php') ?> </div>
                        <div role="tabpanel" class="tab-pane" id="five">
                            <?php include('views/stage/ClientInter.php') ?> </div>
                        <div role="tabpanel" class="tab-pane" id="six">
                            <?php include('views/stage/Offered.php') ?> </div>
                        <div role="tabpanel" class="tab-pane" id="seven">
                            <?php include('views/stage/Hired.php') ?> </div>
                        <div role="tabpanel" class="tab-pane" id="eight">
                            <?php include('views/stage/Started.php') ?> </div>
                        <div role="tabpanel" class="tab-pane" id="nine">
                            <?php include('views/stage/Probation.php') ?> </div>
                    </div>
                    <div class="ui" style="text-align:center;background:#fff;padding-bottom:0.3cm;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-4">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div col-4>
                                                <!-- <div class="wrapper" id="dropt">
                                                    <div class="icon move">
                                                        <div class="tooltip">
                                                            LIST
                                                        </div>
                                                        <button id="checkBtn4" type="button"><i class="fas fa-user-slash"></i></button>
                                                    </div>
                                                </div> -->

                                            </div>
                                            <div col-4>

                                            </div>
                                            <div col-4>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="wrapper">
                                        <div class="icon move">
                                            <div class="tooltip">
                                                MOVE
                                            </div>
                                            <button id="checkBtn" type="button"><i class="fas fa-exchange-alt"></i></button>
                                        </div>
                                        <div class="icon share">
                                            <div class="tooltip">
                                                SHARE
                                            </div>
                                            <button id="checkBtn1" type="button"><i class="fas fa-paper-plane"></i></button>
                                        </div>
                                        <div class="icon drop">
                                            <div class="tooltip">
                                                DROP
                                            </div>
                                            <button id="checkBtn2" type="button"><i class="fas fa-user-slash"></i></button>
                                        </div>
                                        <div class="icon remove">
                                            <div class="tooltip">
                                                REMOVE
                                            </div>
                                            <button id="checkBtn3" type="button"><i class="fas fa-minus"></i></button>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-4">

                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- <div class="ui" style="text-align:center;background:#fff;padding-bottom:0.3cm;">
                        <div class="wrapper">
                            <div class="icon move">
                                <div class="tooltip">
                                    MOVE
                                </div>
                                <button id="checkBtn" type="button"><i class="fas fa-exchange-alt"></i></button>
                            </div>
                            <div class="icon share">
                                <div class="tooltip">
                                    SHARE
                                </div>
                                <button id="checkBtn1" type="button"><i class="fas fa-paper-plane"></i></button>
                            </div>
                            <div class="icon drop">
                                <div class="tooltip">
                                    DROP
                                </div>
                                <button id="checkBtn2" type="button"><i class="fas fa-user-slash"></i></button>
                            </div>
                            <div class="icon remove">
                                <div class="tooltip">
                                    REMOVE
                                </div>
                                <button id="checkBtn3" type="button"><i class="fas fa-minus"></i></button>
                            </div>

                        </div>
                    </div> -->
                    <script>
                        $(document).ready(function() {
                            $('#checkBtn').click(function() {
                                checked = $("input[type=checkbox]:checked").length >= 1;
                                var id = [];
                                var email = "<?php echo $email ?>";
                                var jobId = "<?php echo $xx ?>";
                                $(':checkbox:checked').each(function(i) {
                                    id[i] = $(this).val();
                                });
                                if (!checked) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'Please selected one candidate to move ',
                                        button: "OK"
                                    })

                                    return false;
                                } else {

                                    console.log(email);
                                    console.log(id);
                                    console.log(jobId);
                                    $.ajax({
                                        url: "views/modals/moveCandidateAdmin.php",
                                        method: "post",
                                        data: {
                                            id: id,
                                            email: email,
                                            jobId: jobId
                                        },
                                        success: function(data) {
                                            $('#MoveCandidateModal').html(data);
                                            jQuery.noConflict();
                                            $('#moveModal').modal("show");


                                        }
                                    });
                                }

                            });
                        });
                        $(document).ready(function() {
                            $('#checkBtn1').click(function() {
                                checked = $("input[type=checkbox]:checked").length == 1;
                                var id = [];
                                var email = "<?php echo $email ?>";
                                var jobId = "<?php echo $xx ?>";
                                var canId = "<?php echo '$row[candidateId]' ?>";
                                $(':checkbox:checked').each(function(i) {
                                    id = $(this).val();
                                });
                                if (!checked) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'Please selected only one candidate ',
                                        button: "OK"
                                    })
                                    return false;
                                } else {
                                    console.log(email);
                                    console.log(id);
                                    console.log(jobId);
                                    console.log(canId);
                                    $.ajax({
                                        url: "views/modals/sendEmailModalAdmin.php",
                                        method: "post",
                                        data: {
                                            id: id,
                                            email: email,
                                            jobId: jobId
                                        },
                                        success: function(data) {
                                            $('#sendEmailModal').html(data);
                                            jQuery.noConflict();
                                            $('#sendModal').modal("show");


                                        }
                                    });
                                }

                            });
                        });
                        $(document).ready(function() {
                            $('#checkBtn2').click(function() {
                                checked = $("input[type=checkbox]:checked").length >= 1;
                                var id = [];
                                var email = "<?php echo $email ?>";
                                var jobId = "<?php echo $xx ?>";
                                $(':checkbox:checked').each(function(i) {
                                    id[i] = $(this).val();
                                });
                                if (!checked) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'Please selected one candidate to drop',
                                        button: "OK"
                                    })
                                    return false;
                                } else {
                                    console.log(email);
                                    console.log(id);
                                    console.log(jobId);
                                    $.ajax({
                                        url: "views/modals/dropCandidateNavAllAdmin.php",
                                        method: "post",
                                        data: {
                                            id: id,
                                            email: email,
                                            jobId: jobId
                                        },
                                        success: function(data) {
                                            $('#dropCandidateModal').html(data);
                                            jQuery.noConflict();
                                            $('#dropModal').modal("show");


                                        }
                                    });
                                }

                            });
                        });
                        $(document).ready(function() {
                            $('#checkBtn3').click(function() {
                                checked = $("input[type=checkbox]:checked").length >= 1;
                                var id = [];
                                var email = "<?php echo $email ?>";
                                var jobId = "<?php echo $xx ?>";
                                $(':checkbox:checked').each(function(i) {
                                    id[i] = $(this).val();
                                });
                                if (!checked) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'Please selected one candidate to remove',
                                        button: "OK"
                                    })
                                    return false;
                                } else {
                                    console.log(id);
                                    console.log(email);
                                    console.log(jobId);
                                    $.ajax({
                                        url: "views/modals/removeCandidateNavAllAdmin.php",
                                        method: "post",
                                        data: {
                                            id: id,
                                            email: email,
                                            jobId: jobId
                                        },
                                        success: function(data) {
                                            $('#RemoveCandidateModalAll').html(data);
                                            jQuery.noConflict();
                                            $('#removeModalAll').modal("show");
                                        }
                                    });
                                }

                            });
                        });
                        $(document).ready(function() {
                            $('#checkBtn4').click(function() {
                                var email = "<?php echo $email ?>";
                                var jobId = "<?php echo $xx ?>";
                                console.log(email);
                                console.log(jobId);
                                $.ajax({
                                    url: "views/modals/droptCandidateNavAdmin.php",
                                    method: "post",
                                    data: {
                                        email: email,
                                        jobId: jobId
                                    },
                                    success: function(data) {
                                        $('#droptCandidateModal').html(data);
                                        jQuery.noConflict();
                                        $('#droptModal').modal("show");
                                    }
                                });


                            });
                        });
                    </script>

                    <div id="droptModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width:800px">
                            <div class="modal-content" id="droptCandidateModal">

                            </div>
                        </div>
                    </div>
                    <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width:960px">
                            <div class="modal-content" id="editCandidateModal">

                            </div>
                        </div>
                    </div>
                    <div id="removeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width:500px">
                            <div class="modal-content" id="removeCandidateModal">

                            </div>
                        </div>
                    </div>

                    <div id="removeModalAll" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width:500px">
                            <div class="modal-content" id="RemoveCandidateModalAll">

                            </div>
                        </div>
                    </div>
                    <div id="sendModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width:fit-content">
                            <div class="modal-content" id="sendEmailModal">

                            </div>
                        </div>
                    </div>

                    <div id="moveModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width:450px">
                            <div class="modal-content" id="MoveCandidateModal">

                            </div>
                        </div>
                    </div>
                    <div id="dropModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width:450px">
                            <div class="modal-content" id="dropCandidateModal">

                            </div>
                        </div>
                    </div>
                </div>


            </div>
    </div>
    <?php include('views/notification/noti.php') ?>
    <?php
    function facebook_time_ago($timestamp)
    {
        $time_ago = strtotime($timestamp);
        $current_time = time();
        $time_difference = $current_time - $time_ago;
        $seconds = $time_difference;
        $minutes  = round($seconds / 60);
        $hours    = round($seconds / 3600);
        $days     = round($seconds / 86400);
        $weeks     = round($seconds / 604800);
        $months    = round($seconds / 2629440);
        $years    = round($seconds / 31553280);
        if ($seconds <= 60) {
            return "Just Now";
        } else if ($minutes <= 60) {
            if ($minutes == 1) {
                return "1 minute ago";
            } else {
                return "$minutes minutes ago";
            }
        } else if ($hours <= 24) {
            if ($hours == 1) {
                return "an hour ago";
            } else {
                return "$hours hrs ago";
            }
        } else if ($days <= 7) {
            if ($days == 1) {
                return "yesterday";
            } else {
                return "$days days ago";
            }
        } else if ($weeks <= 4.3) {
            if ($weeks == 1) {
                return "a week ago";
            } else {
                return "$weeks weeks ago";
            }
        } else if ($months <= 12) {
            if ($months == 1) {
                return "a month ago";
            } else {
                return "$months months ago";
            }
        } else {
            if ($years == 1) {
                return "one year ago";
            } else {
                return "$years years ago";
            }
        }
    } ?>
    </main>
    </div>
    <div id="dataModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 550;">
            <div class="modal-content" id="bill_detail">

            </div>
        </div>
    </div>
    <div id="editModalNav" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="editModaldetailNav">

            </div>
        </div>
    </div>
    <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:500px">
            <div class="modal-content" id="deleteJobDetail">

            </div>
        </div>
    </div>


    <footer style="background: #E9E3D7;">
        <div class="container-fluid">
            <p style="color: #000000;">Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> Vanness Plus Consulting Co., Ltd.
            </p>
            <?php //<i class="fa fa-copyright" aria-hidden="true"></i><span style="color: #80888C"> Vanness plus consulting co. ltd</span>
            ?>
        </div>
    </footer>
    <script type="text/javascript" language="javascript" src="assets/js/tab-scrollable.js"></script>
    <script type="text/javascript" language="javascript" src="function/auto.js"></script>
    <script>
        function addCandidate(xxx, email) {
            var bId = xxx;
            var email = email;
            console.log(bId);

            $.ajax({
                url: "views/modals/addCanAdmin.php",
                method: "post",
                data: {
                    bId: bId,
                    email: email
                },
                success: function(data) {
                    $('#bill_detail').html(data);
                    jQuery.noConflict();
                    $('#dataModal').modal("show");


                }
            });

        };

        function updatePositionNav(xxx, email, uid) {
            var bId = xxx;
            var email = email;
            var uId = uid;
            console.log(email);
            $.ajax({
                url: "views/modals/editJobNavAdmin.php",
                method: "post",
                data: {
                    bId: bId,
                    email: email,
                    uId: uId
                },
                success: function(data) {
                    $('#editModaldetailNav').html(data);
                    jQuery.noConflict();
                    $('#editModalNav').modal("show");
                }
            });

        };
    </script>
    <script>
        function deletePosition(xxx, email) {
            var jobId = xxx;
            var email = email;
            console.log(jobId);
            $.ajax({
                url: "views/modals/deleteJobNavAdmin.php",
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
        function editCandidate(xxx, email, zzz) {
            var canId = xxx;
            var email = email;
            var jobId = zzz;
            console.log(jobId);
            $.ajax({
                url: "views/modals/editCandidateNavAdmin.php",
                method: "post",
                data: {
                    canId: canId,
                    email: email,
                    jobId: jobId
                },
                success: function(data) {
                    $('#editCandidateModal').html(data);
                    jQuery.noConflict();
                    $('#editModal').modal("show");
                }
            });

        };

        function dropCandidate(xxx, email, zzz) {
            var applyId = xxx;
            var email = email;
            var jobId = zzz;
            console.log(jobId);
            $.ajax({
                url: "views/modals/dropCandidateNavAdmin.php",
                method: "post",
                data: {
                    applyId: applyId,
                    email: email,
                    jobId: jobId
                },
                success: function(data) {
                    $('#dropCandidateModal').html(data);
                    jQuery.noConflict();
                    $('#dropModal').modal("show");
                }
            });

        };

        function removeCandidate(xxx, email, zzz) {
            var applyId = xxx;
            var email = email;
            var jobId = zzz;
            console.log(jobId);
            $.ajax({
                url: "views/modals/removeCandidateNavAdmin.php",
                method: "post",
                data: {
                    applyId: applyId,
                    email: email,
                    jobId: jobId
                },
                success: function(data) {
                    $('#removeCandidateModal').html(data);
                    jQuery.noConflict();
                    $('#removeModal').modal("show");
                }
            });

        };

        function listdropCandidate(xxx, email, zzz) {
            var stage = xxx;
            var email = email;
            var jobId = zzz;
            console.log(stage);
            console.log(email);
            console.log(jobId);
            $.ajax({
                url: "views/modals/droptCandidateNavAdmin.php",
                method: "post",
                data: {
                    stage: stage,
                    email: email,
                    jobId: jobId
                },
                success: function(data) {
                    $('#droptCandidateModal').html(data);
                    jQuery.noConflict();
                    $('#droptModal').modal("show");
                }
            });

        };
    </script>
</body>

</html>
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
    <meta name="viewport" content="width=device-width,initail-scale=1,maximum-scale=1">
    <title>Super Recruit | Home</title>
    <link rel="shortcut icon" type="image/png" href="img/logo5.jpg">
    <link rel="stylesheet" href="css/home3.css">
    <?php include "library/boostrap.php" ?>
    <style>
           body{
            overflow-x: hidden;
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



        /* table.table .avatar {
            border-radius: 1px;
            vertical-align: middle;
            margin-right: 10px;
        } */

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

        .card-single a {
            position: relative;
            display: inline-block;
            padding: 2px 5px;
            border: 1.2px solid #111;
            text-transform: uppercase;
            color: #111;
            text-decoration: none;
            font-weight: 400;

        }

        .card-single a span {
            position: relative;
            z-index: 3;

        }

        .card-single a:before {
            content: '';
            position: absolute;
            top: 6px;
            left: -2px;
            width: calc(100% + 4px);
            height: calc(100% - 12px);
            background: #fff;
            transition: 0.5s ease-in-out;
            transform: scaleY(1);

        }

        .card-single a:hover::before {
            transform: scaleY(0);
        }

        .card-single a:after {
            content: '';
            position: absolute;
            left: 6px;
            top: -2px;
            height: calc(100% + 4px);
            width: calc(100% - 12px);
            background: #fff;
            transition: 0.5s ease-in-out;
            transform: scaleX(1);
            transition-delay: 0.5s;

        }

        .card-single a:hover::after {
            transform: scaleX(0);
        }

        #bara {
            font-size: 12px;
            color: #fff;
            background-color: #099FFF;

        }

        #bara:hover {
            background-color: #76D7C4;
        }

        .top-text-block {
            display: block;
            padding: 11px 20px;
            clear: both;
            font-weight: 400;
            line-height: 1.42857143;
            color: #333;
            white-space: inherit !important;
            border-bottom: 1px solid #f4f4f4;
            position: relative;
        }

        .top-text-block:hover:before {
            content: "";
            width: 4px;
            background: #f05a1a;
            left: 0;
            top: 0;
            bottom: 0;
            position: absolute;
        }

        .top-text-block.unread {
            background: #ffc;
        }

        .top-text-block .top-text-light {
            color: #999;
            font-size: 0.8em;
        }





        @-webkit-keyframes spin-topbar {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin-topbar {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        #wrapper {
            height: 465px;
            background: #fff;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            overflow: hidden;
            overflow-y: scroll;
            padding-left: -3px;


        }

        #noti {
            height: auto;
            background: #fff;
        }

        #wrapper::-webkit-scrollbar {
            width: 15.6px;
            height: 18px;
        }

        #wrapper::-webkit-scrollbar-thumb {
            height: 6px;
            border: 4px solid rgba(0, 0, 0, 0);
            background-clip: padding-box;
            border-radius: 12px;
            background-color: #909090;
            box-shadow: inset -1px -1px 0px rgba(0, 0, 0, 0.05), inset 1px 1px 0px rgba(0, 0, 0, 0.05);
        }

        #wrapper::-webkit-scrollbar-button {
            width: 0;
            height: 0;
            display: none;
        }

        #wrapper::-webkit-scrollbar-corner {
            background-color: transparent;
        }

        #wrapper::-webkit-scrollbar-thumb:hover {
            border-radius: 10px;

            background-color: #cccccc;
        }

        body::-webkit-scrollbar {
            width: 15.6px;
            height: 15px;
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

        /* @media only screen and (max-width: 1200px) {
            #wrapper{
                height: 400px;
                width: 200px;
            }
        } */


        .dash {
            position: relative;
            display: grid;
            grid-template-columns: 4fr 1.23fr;

            margin-top: 2%;
            grid-auto-flow: dense;
            grid-gap: 10px;
            margin-bottom: -25px;

        }

        .dash .box {
            display: grid;
            background: #fff;
        }

        @media only screen and (max-width: 1200px) {

            .dash {
                grid-template-columns: 3fr 1.3fr;
            }
        }

        @media only screen and (max-width: 960px) {
            .dash {
                grid-template-columns: 2fr 1fr;

            }
        }

        @media only screen and (max-width: 868px) {
            .dash {
                grid-template-columns: 100%;
            }

        }

        @media only screen and (max-width: 560px) {

            .dash {
                grid-template-columns: 100%;
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
                <li>
                    <a href="home.php" class="active"><span class="fas fa-home"></span>
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
            <?php
            $ff = "SELECT COUNT(id) as count FROM usertable WHERE last_login>$time and status='verified'";
            $qq = mysqli_query($con, $ff);
            $aa = mysqli_fetch_assoc($qq);
            $con2 = "SELECT COUNT(clientId) as count FROM`client` ";
            $con21 = mysqli_query($con, $con2);
            $con22 = mysqli_fetch_assoc($con21);
            $con3 = "SELECT COUNT(jobId) as count FROM`job` WHERE jobStatusId=1";
            $con31 = mysqli_query($con, $con3);
            $con32 = mysqli_fetch_assoc($con31);
            $con4 = "SELECT COUNT(candidateId) as count FROM`candidate` ";
            $con41 = mysqli_query($con, $con4);
            $con42 = mysqli_fetch_assoc($con41);
            ?>
            <div class="cards">
                <div class="card-single" id="Numberuser">
                    <div class="text-center">
                        <h4 style="color:#000000"><?php echo $aa['count']; ?></h4>
                        <h6>active users </h6>
                        <button class="btn btn-default" onclick="showUser()" id="bara">View</button>
                    </div>
                    <div>
                        <span><i class="fas fa-users"></i></span>
                    </div>
                </div>
                <div class="card-single" id="numberClient">
                    <div class="text-center ">
                        <h4 style="color:#000000"><?php echo $con22['count']; ?></h4>
                        <h6>active clients </h6>
                    </div>
                    <div>
                        <span><i class="far fa-building" style="color: #796D70;"></i></span>
                    </div>
                </div>
                <div class="card-single" id="numberJob">
                    <div class="text-center ">
                        <h4 style="color:#000000"><?php echo $con32['count']; ?></h4>
                        <h6>active jobs </h6>
                    </div>
                    <div>
                        <span><i class="fas fa-briefcase" style="color:#F12B5D"></i></span>
                    </div>
                </div>
                <div class="card-single" id="numberCan">
                    <div class="text-center ">
                        <h4 style="color:#000000"><?php echo $con42['count']; ?></h4>
                        <h6>active candidates </h6>
                    </div>
                    <div>
                        <span><i class="fas fa-user-tie" style="color:#000"></i></span>
                    </div>
                </div>
            </div>

            <div class="dash">

                <div class="box no-gutters" style="box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">



                </div>

                <div class="wrapper" id="wrapper">
                    <div class="box no-gutters" id="noti">

                        <?php
                        $q = "select * from message order by id DESC";
                        $c = mysqli_query($con, $q);
                        while ($row = mysqli_fetch_array($c)) {
                        ?>
                            <?php date_default_timezone_set('Asia/Bangkok');
                            $time1 =  facebook_time_ago($row["time"]);
                            ?>

                            <li>
                                <a href="#" class="top-text-block">
                                    <div class="top-text-heading" style="font-size:15.5px;"> <b><?php echo $row['title'] ?> </b><?php echo $row['mess'] ?></div>
                                    <div class="top-text-light" style="padding-top: 1px;"><?php echo $time1 ?></div>
                                </a>
                            </li>

                        <?php } ?>
                    </div>

                </div>
            </div>
    </div>

    <footer style="background: #E9E3D7;">
        <div class="container-fluid" style="margin-top: 10px;font-weight:400;">
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
        } else if ($weeks <= 4.3)  
        {
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
    <script>
        function showUser() {
            jQuery.noConflict();
            $('#showUser').modal('show');
        }
    </script>
    <script type="text/javascript" language="javascript" src="function/auto.js"></script>
    <?php include "library/script.php" ?>
    <?php require_once "views/auto/modals.php"; ?>
</body>

</html>
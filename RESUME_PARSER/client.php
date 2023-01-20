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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="img/logo5.jpg">
    <title>Super Recruit | Client</title>
    <link rel="stylesheet" href="http://maxst.icon8.com/vue-static/landings/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/sty31.css">
    <?php include "library/script.php" ?>
    <?php include "library/boostrap.php" ?>
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

        table,
        tr,
        td {
            border: none;
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

        #gg {
            color: #909090;
            font-size: 15px;
        }

        #gg:hover {
            color: #C80000;
        }

        #client1:hover {
            color: #C80000;
        }

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
                right: 10px;
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
                right: 10px;

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
                    <a href="client.php" class="active"><span class="fas fa-landmark"></span>
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
            <!-- <div class="cards">    
                <div class="card-single"> -->
            <span style="margin-left:50px;font-size:20px">Client</span>
            <a style="color:#5757d1;font-size:20px"><i class="fas fa-plus-circle" onclick="addClient()"></i></a>
            <!-- </div>
                <div class="card-single">
                     <a style="color:#5757d1;font-size:20px"><i class="fas fa-plus-circle" onclick="show()"></i></a>
                </div>
                <div class="card-single">
                </div>
            </div> -->
            <div class="container-fluid">
                <div class="table-wrapper">
                    <div class="table-title">
                        <span style="color: #fff;font-weight:500;font-size:25px">Clients</span>
                    </div>

                    <table class="table table-striped table-hover table-responsive-md" id="client123">
                        <thead>
                            <tr>
                                <th style="text-align:center">No.</th>
                                <th>Client Name</th>
                                <th></th>
                                <th style="text-align:center">Job Count</th>
                                <th>Locaiton</th>
                                <th>Business type</th>
                                <th>Client Owner</th>
                                <th>Email Template</th>
                                <th style="text-align:center">Client Create Date</th>
                                <th></th>
                            </tr>

                        <tbody>
                            <?php
                            $i = 0;
                            $xx = $fetch_info['id'];
                            $sql = "SELECT *,client.clientId,count(jobID) as countjob FROM (client NATURAL join usertable) left join job on client.clientId = job.clientId group by client.clientId";
                            $re = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($re)) {
                            ?>
                                <tr>
                                    <td style="text-align:center;"><?php echo ++$i; ?></td>
                                    <td><?php echo $row['clientName'] ?></td>
                                    <td><i id="gg" class="fas fa-edit" onclick="updateClient('<?php echo $row['clientId'] ?>','<?php echo $email ?>')"></i></td>
                                    <td style="text-align:center"><a id="client1" onclick="show_client(<?php echo $row['clientId']; ?>)"><?php echo $row['countjob'] ?></td>
                                    <td><?php echo $row['location'] ?></td>
                                    <td><?php echo $row['businessType'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td style="text-align:center">template <?php echo $row['template'] ?></td>
                                    <td style="text-align:center"><?php echo $row['clientCreateDate'] ?></td>
                                    <td><i id="gg" class="fas fa-trash-alt" onclick="deleteClient('<?php echo $row['clientId'] ?>','<?php echo $email ?>')"></i></td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>

                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#client123').DataTable();
                });
            </script>
            <script>
                function show_client(xxx) {
                    var cId = xxx;

                    console.log(cId);

                    $.ajax({
                        url: "views/modals/clientdetail.php",
                        method: "post",
                        data: {
                            cId: cId
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
                function deleteClient(xxx, email) {
                    var cId = xxx;
                    var email = email;
                    console.log(cId);
                    $.ajax({
                        url: "views/modals/deleteClient.php",
                        method: "post",
                        data: {
                            cId: cId,
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
                function updateClient(xxx, email) {
                    var cId = xxx;
                    var email = email;
                    console.log(cId);
                    $.ajax({
                        url: "views/modals/editClient.php",
                        method: "post",
                        data: {
                            cId: cId,
                            email: email
                        },
                        success: function(data) {
                            $('#editModaldetail').html(data);
                            jQuery.noConflict();
                            $('#editModal1').modal("show");
                        }
                    });

                };
            </script>
            <script>
                function addClient() {
                    jQuery.noConflict();
                    $('#addClient').modal('show');
                }
            </script>
            <script>
                function show() {
                    jQuery.noConflict();
                    $('#show').modal('show');
                }
            </script>
            <div id="dataModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 700px;">
                    <div class="modal-content" id="bill_detail">

                    </div>
                </div>
            </div>
            <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog " role="document" style="max-width:500px">
                    <div class="modal-content" id="deleteJobDetail">

                    </div>
                </div>
            </div>
            <div id="editModal1" class="modal fade">
                <div class="modal-dialog modal-dialog-centered" style="max-width:600px">
                    <div class="modal-content" id="editModaldetail">

                    </div>
                </div>
            </div>
            <div id="show" class="modal fade" style="margin:auto">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">show</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="table-wrapper">
                                    <div class="table-title">

                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover ">
                                            <thead>
                                                <tr style="text-align:center">

                                                    <th>Client Name</th>
                                                    <th>Job Count</th>
                                                    <th>Locaiton</th>
                                                    <th>Business Type</th>
                                                    <th>Client Owner</th>
                                                    <th>Client Create Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 0;
                                                $xx = $fetch_info['id'];
                                                $sql = "SELECT *,count(jobID) as countjob FROM (client NATURAL join usertable) left join job on client.clientId = job.clientId group by client.clientId";
                                                $re = mysqli_query($con, $sql);
                                                while ($row = mysqli_fetch_array($re)) {
                                                ?>
                                                    <tr>

                                                        <td><?php echo $row['clientName'] ?></td>
                                                        <td><?php echo $row['countjob'] ?></td>
                                                        <td><?php echo $row['location'] ?></td>
                                                        <td><?php echo $row['businessType'] ?></td>
                                                        <td><?php echo $row['name'] ?></td>
                                                        <td><?php echo $row['clientCreateDate'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
            <div id="addClient" class="modal fade" style="margin:auto">
                <div class="modal-dialog" style="max-width: 500px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Create Client</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <form action="views/action/addClient.php" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="email" id="email" value="<?php echo $email ?>">
                                <input type="hidden" name="id" id="id" value="<?php echo $fetch_info['id'] ?>">
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input type="text" class="form-control" name="cname" id="cname" required>
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" class="form-control" name="locate" id="locate">
                                </div>
                                <div class="form-group">
                                    <label>Business Type</label>
                                    <input type="text" row="4" class="form-control" name="bu" id="bu">
                                </div>
                                <div class="form-group">
                                    <label>Email template</label>
                                    <select class="form-control" name="pattern" id="pattern" required>

                                        <option value="1">template 1</option>
                                        <option value="2">template 2</option>
                                        <option value="3">template 3</option>
                                        <option value="4">template 4</option>
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" style="background-color:#5757d1;border-radius: 5px;color:#ffffff" class="btn" name="addClient" value="Continue">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <?php include('views/notification/noti.php') ?>
    </div>
    <!-- Footer -->
    <footer style="background: #E9E3D7;">
        <div class="container-fluid">
            <p style="color: #000000;">Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> Vanness Plus Consulting Co., Ltd.
            </p>

        </div>
    </footer>


    <script type="text/javascript" language="javascript" src="function/auto.js"></script>
</body>

</html>
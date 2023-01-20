<?php $time = time(); ?>
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script> -->
<style>
    tr {
        transition: all .2s ease-in;
        cursor: pointer;
    }

    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    #header {

        background-color: #16a085;
        color: #fff;
        text-align: center;
    }

    h1 {
        font-weight: 600;
        text-align: center;
        background-color: #16a085;
        color: #fff;
        padding: 10px 0px;
    }



    tr:hover {
        background-color: #f5f5f5;
        transform: scale(1.02);
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }

    @media only screen and (max-width: 768px) {
        table {
            width: 70%;
        }
    }

    .modal .modal-dialog {

        max-width: 700px;
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


    .wrapper header {
        font-size: 20px;
        font-weight: 600;
        padding-bottom: 20px;
    }

    .wrapper nav {
        position: relative;
        width: 100%;
        height: 50px;
        display: flex;
        align-items: center;
    }

    .wrapper nav label {
        display: block;
        height: 100%;
        width: 100%;
        text-align: center;
        line-height: 50px;
        cursor: pointer;
        position: relative;
        z-index: 1;
        color: #17a2b8;
        font-size: 17px;
        border-radius: 5px;
        margin: 0 2px;
        transition: all 0.3s ease;
    }

    .wrapper nav label:hover {
        background: rgba(23, 162, 184, 0.3);
    }

    #home:checked~nav label.home,
    #blog:checked~nav label.blog,
    #code:checked~nav label.code,
    #help:checked~nav label.help,
    #about:checked~nav label.about {
        color: #fff;
    }


    nav .slider {
        position: absolute;
        height: 100%;
        width: 50%;
        left: 0;
        bottom: 0;
        z-index: 0;
        border-radius: 10px;
        background: #17a2b8;
        transition: all 0.5s ease;
    }

    input[type="radio"] {
        display: none;
    }

    #blog:checked~nav .slider {
        left: 50%;
    }



    section .content {
        padding-top: 30px;
        display: none;
        background: #fff;
    }

    #home:checked~section .content-1,
    #blog:checked~section .content-2,
    #code:checked~section .content-3,
    #help:checked~section .content-4,
    #about:checked~section .content-5 {
        display: block;
    }

    section .content .title {
        font-size: 21px;
        font-weight: 500;
        margin: 30px 0 10px 0;
    }

    section .content p {
        text-align: justify;
    }

    .modal-body {
        height: 440px;
        overflow: hidden;
        overflow-y: scroll;
    }

    #body::-webkit-scrollbar {
        width: 15.6px;
        height: 18px;   
    }

    #body::-webkit-scrollbar-thumb {
        height: 6px;
        border: 4px solid rgba(0, 0, 0, 0);
        background-clip: padding-box;
        border-radius: 12px;
        background-color: #909090;
       box-shadow: inset -1px -1px 0px rgba(0, 0, 0, 0.05), inset 1px 1px 0px rgba(0, 0, 0, 0.05);
    }

    #body::-webkit-scrollbar-button {
        width: 0;
        height: 0;
        display: none;
    }

    #body::-webkit-scrollbar-corner {
        background-color: transparent;
    }

    #body::-webkit-scrollbar-thumb:hover {
        border-radius: 10px;

        background-color: #cccccc;
    }
</style>
<div id="showUser" class="modal fade">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Users</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body" id="body">
                <div class="wrapper">
                    <input type="radio" name="slider" checked id="home">
                    <input type="radio" name="slider" id="blog">

                    <nav>
                        <label for="home" class="home"><i class="fas fa-user"></i> active</label>
                        <label for="blog" class="blog"><i class="fas fa-user-slash"></i> inactive</label>

                        <div class="slider"></div>
                    </nav>
                    <section>
                        <div class="content content-1" >

                            <div class="container-fluid">
                                <div class="table-wrapper">
                                   
                                    <table class="table table-striped table-hover text-center" id="user">
                                        <thead>
                                            <tr id="header">
                                                <th>No.</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="usergrid" class="text-center">
                                            <?php
                                            $i = 0;
                                            $sql = "SELECT * FROM usertable where status='verified' and  last_login>$time";
                                            $re = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_array($re)) {
                                                $status = 'offline';
                                                $class = "btn-danger";
                                                if ($row['last_login'] > $time) {
                                                    $status = 'online';
                                                    $class = "btn-success";
                                                }
                                            ?>
                                                <tr>
                                                    <td><?php echo ++$i; ?></td>
                                                    <td><?php echo $row['name'] ?></td>
                                                    <td style="color: #5cb85c;">online</td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="content content-2" style="height: 440px;">
                            <div class="container-fluid" >
                                <div class="table-wrapper">
                                    <div class="table-title">


                                    </div>
                                    <table class="table table-striped table-hover " id="inuser">
                                        <thead>
                                            <tr id="header">
                                                <th>No.</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="useroff" class="text-align:center">
                                            <?php
                                            $i = 0;
                                            $sql = "SELECT * FROM usertable where status='verified' and  last_login<$time";
                                            $re = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_array($re)) {
                                                $status = 'offline';
                                                $class = "btn-danger";
                                                if ($row['last_login'] > $time) {
                                                    $status = 'online';
                                                    $class = "btn-success";
                                                }
                                            ?>
                                                <tr>
                                                    <td><?php echo ++$i; ?></td>
                                                    <td><?php echo $row['name'] ?></td>
                                                    <td style="color: #FF5733 ;">offline</td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">

            </div>
            </form>
        </div>
    </div>
</div>
<!-- <script>
    $(document).ready(function() {
        $('#user').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#inuser').DataTable();
    });
</script> -->
<script>
    let tabHeader = document.getElementsByClassName("tab-header")[0];
    let tabIndicator = document.getElementsByClassName("tab-indicator")[0];
    let tabBody = document.getElementsByClassName("tab-body")[0];

    let tabsPane = tabHeader.getElementsByTagName("div");

    for (let i = 0; i < tabsPane.length; i++) {
        tabsPane[i].addEventListener("click", function() {
            tabHeader.getElementsByClassName("active")[0].classList.remove("active");
            tabsPane[i].classList.add("active");
            tabBody.getElementsByClassName("active")[0].classList.remove("active");
            tabBody.getElementsByTagName("div")[i].classList.add("active");

            tabIndicator.style.left = `calc(calc(100% / 4) * ${i})`;
        });
    }
</script>
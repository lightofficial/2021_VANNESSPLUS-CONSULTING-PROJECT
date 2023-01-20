<style>
    #view {
        font-size: 17px;
        padding: 20px;
    }

    b {
        font-weight: 500;
        font-size: 19px;
    }

    #detailcli {
        margin-top: -10px;
    }

    .modal .modal-dialog {

        max-width: 800px;


    }

    .modal-body {
        max-height: 500px;



        overflow: hidden;
        overflow-y: scroll;
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
<?php

if (isset($_POST["cId"])) {

    $output = '';
    $con = mysqli_connect('localhost', 'root', '', 'super');
    $sql1 = "SELECT job.position,jobstatus.jobStatus FROM job NATURAL JOIN jobstatus  WHERE   job.clientId ='" . $_POST["cId"] . "' order by jobStatusId";
    $res1 = mysqli_query($con, $sql1);

    $sql2 = "SELECT * FROM client  WHERE clientId ='" . $_POST["cId"] . "'";
    $res2 = mysqli_query($con, $sql2);
    $row2 = mysqli_fetch_array($res2); ?>
    <div class="modal-header">
        <h4 class="modal-title">Job in <?php echo $row2['clientName'] ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body" id="body">
        <div class="wrapper">

            <div class="container-fluid" style="height: 440px;">


                <table class="table table-striped table-hover text-center">
                    <thead>
                        <tr id="header">

                            <th>Postion</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php

                        while ($row1 = mysqli_fetch_array($res1)) {

                        ?>
                            <tr>
                                <td><?php echo $row1['position'] ?></td>
                                <td><?php echo $row1['jobStatus'] ?></td>


                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>



    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>

<?php
    echo $output;
} ?>
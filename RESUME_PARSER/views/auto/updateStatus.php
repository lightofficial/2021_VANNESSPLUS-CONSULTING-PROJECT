<?php
    session_start();
    include('../../function/connection.php');
    $id = $_SESSION['email'];
    $time = time()+11;
    $res =mysqli_query($con,"update usertable set last_login=$time where email='$id'");
?>
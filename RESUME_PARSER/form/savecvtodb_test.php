<?php

include('server.php');

$errors = array();

if (isset($_POST['confirm_data']))  {
    // personal detail data
    $position = mysqli_real_escape_string($conn , $_POST['data_position']);
    
    // check query
    // check errors
    if (count($errors) == 0)    {
        $sql = "INSERT INTO test (data_position) 
        VALUES 
        ('$position')";
        mysqli_query($conn,$sql);
        //header('location: success.php');
    }
}

?>
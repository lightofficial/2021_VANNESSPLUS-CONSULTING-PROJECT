<?php
    session_start();
    include('../../function/connection.php');
    $id = $_SESSION['email'];
    $con3 = "SELECT COUNT(jobId) as count FROM`job` WHERE jobStatusId=1";
    $con31 = mysqli_query($con, $con3);
   
               
    
    
    $html='';
    while (  $con32 = mysqli_fetch_assoc($con31)) {
        
        $html .='<div class="text-center ">
        <h4 style="color:#000000">'.$con32['count'].'</h4>
            <h6>active jobs  </h6>
        </div>
        <div>
        <span ><i class="fas fa-briefcase" style="color:#F12B5D"></i></span>
    </div>';
    }
    echo $html;
 ?>
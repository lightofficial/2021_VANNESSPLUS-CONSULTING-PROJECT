<?php
    session_start();
    include('../../function/connection.php');
    $id = $_SESSION['email'];
    $time = time();
    $con4 = "SELECT COUNT(candidateId) as count FROM`candidate` ";
    $con41 = mysqli_query($con, $con4);
    
   
    
    
    $html='';
    while ($aa = mysqli_fetch_assoc($con41)) {
        
        $html .='<div class="text-center ">
        <h4 style="color:#000000">'.$aa['count'].'</h4>
        <h6>active candidates </h6>
    </div>
    <div>
        <span><i class="fas fa-user-tie" style="color:#000"></i></span>
    </div>';
    }
    echo $html;
 ?>
<?php
    session_start();
    include('../../function/connection.php');
    $id = $_SESSION['email'];
    $con2 = "SELECT COUNT(clientId) as count FROM`client` ";
                $con21 = mysqli_query($con, $con2);
               
    
    
    $html='';
    while ( $con22 = mysqli_fetch_assoc($con21)) {
        
        $html .='<div class="text-center ">
        <h4 style="color:#000000">'.$con22['count'].'</h4>
            <h6>active clients  </h6>
        </div>
        <div>
            <span><i class="far fa-building" style="color: #796D70;"></i></span>
        </div>';
    }
    echo $html;
 ?>
<?php
    session_start();
    include('../../function/connection.php');
    $id = $_SESSION['email'];
    $time = time();
    $ff11 = "SELECT COUNT(id) as count FROM usertable WHERE status='verified' ";
    $qq11 = mysqli_query($con, $ff11);
    $aa11 = mysqli_fetch_assoc($qq11);
    $ff = "SELECT COUNT(id) as count FROM usertable WHERE last_login>$time";
    $qq = mysqli_query($con, $ff);
   
    
    
    $html='';
    while ($aa = mysqli_fetch_assoc($qq)) {
        
        $html .='<div class="text-center">
            <h4 style="color:black">'.$aa['count'].'</h4>
            <h6>active users </h6>
            <button class="btn btn-default" onclick="showUser()" id="bara">View</button> 
        </div>
        
        <div>
        <span ><i class="fas fa-users"></i></span>
        </div>';
    }
    echo $html;
 ?>
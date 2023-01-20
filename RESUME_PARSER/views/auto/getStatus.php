<?php
    session_start();
    include('../../function/connection.php');
    $id = $_SESSION['email'];
    $time = time();
    
    $sql = "SELECT * FROM usertable where status='verified' and last_login>$time";
    $re = mysqli_query($con, $sql);
    
    $i = 0;
    $html='';
    while ($row = mysqli_fetch_array($re)) {
        $status = 'offline';
        $class = "btn-danger";
        if ($row['last_login'] > $time) {
            $status = 'online';
            $class = "btn-success";
        }
        $html .=' <tr>
        <td>'.++$i.'</td>
        <td>'.$row['name'].'</td>
        <td style="color: #16a085;">online</td>

    </tr>';
    }
    echo $html;
 ?>
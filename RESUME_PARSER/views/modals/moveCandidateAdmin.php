<style>
    #view {
        font-size: 17px;
        padding-top: 10px;
    }

    b {
        font-weight: 500;
        font-size: 19px;
    }

    textarea::-webkit-scrollbar-track {

        border-radius: 10px;
        background-color: #E9E3D7;
    }

    textarea::-webkit-scrollbar {
        width: 8px;
        height: 12px;
        padding-left: 1px;
        background-color: #fff;
        cursor: context-menu;
    }

    textarea::-webkit-scrollbar-thumb {
        border-radius: 10px;

        background-color: #909090;
    }

    textarea::-webkit-scrollbar-thumb:hover {
        border-radius: 10px;

        background-color: #cccccc;
    }
    #wrap {
        font-size: 17px;

        background: #fff;
        height: 580px;
        width: 100%;
    }
    .modal-body {
            max-height: 620px;
            overflow: hidden;
            overflow-y: scroll;
        }
    #moveC {
        border: none;
        background: #fff;
        color: #0275d8;
        font-size: 20px;
        float: right;
        outline: none;
        cursor: pointer;
    }
    #moveC:hover {
       border-radius: 50%;
        background: #5cb85c;
        color: #fff;
       
    }
</style>
<?php
  $con = mysqli_connect('localhost', 'root', '', 'super');
if (isset($_POST["id"])) {
    $xx = $_POST["id"];
    $email = $_POST["email"];
    $jobId = $_POST["jobId"];
    $count = count($xx);
    $sql123 = "select * from candidatestatus ORDER BY candidatestatus.candidateStatusId";
    $res123 = mysqli_query($con, $sql123);
    foreach ($_POST["id"] as $xx) {
        if ($xx == '') {
            $count = $count - 1;
        }
    }
    $output = '';
  

    $output .= ' <div class="modal-header">
    <h4 class="modal-title">Select Stage</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<form action="views/action/menuAdmin.php" method="POST">
    <div class="modal-body"> 
    <input type="hidden" name="jobId" id="jobId" value="' . $jobId . '">
    <input type="hidden" name="email" id="email" value="' . $email . '">
    <input type="hidden" name="count" id="count" value="' . $count . '">';
    foreach ($_POST["id"] as $xx) {
        $output .= '<input type="hidden" name="applyId[]" id="applyId[]" value="' . $xx . '">';
    }
    $output .= '  <div class="pp" id="wrap">
    <h5 > Move '.$count.' candidates to </h5><br>
    ';
    
       while ($row1 = mysqli_fetch_array($res123)) {
          
           
           $output .= '  
              
              <div style="padding-bottom:7px"> ' . $row1['candidateStatusName'] . '    <button  type="submit" id="moveC" name="moveC" value="' . $row1['candidateStatusId'] . '"><i class="far fa-check-circle" ></i></button></div>
               
            
             
               <br>
              ';
       }
       $output .= '
   
</form>';



    echo $output;
}

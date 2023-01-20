<?php
//fetch.php
require('../../function/connection.php');
$output = ''; 
$kkk = $_POST["kkk"];
if(isset($_POST["query"]))
{
  
 $search = mysqli_real_escape_string($con, $_POST["query"]);
 $query = "
  select b.canid as candidateId,b.candidateName as candidateName,b.jid as jobId from (select candidate.candidateId as canid,candidateName,a.jobId as jid from candidate left join (select applyId,candidateId,jobId from applyjob where jobId=$kkk) as a on candidate.candidateId=a.candidateId) as b where b.jid is null 
 and candidateName LIKE '%".$search."%' order by candidateId DESC 
  
 ";
} 
else
{
 $query = "
 select b.canid as candidateId,b.candidateName as candidateName,b.jid as jobId from (select candidate.candidateId as canid,candidateName,a.jobId as jid from candidate left join (select applyId,candidateId,jobId from applyjob where jobId=$kkk) as a on candidate.candidateId=a.candidateId) as b where b.jid is null order by candidateId DESC
 ";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
    
  <div style="padding-bottom:7px"> ' . $row['candidateName'] . '    <button  type="submit" id="addC" name="addC" value="' . $row['candidateId'] . '"><i class="fas fa-plus" ></i></button></div>
            
         
          
  <br>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
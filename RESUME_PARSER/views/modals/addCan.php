<style>
    #view {
        font-size: 17px;
    }

    b {
        font-weight: 500;
        font-size: 19px;
    }

    #wrap {
        font-size: 17px;
        height: 450px;
        background: #fff;

        width: 100%;

    }

    #kbi {
        max-height: 568px;
        overflow: hidden;
        overflow-y: scroll;

    }

    #addC {
        border: none;
        background: #fff;
        color: #000;
        font-size: 20px;
        float: right;
        outline: none;
        cursor: pointer;

    }

    #addC:hover {


        color: #5cb85c;
    }
</style>
<?php

if (isset($_POST["bId"])) {
    $kkk = $_POST["bId"];
    $email = $_POST["email"];
    $output = '';
    $con = mysqli_connect('localhost', 'root', '', 'super');
    $sql1 = "select b.canid as candidateId,b.candidateName as candidateName,b.jid as jobId from (select candidate.candidateId as canid,candidateName,a.jobId as jid from candidate left join (select applyId,candidateId,jobId from applyjob where jobId=$kkk) as a on candidate.candidateId=a.candidateId) as b where b.jid is null order by candidateId DESC";
    $res1 = mysqli_query($con, $sql1);


    $output .= ' <div class="modal-header">
     <span style="color:#5757d1;font-weight:500;font-size:25px;"> Add Candidate</span>
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 </div> 
 <form action="views/action/addCandidateNav.php" method="POST">
 <div class="modal-body" id="kbi">

 <input type="hidden" name="id123" id="id123" value="' . $kkk . '">
<input type="hidden" name="email" id="email" value="' . $email . '">

   <div class="form-group">
    <div class="input-group">
    
     <input type="text" name="search_text" id="search_text" placeholder="Search by candidate name" class="form-control" />
    </div>
   </div><br>
<div class="pp" id="wrap">
 ';

    while ($row1 = mysqli_fetch_array($res1)) {


        $output .= '  
           
           <div style="padding-bottom:7px"> ' . $row1['candidateName'] . '    <button  type="submit" id="addC" name="addC" value="' . $row1['candidateId'] . '"><i class="fas fa-plus" ></i></button></div>
            
         
          
            <br>
           ';
    }
    $output .= '
   </div>
   </div>
   </form>';



    echo $output;
} ?>
<script>
    $(document).ready(function() {

        load_data();
       
       
        function load_data(query) {
            var kkk = "<?php echo $kkk ?>";
            console.log(kkk);
            $.ajax({
                
                url: "views/action/fetch.php",
                method: "POST",
                data: {
                    query: query,
                    kkk : kkk
                   
                },
                success: function(data) {
                    $('#wrap').html(data);
                }
            });
        }
        $('#search_text').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
    });
</script>
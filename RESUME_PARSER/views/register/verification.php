<?php require_once "../../function/controllerUserData.php"; ?>
<?php
$email = $_SESSION['email'];
if ($email == false) {
    header('Location: ../../login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<style>


@media only screen and (max-width: 768px) {
   #qwe {
        width: auto;
    }
}


</style>
<head>


<meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="../../img/logo5.jpg">
    <title>Super Recruit | Verification Code</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/logincss/verification.css">
</head>

<body>
    <br>
    <div class="container-fluid ">
        <div class="row justify-content-center  ">
        <div class="col-md-5 text-center">
            <img width="85%" height="210px;" id="qwe" src="../../img/verifycode.png" >
            </div>
            <div class="col-md-9">
                <form action="verification.php" method="POST" autocomplete="off">
                    <br><h3 class="text-center">Verification Code</h3><br>
                    
                        <div class="alert alert-success text-center">
                            <?php echo "We've sent a verification code to your <br>email - $email "; ?>
                            
                        </div>
                   
                    
                    <?php
                    if (count($errors) > 0) {
                    ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach ($errors as $showerror) {
                                echo $showerror;
                            }
                            
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="number" name="otp" placeholder="Enter verification code" min="0" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include('../copyright/copyright.php') ?>
</body>

</html>
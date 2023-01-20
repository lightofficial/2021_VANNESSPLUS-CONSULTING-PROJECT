<?php require_once "../../function/controllerUserData.php"; ?>
<?php
$email = $_SESSION['email'];
if ($email == false) {
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        @media only screen and (max-width: 768px) {
            #qqq {
                width: auto;
            }
        }
    </style>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="../../img/logo5.jpg">
    <title>Super Recruit | Verification code</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/logincss/verification.css">
</head>

<body>
    <br>
    <div class="container-fluid">
        <div class="row justify-content-center  ">
            <div class="col-md-5 text-center">
                <img width="100%" height="230px;" id="qqq" src="../../img/verifycode.png">
            </div>
            <div class="col-md-9 ">
                <form action="resetPassword.php" method="POST" autocomplete="off">
                    <h3 class="text-center">Verification Code</h3><br>


                    <div class="alert alert-success text-center">
                        <?php echo "An email with a verification code was sent <br>to - $email";
                        ?>
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
                        <input class="form-control" type="number" name="otp" placeholder="Enter code" min="0" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-reset-otp" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include('../copyright/copyright.php') ?>
</body>

</html>
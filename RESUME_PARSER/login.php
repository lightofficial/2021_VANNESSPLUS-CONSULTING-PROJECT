<?php require_once "function/controllerUserData.php";
?>
<!DOCTYPE html>
<html lang="en">
<style>
@media only screen and (max-width: 768px) {
   #gak {
        width: auto;
    }
}
</style>
<head>
    
    <meta charset="UTF-8">
    <title>Super Recruit | Login</title>
    <link rel="shortcut icon" type="image/png" href="img/logo5.jpg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/logincss/login1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>


    <div class="container-fluid">
        <div class="row form login-form">
            <div class="col-md-7  text-center ">
                <form action="login.php" method="POST" autocomplete="">
                    <h2 class="text-center">Login </h2><br>
                   
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
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="link forget-pass text-left" style="margin-top:10px;font-size:smaller"><a href="views/register/forgotPassword.php">Forgot password?</a></div>
                    <div class="form-group">

                        <input class="form-control button" type="submit" name="login" value="Login">

                    </div>
                    <div class="link login-link text-center">Need account? <br> <a href="./views/register/SignUp.php">Sign up now</a></div>
                </form>
            </div>

            <div class="col-md-5  text-center  " style="margin-top:20px">
                <img class="logo" width="92%" id="gak" src="img/logo2.png" /><br><span class="blue-text "> Super </span><br><span class="red-text"> Recruit</span>

            </div>

        </div>
    </div>
   
    <?php include('views/register/swal.php') ?>
    <?php include('views/copyright/copyright1.php') ?>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

</body>

</html>
<?php require_once "../../function/controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<style>
    @media only screen and (max-width: 768px) {
        #asd {
            width: auto;
        }
      
    }
    
</style>

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="../../img/logo5.jpg">
    <title>Super Recruit | Signup</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/logincss/regis.css">
</head>

<body>

    <div class="container-fluid" id="bibi" >
        <div class="row ">
            <div class="col-sm-5 text-center mt-4 ">
                <img width="82%" height="200px;" id="asd" style="margin: auto;    
    display:flex;margin-top:70px" src="../../img/logo2.png" />
                <span class="blue-text ">Super</span><br>
                <span class="red-text">Recruit</span><br><br>

            </div>
            <div class="col-sm-7 text-center ">
                <form action="SignUp.php" method="POST" autocomplete="">
                    <h2 class="text-center">Sign Up</h2>
                    <br>
                    <?php
                    if (count($errors) == 1) {
                    ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach ($errors as $showerror) {
                                echo $showerror;
                            }
                            ?>
                        </div>
                    <?php
                    } elseif (count($errors) > 1) {
                    ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach ($errors as $showerror) {
                            ?>
                                <li><?php echo $showerror; ?></li>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Name Surname" required value="<?php echo $name ?>">
                    </div>
                    <div class="form-group">

                        <input type="text" class="form-control" name="nickname" id="nickname" placeholder="Nickname" required>
                    </div>
                    <div class="form-group">

                        <input type="tel" class="form-control" name="num" id="num" placeholder="Phone number" pattern="[0]{1}[0-9]{9}" required>
                    </div>
                    <!-- <div class="form-group">
                        <input class="form-control" type="email" pattern=".+@vannessplus.com" name="email" placeholder="Email address" required value="<?php echo $email ?>">
                    </div> -->
                    <div class="form-group">
                        <input class="form-control" type="email"  name="email" placeholder="Email address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" onkeyup="trigger()" id="password1" type="password" name="password" placeholder="Password" minlength="7" required>

                        <!-- <span class="showBtn"> -->
                        <i class="fas fa-eye  password-show" style=" user-select: none;"></i>


                    </div>
                    <div class="text"></div>
                    <div class="indicator">
                        <span class="weak"></span>
                        <span class="medium"></span>
                        <span class="strong"></span>
                    </div>



                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="Sign Up">
                    </div>
                    <div class="link login-link text-center">Already have an account? <a href="../../login.php">Login </a></div>
                </form>
            </div>

        </div>
    </div>
    <script src="../../js/jquery-latest.min.js"></script>
    <script>
        $(function() {
            $(".password-show").click(function(event) {
                $(this).toggleClass('fa-eye-slash');
                var x = $("#password1").attr("type"); //getting attribute in variable
                if (x == "password") {

                    $("#password1").attr("type", "text"); //setting attribute on condition
                } else {
                    $("#password1").attr("type", "password");
                }
            });
        })
    </script>

    <script>
        const indicator = document.querySelector(".indicator");
        const input = document.querySelector("#password1");
        const weak = document.querySelector(".weak");
        const medium = document.querySelector(".medium");
        const strong = document.querySelector(".strong");
        const text = document.querySelector(".text");

        let regExpWeak = /[a-z]/;
        let regExpMedium = /\d+/;
        let regExpStrong = /[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/;

        function trigger() {
            if (input.value != "") {
                indicator.style.display = "block";
                indicator.style.display = "flex";
                if (input.value.length <= 6 && (input.value.match(regExpWeak) || input.value.match(regExpMedium) || input.value.match(regExpStrong))) no = 1;
                if (input.value.length > 6 && ((input.value.match(regExpWeak) && input.value.match(regExpMedium)) || (input.value.match(regExpMedium) && input.value.match(regExpStrong)) || (input.value.match(regExpWeak) && input.value.match(regExpStrong)))) no = 2;
                if (input.value.length > 6 && input.value.match(regExpWeak) && input.value.match(regExpMedium) && input.value.match(regExpStrong)) no = 3;
                if (no == 1) {
                    weak.classList.add("active");
                    text.style.display = "block";
                    text.textContent = "Weak";
                    text.classList.add("weak");
                }
                if (no == 2) {
                    weak.classList.remove("active");
                    medium.classList.add("active");
                    text.textContent = "Medium";
                    text.classList.add("medium");
                } else {
                    medium.classList.remove("active");
                    text.classList.remove("medium");
                }
                if (no == 3) {
                    weak.classList.remove("active");
                    medium.classList.remove("active");
                    strong.classList.add("active");
                    text.textContent = "Strong";
                    text.classList.add("strong");
                } else {
                    strong.classList.remove("active");
                    text.classList.remove("strong");
                }

            } else {
                indicator.style.display = "none";
                text.style.display = "none";
                showBtn.style.display = "none";
            }
        }
    </script>


    <?php include('../copyright/copyright2.php') ?>
</body>

</html>
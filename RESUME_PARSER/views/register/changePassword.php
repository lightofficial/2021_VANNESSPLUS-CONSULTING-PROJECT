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
            #wwww {
                width: auto;
            }
        }
    </style>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="../../img/logo5.jpg">
    <title>Super Recruit | Change password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/logincss/changepass.css">
</head>

<body>
    <br>
    <div class="container-fluid">
    <div class="row   justify-content-center ">
            <div class="col-md-5 text-center">
            <img width="100%" height="210px;" id="wwww" src=" ../../img/changepass.png" >
            
            </div>
            <div class="col-md-8">
            <h3 class="text-center">New Password</h3>
                   
                        <div class="alert alert-success text-center">
                            <?php echo   "Please create a new password.";
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
            
           
                <form action="changePassword.php" method="POST" autocomplete="off">
                    
                    <div class="form-group">
                        <input class="form-control" onkeyup="trigger()" id="password1" type="password" name="password" placeholder="Create new password" minlength="7" required>

                        <!-- <span class="showBtn"> -->
                            <i class="fas fa-eye  password-show" style=" user-select: none;"></i>
                          

                    </div>
                    <div class="text text-center"></div>
                    <div class="indicator">
                        <span class="weak"></span>
                        <span class="medium"></span>
                        <span class="strong"></span>
                    </div>



                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button"  type="submit" name="change-password" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../../js/jquery-latest.min.js"></script>
    <script>
	$(function(){
		$(".password-show").click(function(event) {
			$(this).toggleClass('fa-eye-slash');
			var x = $("#password1").attr("type"); //getting attribute in variable
			if (x == "password") 
			{
                
				$("#password1").attr("type","text"); //setting attribute on condition
			}
			else
			{
				$("#password1").attr("type","password");
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

    <?php include('../copyright/copyright.php') ?>
    </body>


</html>
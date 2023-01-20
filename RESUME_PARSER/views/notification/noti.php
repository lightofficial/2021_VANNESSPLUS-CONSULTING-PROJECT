<?php

            if (!empty($_SESSION['status']) != '') {
                if (!empty($_SESSION['status_code']) == '1') {
            ?>
                    <div class="alert hide" style="  border-left: 8px solid #5cb85c;">
                        <span class="fas fa-check-circle"></span>
                        <span class="msg"><?php echo $_SESSION['status'] ?></span>
                        <div class="close-btn">
                            <span class="fas fa-times"></span>
                        </div>
                    </div>
                <?php } else if(!empty($_SESSION['status_code']) == '0'){
                ?> <div class="alert hide" style="  border-left: 8px solid #d9534f;">
                        <span class="fas fa-times-circle"></span>
                        <span class="msg"><?php echo $_SESSION['status'] ?></span>
                        <div class="close-btn">
                            <span class="fas fa-times"></span>
                        </div>
                    </div>
                <?php } }?>
                <script>
                      var kill = "<?php echo $_SESSION['status_code'] ?>";
                    console.log(kill);
                    $('.alert').addClass("show");
                    $('.alert').removeClass("hide");
                    $('.alert').addClass("showAlert");
                    setTimeout(function() {
                        $('.alert').removeClass("show");
                        $('.alert').addClass("hide");
                    }, 4000);

                    $('.close-btn').click(function() {
                        $('.alert').removeClass("show");
                        $('.alert').addClass("hide");
                    });
                </script>
            <?php
                unset($_SESSION['status_code']);
                unset($_SESSION['status']);
            

            ?>

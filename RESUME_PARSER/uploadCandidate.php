<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="img/logo5.jpg">
    <title>Super Recruit | Client</title>
    <link rel="stylesheet" href="http://maxst.icon8.com/vue-static/landings/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/sty31.css">
    <link id="bootstrap-css" href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link id="dropzone-css" href="assets/css/dropzone.css" rel="stylesheet">


    <?php include "library/script.php" ?>
    <?php include "library/boostrap.php" ?>
    <style>
       
        .files-container {
            -webkit-transition: all 0.15s ease-in-out;
            -moz-transition: all 0.15s ease-in-out;
            -ms-transition: all 0.15s ease-in-out;
            -o-transition: all 0.15s ease-in-out;
            transition: all 0.15s ease-in-out;
        }

        .full-dark-bg {
            margin: 5% auto;
            background-color: rgba(0, 0, 0, 0.25);
            ;
            padding: 15%;
        }

        .inner-page .section-title {
            font-size: 28px;
            
            position: relative;
        }

        .inner-page .section-sub-title {
            margin-top: 5px;
            
            color: #fff;
        }

        .inner-page .section-sub-title:not(:first-child) {
            margin-top: 35px;
        }
        .containerx {
            height: 200px;
            position: relative;
            border: 3px solid green;
            }

            .vertical-centerx {
            margin: 0;
            position: absolute;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            }
    
    </style>
</head>

<body style="background:#E9E3D7">
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-head">
            <img class="img-profile rounded-circle" src="img/logo2.png" width="90" height="90" alt=""><br><br>
            <span><?php //echo $fetch_info['name'] ?></span><br>
            <span><?php //echo $fetch_info['email'] ?></span>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="home.php"><span class="fas fa-home"></span>
                        <span>Home</span></a>
                </li>
                <li>
                    <a href="client.php"><span class="fas fa-landmark"></span>
                        <span>Client</span></a>
                </li>
                <li>
                    <a href="job.php"><span class="fas fa-briefcase"></span>
                        <span>Jobs</span></a>
                </li>
                <li>
                    <a href="authorization.php"><span class="fas fa-users"></span>
                        <span>Authorization</span></a>
                </li>
                <li>
                    <a href="candidate.php" class="active"><span class="fas fa-user-plus"></span>
                        <span>Candidate</span></a>
                </li>
            </ul>
        </div>
        <div class="sidebar-logout">
            <ul>
                <li>
                    <a href="logout.php"><span class="fas fa-sign-out-alt"></span>
                        <span>Logout</span></a>
                </li>
            </ul>

        </div>
    </div>
    <div class="main-content">
        <header>
            <h4>
                <label for="nav-toggle">
                    <span class="fas fa-bars"></span>
                </label>
            </h4>
            <div class="client-w ml-auto">
                <span style="color: #5757d1;font-weight: 1000;">Super</span>
                <span style="color: #C80000;font-weight: 1000;"> Recruit</span>
            </div>
        </header>
        
        <main>
            <div class="wrapper">
            
                <section class="container-fluid inner-page">
                
                    <div class="row">
                    
                        <div class="full-dark-bg text-center">
                            <!-- Files section -->
                            
                            <h4 class="section-sub-title"><span>Upload</span> Your Files</h4>
                            <div class="align-self-center ">
                                 <div class="custom-file mb-3 ">
                                 <form enctype="multipart/form-data" action="uploadtofolder.php" method="post" target="_blank" >
                                    <input type="file" id="cd_parser_file" name="cd_parser_file" class="custom-file-input">
                                    <label class="custom-file-label">Select File</label><br>
                                    <input type="submit" class="btn btn-primary" value="upload" id="submit" name="submit" onclick="onUpload()"> 
                                    <?php //$xxx = $fetch_info['id']; ?>
                                    <input type="hidden" name="id789" id="id789" value="<?php echo $xxx; ?>">
                                    <!-- <button class="btn btn-primary" onclick="onUpload()">Upload</button> -->
                                </form>
                                                <a href="form/form-display.php" target="_blank"  >
                                                <input type="button" class="btn btn-success" value="Form" >
                                                </a>
                                    <div>
                                        <div>
                                            <div id="identification_output"></div>
                                            
                                        </div>
                                        
                                    </div>
                                        </div>
                                    </div>
                                   
                    <!-- /End row -->
                </section>
            </div>
        </main>

        <footer style="background: #E9E3D7;">
            <div class="container-fluid">
                <p style="color: #000000;">Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> Vanness Plus Consulting Co., Ltd.
                </p>
                <?php //<i class="fa fa-copyright" aria-hidden="true"></i><span style="color: #80888C"> Vanness plus consulting co. ltd</span>
                ?>
            </div>
        </footer>
       
        <script src="assets/js/upload_file_v2.js"></script>
        <script type="text/javascript" language="javascript" src="function/auto.js"></script>
        <script src="assets/js/dropzone.min.js"></script>
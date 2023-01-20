<?php

$target_dir = "uploaded_files/";

$target_file = $target_dir . basename($_FILES["cd_parser_file"]["name"]);

$uploadOk = 1;

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image is real or fake

if(isset($_POST["submit"])) {

    //$check = getimagesize($_FILES["file"]["tmp_name"]);
    $uploadOk = 1;

    /*if($check !== false) {

        echo "File is an image - " . $check["mime"] . ".";

        $uploadOk = 1;

    } else {

        echo "This is not an image file. Please upload another.";

        $uploadOk = 0;

    }*/

}

// Check if file already exists

if (file_exists($target_file)) {

    echo "This file already exists – please upload another.";

    $uploadOk = 0;

}

// Check file size

if ($_FILES["cd_parser_file"]["size"] > 10000000) {

    echo "Your file is too big. Please try again";

    $uploadOk = 0;

}

// Allow certain file formats

/*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"

&& $imageFileType != "gif" ) {

    echo "Only JPG, JPEG, PNG and GIF files are allowed. Please try again";

    $uploadOk = 0;

}*/

// Check if $uploadOk is set to 0 by an error

if ($uploadOk == 0) {

    echo "Your file was not uploaded.";

} else {

    if (move_uploaded_file($_FILES["cd_parser_file"]["tmp_name"], $target_file)) {

        echo "<h2>" . "The file ". basename( $_FILES["cd_parser_file"]["name"]). " has been uploaded." . "</h2>" ;

    } else {

        echo "There was an error uploading your file.";

    }

}

?>
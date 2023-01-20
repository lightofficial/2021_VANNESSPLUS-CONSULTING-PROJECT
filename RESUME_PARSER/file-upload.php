<?php
require('function/connection.php');
session_start();
if (isset($_POST['upload'])) {
    echo $uploadfile = $_FILES['file']['name'];
}

$delete_file = 0;
if (isset($_POST['delete_file'])) {
    $delete_file = $_POST['delete_file'];
}


$targetPath = 'upload/';
$data = file_get_contents($_FILES['file']['tmp_name']);

if (!empty($_FILES) && $delete_file == 0) {

    if (file_exists($targetPath) && is_dir($targetPath)) {

        if (is_writable($targetPath)) {

            $tempFile = $_FILES['file']['tmp_name'];
            $targetFile = $targetPath . $_FILES['file']['name'];

            if (!file_exists($targetFile)) { 
                move_uploaded_file($tempFile, $targetFile);
                if (isset($_POST['canId'])) {
                    $canId = $_POST['canId'];
                    if (file_exists($targetFile)) {
                        
                        $name = $_FILES['file']['name'];
                        $type = $_FILES['file']['type'];
                        $sql = "INSERT INTO candidateresume(tName,mime) VALUES('$name','$type')";
                        $res = mysqli_query($con, $sql);
                        $lastId = mysqli_insert_id($con);
                        $sql2 = "UPDATE candidate SET tId='$lastId' WHERE candidateId='$canId'";
                        $res2 = mysqli_query($con, $sql2);
                        $response = array(
                            'status'    => 'success',
                            'info'      => 'Your file has been uploaded successfully.',
                            'file_link' => $targetFile
                        );
                       
                    } else {
                        $response = array(
                            'status' => 'error',
                            'info'   => 'Couldn\'t upload the requested file :(, a mysterious error happend.'
                        );
                    }
                } else {
                    if (file_exists($targetFile)) {            
                        require('function/connection.php');
                        $name = $_FILES['file']['name'];
                        $type = $_FILES['file']['type'];

                        $sql = "INSERT INTO candidateresume(tName,mime) VALUES('$name','$type')";
                        $res = mysqli_query($con, $sql);
                        $response = array(
                            'status'    => 'success',
                            'info'      => 'Your file has been uploaded successfully.',
                            'file_link' => $targetFile
                        );
                    } else {
                        $response = array(
                            'status' => 'error',
                            'info'   => 'Couldn\'t upload the requested file :(, a mysterious error happend.'
                        );
                    }
                }
            } else {

                $response = array(
                    'status'    => 'error',
                    'info'      => 'A file with the same name is exists.',
                    'file_link' => $targetFile
                );
            }
        } else {
            $response = array(
                'status' => 'error',
                'info'   => 'The specified folder for upload isn\'t writeable.'
            );
        }
    } else {
        $response = array(
            'status' => 'error',
            'info'   => 'No folder to upload to :(, Please create one.'
        );
    }


    echo json_encode($response);
    exit;
}


// Remove file
if ($delete_file == 1) {
    $file_path = $_POST['target_file'];
    if (file_exists($file_path)) {
        unlink($file_path);
        if (!file_exists($file_path)) {
            require('function/connection.php');
            $sql = "DELETE FROM candidateresume WHERE tName='$file_path'";
            $res = mysqli_query($con, $sql);
            $response = array(
                'status' => 'success',
                'info'   => 'Successfully Deleted.'
            );
        } else {
            $response = array(
                'status' => 'error',
                'info'   => 'We screwed up, the file can\'t be deleted.'
            );
        }
    } else {
        $response = array(
            'status' => 'error',
            'info'   => 'Couldn\'t find the requested file :('
        );
    }
    echo json_encode($response);
    exit;
}



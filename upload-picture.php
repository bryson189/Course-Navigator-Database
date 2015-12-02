

<?php
//script based off w3schools tutorial at http://www.w3schools.com/php/php_file_upload.asp
    session_start();
    require('connect.php');
    $target_dir = "assets/uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $success = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $success = 1;
        } else {
            echo "File is not an image.";
            $success = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $success = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 2000000) {
        echo "Sorry, your file is too large.";
        $success = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $success = 0;
    }
    // Check if $success is set to 0 by an error
    if ($success == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $email = $_SESSION['email'];
            if ($_SESSION['usertype'] == 'Professor'){
            mysql_query("UPDATE professor SET picture_location = '$target_file' WHERE email = '$email';");
            }
            else{
            mysql_query("UPDATE tutor SET picture_location ='$target_file' WHERE email = '$email';");   
            }
            header('Location: account-settings.php');
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
?>
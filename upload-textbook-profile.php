<?php
//script based off w3schools tutorial at http://www.w3schools.com/php/php_file_upload.asp
    session_start();
    require('connect.php');

    $sql="INSERT INTO textbook (name, editionnum, isbn, courses)
    VALUES ('$_POST[name]', '$_POST[editionnum]', '$_POST[isbn]', '$_POST[courses]')";
    if (!mysql_query($sql)) {
    die('Error: ' . mysql_error());
    }

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
        // echo "Sorry, file already exists.";
        $success = 1;
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
            $isbn = $_POST['isbn'];
            mysql_query("UPDATE textbook SET picture_location = '$target_file' WHERE isbn = '$isbn';");
            //header('Location: account-settings.php');
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
?>
<?php
if (isset($_POST["submit"])) {

    // Check image using getimagesize function and get size
    // if a valid number is got then uploaded file is an image
    if (isset($_FILES["image"])) {
        // directory name to store the uploaded image files
        // this should have sufficient read/write/execute permissions
        // if not already exists, please create it in the root of the
        // project folder
        $targetDir = "Components/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo '<script>alert("File is not an image.");</script>';
            $uploadOk = 0;
        }
    }

    // Check if the file already exists in the same path
    if (file_exists($targetFile)) {
        echo '<script>alert("Sorry, file already exists.");</script>';
        $uploadOk = 0;
    }

    // Check file size and throw error if it is greater than
    // the predefined value, here it is 500000
    // if ($_FILES["image"]["size"] > 500000) {
    //     echo '<script>alert("Sorry, your file is too large.");</script>';
    //     $uploadOk = 0;
    // }

    // Check for uploaded file formats and allow only 
    // jpg, png, jpeg and gif
    // If you want to allow more formats, declare it here
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");</script>';
        $uploadOk = 0;
    }
}
?>
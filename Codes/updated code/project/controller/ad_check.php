<?php
// error_reporting(0);

// $msg = "";

// If upload button is clicked ...
if (isset($_POST['submit'])) {

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../asset/images/ad_pics/" . $filename;
    $title = $_POST['title'];
    $description = $_POST['ad_description'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $db = mysqli_connect("localhost", "root", "", "check");

    // Get all the submitted data from the form
    $sql = "INSERT INTO ads (ad_title, ad_description, phone, email, ad_photo) VALUES ('$title', '$description', '$phone', '$email', '$filename')";

    // Execute query
    mysqli_query($db, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>&nbsp; Image uploaded successfully!</h3>";
    } else {
        echo "<h3>&nbsp; Failed to upload image!</h3>";
    }
}

?>
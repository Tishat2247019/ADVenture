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
    $current_date = date('Y-m-d');

    
    $sql = "INSERT INTO ads (ad_title, ad_description, phone, email, ad_photo) VALUES ('$title', '$description', '$phone', '$email', '$filename')";
    mysqli_query($db, $sql);
    
    $ad_id = mysqli_insert_id($db);
    echo $current_date;
    
    $sql1 = "insert into ad_statistics(id, date_posted) values ('$ad_id','$current_date')";
    mysqli_query($db, $sql1);

    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>&nbsp; Image uploaded successfully!</h3>";
    } else {
        echo "<h3>&nbsp; Failed to upload image!</h3>";
    }
}

?>
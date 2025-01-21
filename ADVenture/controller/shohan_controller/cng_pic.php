<?php
require_once("../../model/usermodel.php");

    $user_id = $_POST['user_id'];
    $new_pic = $_FILES["new-photo"]["name"];
    $tempname = $_FILES["new-photo"]["tmp_name"];
    $folder = "../../asset/images/profile_pics/" . $new_pic;
    move_uploaded_file($tempname, to: $folder);
    
    $user_info = user_info($user_id);

    $old_profile_pic = $user_info['profile_pic'];

    $result = change_user_pic($user_id, $new_pic);
    
    if ($result) {
        // Delete the old profile picture if it exists and is not a default placeholder
        $old_pic_path = "../../asset/images/profile_pics/" . $old_profile_pic;
        unlink($old_pic_path); // Deletes the file
        // echo "Profile picture updated successfully!";
        header("location:../../view/opi_features/menu/advertiser_menu.php?id={$user_id}");
        }
    else{
        header("location:../../view/shohan_features/profile_advertiser/cng_pro_pic.php?id={$user_id}");
        
    }
    
    // echo "<a href='../../view/shohan_features/profile_advertiser/cng_pro_pic.php?id={$user_id}'>Go Back</a>";



?>
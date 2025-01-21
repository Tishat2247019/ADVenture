<?php
require_once("../../model/usermodel.php");

    $user_id = $_POST['user_id'];
    $new_pic = $_FILES["new_photo"]["name"];
    $tempname = $_FILES["new_photo"]["tmp_name"];
    $folder = "../../asset/images/profile_pics/" . $new_pic;
    move_uploaded_file($tempname, to: $folder);
    
    $user_info = user_info($user_id);
    $old_profile_pic = $user_info['profile_pic'];
    
    $result = change_user_pic($user_id, $new_pic);

    
    if ($result) {
        $old_pic_path = "../../asset/images/profile_pics/" . $old_profile_pic;
        unlink($old_pic_path);
        echo "Profile picture updated successfully!";
        }
    else{
        echo "failed to updated profile pics";
    }
    
    echo "<a href='../../view/opi_features/profile/cng_profile_pic.php?id={$user_id}'>Go Back</a>";



?>

<?php

require_once("../../model/usermodel.php");

$new_username = $_REQUEST['username'];
$new_email = $_REQUEST['email'];
$user_id =  $_REQUEST['id'];

 $result = edit_profile($user_id, $new_username, $new_email);

 if($result){
    echo "Your Profile is successfully Edited";
 }
else{
    echo "There is some error while editing your profile";
}


?>
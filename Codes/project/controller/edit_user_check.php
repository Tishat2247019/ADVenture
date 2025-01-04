<?php
$idd = $_REQUEST['id'];
$idt =  $_REQUEST['idt'];
require_once("../model/usermodel.php");

$name = $_REQUEST['username'];
$email = $_REQUEST['email'];
$type = $_REQUEST['type'];
$status = $_REQUEST['status'];

$destination = $_REQUEST['destination'];

$new_name = ($name === empty(trim($_POST['new_username']))) ? $name : trim($_POST['new_username']);
$new_email = ( empty(trim($_POST['new_email']))) ? $email : trim($_POST['new_email']);
$new_type = (empty(trim($_POST['new_type']))) ? $type : trim($_POST['new_type']);
$new_status = (empty(trim($_POST['new_status']))) ? $status : trim($_POST['new_status']);

$result = edit_user($idt, $new_name, $new_email, $new_type ,$new_status);
if($result){
    echo "User Information has been edited";
}
else{
    echo "There is some error.Can not Edit";
}   
?>

<!-- <a href="../view/tishat_features/manage_users/view_users.php?id=<?php echo $idd ?>"> Go Back</a> -->
<a href="<?php echo $destination ?>"> Go Back</a>
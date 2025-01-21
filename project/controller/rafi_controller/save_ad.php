<?php
require_once '../../model/saved_ad_model.php';

$ad_id = $_REQUEST['ad_id'];
$user_id= $_REQUEST['user_id'];
$result = save_ad($user_id, $ad_id);
if($result){
    echo "success";
}
else{
    echo "failed";
}


?>
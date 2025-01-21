<?php
$idt = $_REQUEST['idt'];
require_once("admodel.php");
require_once("ads_statisticsmodel.php");

$result = delete_ad($idt);
$result1 = delete_ad_statistics($idt);
if ($result && $result1) {
    $msg1 = array("success" => true, "message" => "Ad {$idt} successfully deleted.");
    echo json_encode($msg1);
} else {
    $msg2 = array("success" => false, "message" => "Error deleting AD");
    echo json_encode($msg2);
    
}
?>




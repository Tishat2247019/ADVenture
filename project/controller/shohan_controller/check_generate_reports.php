<?php
session_start();
require_once("../../../model/usermodel.php");
require_once("../../../model/admodel.php");

if (!isset($_SESSION['status'])) {
    header('location: login.html');
    exit;
}

if (isset($_POST['download_report'])) {
    $ad_id = $_POST['ad-title'];
    $report_type = $_POST['report-type'];

    if ($report_type !== ".txt") {
        echo "Invalid file format. Only .txt is supported.";
        exit;
    }

    $ad_info = ad_info($ad_id);

    if ($ad_info) {
        $txt_content = "Ad Report\n";
        $txt_content .= "=====================\n";
        $txt_content .= "Ad Title: " . $ad_info['ad_title'] . "\n";
        $txt_content .= "Description: " . $ad_info['ad_description'] . "\n";
        $txt_content .= "Phone: " . $ad_info['phone'] . "\n";
        $txt_content .= "Email: " . $ad_info['email'] . "\n";
        $txt_content .= "Price: " . $ad_info['price'] . "\n";
        $txt_content .= "Category: " . $ad_info['category'] . "\n";

        $filename = "ad_report_" . $ad_id . ".txt";

        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . strlen($txt_content));

        echo $txt_content;

        exit;
    } else {
        echo "Ad not found.";
        exit;
    }
}
?>

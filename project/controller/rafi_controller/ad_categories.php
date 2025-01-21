<?php
require_once '../../model/usermodel1.php';
echo "
    <html>
    <head>
        <link rel='stylesheet' type='text/css' href='../../asset/css/rafi_css_files/ad_categories2.css'>
    </head>
    <body>";

$filter = isset($_GET['filter']) ? $_GET['filter'] : null;
$value = isset($_GET['value']) ? $_GET['value'] : null;

if ($filter === 'category' && $value) {
    $ads = getAdsByCategory($value);

    if (empty($ads)) {
        echo '<h3>No ads found in this category.</h3>';
    } else {
        echo '<h3>Ads in category: ' . $value . '</h3>';
        echo '<table border="1" align="center">';
        echo '<tr><th>Title</th><th>Description</th><th>Price</th><th>Contact</th></tr>';

        foreach ($ads as $ad) {
            echo '<tr>';
            echo '<td>' . $ad['ad_title'] . '</td>';
            echo '<td>' . $ad['ad_description'] . '</td>';
            echo '<td>' . $ad['price'] . '</td>';
            echo '<td>' . $ad['email'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }
} else {
    echo '<h3>Invalid category filter.</h3>';
}
?>
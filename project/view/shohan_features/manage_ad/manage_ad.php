<?php
$user_id = $_REQUEST["id"];
?>

<html>
<head>
    <title>Manage Ads</title>
    <link rel="stylesheet" href="../../../asset/css/shohan_css_files/manage_ad.css">
</head>
<body>
    <div class="form-container">
        <h1>Manage Ad</h1>
        <form action="" method="">
            <div>
                <label for="ad-title">Search Ad by Title</label>
                <input type="text" id="ad-title" name="ad-title" placeholder="Enter Ad Title">
            </div>
            <input type="submit" value="Edit Ad">
            <input type="submit" value="Delete Ad">
            <input type="submit" value="Go Back" onclick="window.history.back(); return false;">
        </form>
    </div>
</body>
</html>
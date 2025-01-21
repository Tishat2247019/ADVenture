<?php
$user_id = $_REQUEST["id"];
?>
<html>
<head>
    <title>Create Ad</title>
    <link rel="stylesheet" href="../../../asset/css/shohan_css_files/ad.css">
</head>
<body>

    <form action="../../../controller/shohan_controller/ad_check.php" method="post" enctype="multipart/form-data" id="create_ad_form">
        <h1>Create an Ad</h1>

        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">


        <label for="ad_category">Ad Category</label>
        <select name="ad_category" id="ad_category">
            <option value="All">All</option>
            <option value="Electronics">Electronics</option>
            <option value="Education">Education</option>
            <option value="Mobile">Mobiles</option>
            <option value="Agriculture">Agriculture</option>
            <option value="Property">Property</option>
            <option value="Daily living">Daily Living</option>
            <option value="Diverse">Diverse</option>
        </select>

        <label for="uploadfile">Upload Image</label>
        <input type="file" name="uploadfile" id="uploadfile">

        <label for="title">Ad Title</label>
        <input type="text" name="title" id="title">

        <label for="ad_description">Ad Description</label>
        <textarea id="ad_description" cols="56" rows="8" name="ad_description" form="create_ad_form"></textarea>

        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone">

        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <label for="price">Price</label>
        <input type="number" name="price" id="price" min="0">

        <button type="submit" name="submit">Submit</button>
        <button type="gsubmit" name="go_back">Go Back</button>

    </form>
</body>
</html>

<?php
require_once("../../../model/usermodel.php");
    $user_id = $_REQUEST["id"];
    $user_info = user_info($user_id);
    $profile_pic = $user_info['profile_pic'];
?>

<html>
<head>
    <title>Change Advertiser Profile Photo</title>
    <link rel="stylesheet" href="../../../asset/css/shohan_css_files/cng_pro_pic.css">
</head>
<body>

    <div class="form-container">
        <h1>Change Profile Photo</h1>
        <form action="../../../controller/shohan_controller/cng_pic.php" method="POST" enctype="multipart/form-data">
            <div class="form-section">
                <label for="new-photo">Upload New Profile Photo</label>
                <input type="file" id="new-photo1" name="new-photo" accept="image/*">
                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
            </div>

            <div class="form-section">
                <label>Current Photo</label>
                <img id="current-photo" alt="Current Profile Photo" src="../../../asset/images/profile_pics/<?php echo $profile_pic ?>" alt="" height=150px">
            </div>

            <button type="submit">Save Changes</button>
            <button type="button" onclick="history.back()">Go Back</button>
        </form>
    </div>
</body>
</html>
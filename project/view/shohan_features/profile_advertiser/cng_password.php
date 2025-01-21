<?php 
$user_id = $_REQUEST['id'];

?>

<html>
<head>
    <title>Change Advertiser Password</title>
    <link rel="stylesheet" href="../../../asset/css/shohan_css_files/cng_password.css">      
</head>
<body>

    <div class="form-container">
        <h1>Change Password</h1>
        <form action="../../../controller/shohan_controller/check_password.php" method="post">
            <div class="form-section">
                <label for="current-password">Enter Current Password</label>
                <input type="password" id="current-password" name="current_password" required>
            </div>
            <div class="form-section">
                <label for="new-password">Enter New Password</label>
                <input type="password" id="new-password" name="new_password" required>
            </div>
            <div class="form-section">
                <label for="confirm-password">Confirm New Password</label>
                <input type="password" id="confirm-password" name="confirm_new_password" required>
            </div>
            <button type="submit">Submit</button>
            <button type="button" onclick="window.history.back();">Go Back</button>
        </form>
    </div>

</body>
</html>
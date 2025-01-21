<?php
session_start();
require_once("../../../model/usermodel.php");
require_once '../../../model/saved_ad_model.php';
if($_SESSION['status'] == true){
$idd = $_REQUEST['id'];
$user_info = user_info($idd);
$name = $user_info['username'];
$saved_ads= show_saved_ad($idd);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../asset/css/opi_css_files/user_db.css">
    <link rel="icon" type="image/x-icon" href="../../../asset/images/logo/ad.svg">
    <title>User Dashboard</title>
</head>
<body>
    <div class="main_container">
        <div class="container">
            <header class="header">
                <div class="logo_container">
                <img src="../../../asset/SVG/adventure.svg" alt="adventure logo" height="40px">
                </div>
            </header>
            <div class="welcome_menu">
                <h1>User's Dashboard</h1>
            </div>
            <div class="welcome_user">
                <h2>Hello, <span class="username"><?php echo $name; ?></span>!</h2>
                <div class="dashboard"></div>

                <div class="section">
                    <h2>Saved Ads</h2>
                    <ul>
                        <?php while($saved_ad=mysqli_fetch_assoc($saved_ads)){
                        
                        ?>
                        
                        <li><a href="../../../controller/rafi_controller/ad_details.php?user_id=<?php echo $idd; ?>&id=<?php echo $saved_ad['ad_id'] ?>"><?php echo $saved_ad['ad_id'] ?> View Details</a></li>
                        <?php

                        } ?>
                    </ul>
                </div>
            <section align="center" class="backbutton">
            <a href="../menu/user_menu.php?id=<?php echo $idd; ?>">Go Back</a>
        </section>
        </div>

        <footer>
        <div class="footer-container" align="center">
            <div class="footer-section">
                <h4>More from Us</h4>
                <ul>
                    <li><a href="">Our Portfolio</a></li>
                    <li><a href="">Success Stories</a></li>
                    <li><a href="">Partners & Affiliates</a></li>
                    <li><a href="">Subscribe for Updates</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Help & Support</h4>
                <ul>
                    <li><a href="">FAQs</a></li>
                    <li><a href="">Stay Safe</a></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Report an Issue</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>About ADVenture</h4>
                <ul>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Meet the Team</a></li>
                    <li><a href="">Careers</a></li>
                    <li><a href="">Terms and Conditions</a></li>
                    <li><a href="">Privacy policy</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Guidelines</h4>
                <ul>
                    <li><a href="">Getting Started</a></li>
                    <li><a href="">Best Practices</a></li>
                    <li><a href="">Do's and Don'ts</a></li>
                </ul>
                <div class="social-icons">
                    <a href="https://www.facebook.com/"><img src="../../../asset/images/opi_images/features_pics/fb-icon.png"
                            alt="Facebook"></a>
                    <a href="https://x.com/?lang=en"><img src="../../../asset/images/opi_images/features_pics/x-icon.png"
                            alt="Twitter"></a>
                    <a href="https://www.tiktok.com/login"><img src="../../../asset/images/opi_images/features_pics/tiktok-icon.png"
                            alt="TikTok"></a>
                    <a href="https://www.youtube.com/"><img src="../../../asset/images/opi_images/features_pics/youtube-icon.png"
                            alt="YouTube"></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025. All rights reserved. ADVenture</p>
        </div>
    </footer>

</body>
</html>

<?php }
else{
    header("locatoin:../auth_feature/signin.html");
    // echo "hello";
} ?>
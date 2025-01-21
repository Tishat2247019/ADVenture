<?php
require_once("../../../model/usermodel.php");
require_once("../../../model/ads_statisticsmodel.php");
require_once("../../../model/admodel.php");
$idd = $_REQUEST['id'];
$row = user_info($idd);
$flagged_ads = view_flaggged_ad();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flagged ADs</title>
    <link rel="stylesheet" href="../../../asset/css/opi_css_files/flag_con.css">
    <link rel="icon" type="image/x-icon" href="../../../asset/images/logo/ad.svg">

</head>
<body>
    <div class="container">
        <h1>Flagged ADs</h1>
        <table class="flagged-content-table">
            <thead>
                <tr>
                    <th>AD ID</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while($flagged_ad = mysqli_fetch_assoc($flagged_ads)){
             $ad_info=ad_info($flagged_ad['id']) ?>     
            <tr>
                    <td><?php echo $flagged_ad['id']?></td>
                    <td><a href="" class="view-link"><?php echo $ad_info['ad_title']; ?></a></td>
                    <td>
                        <button class="review-btn">Review Content</button>
                        <button class="approve-btn">Approve</button>
                        <button class="reject-btn">Reject</button>
                        <button class="delete-btn">Delete</button>
                    </td>
                </tr>
                <?php 
            }
                ?>
               
               
            </tbody>
        </table>
        <section align="center" class="backbutton">
        <a href="../menu/admin_menu.php?id=<?php echo $idd ?>">Go Back</a>
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
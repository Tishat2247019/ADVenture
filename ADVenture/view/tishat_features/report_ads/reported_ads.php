<?php
session_start();
require_once('../../../model/usermodel.php');

if($_SESSION['status'] == true){   
    $idd = $_REQUEST['id'];
    $admin_info = user_info($idd);
    $admin_name = $admin_info['username'];
    $admin_photo = $admin_info['profile_pic'];

}

?>

<html>
    <head>
        <title>Reported AD Page</title>
    <link rel="stylesheet" href="../../../asset/css/reported_ads.css">
    <link rel="icon" type="image/x-icon" href="../../../asset/images/logo/ad.svg">

    </head>
    <body>


    <div class="main_container">
        <div class="container">
            <div class="header">
                <div class="page_name">
                    <img src="../../../asset/images/ad.png" alt="">
                    <p>Reported AD Page</p>
                    <a href="../../opi_features/dashboard/admin_db.php?id=<?php echo  $idd; ?>">Go Back</a>
                </div>
                <div class="page_about">
                <h1>Display all the reported ADs</h1>
                    
                </div>
                <div class="admin_name">
                    <div class="image_container">
                    <img src="../../../asset/images/profile_pics/<?php echo $admin_photo; ?>" alt="" height="40px"> 
                    </div>
                    <p>Hello, <?php echo $admin_name  ?></p>
                </div>
            </div>


            <div class="left">
                
                <div class="user_info_container">
                </div>
                    
                </div>
                
                <div class="right">
    
                

<div class="ad_info_container">

    
   

</div>



</div>
            <div class="footer"><img src="../../../asset/SVG/white_adventure.svg" alt="" height="70px"></div>

            <div id="confirmPopup" class="popup">
                <div class="popup-content">
                    <p id="popupMessage"></p>
                    <div class="button_container">
                        <button id="confirmYes" onclick="confirmDelete1(event)">Yes</button>
                        <button id="confirmNo">No</button>
                        <button id="confirmOk"> OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../asset/js/reported_ads.js"></script>

    </body>
</html>
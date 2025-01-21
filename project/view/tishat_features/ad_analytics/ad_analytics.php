<?php
    session_start();
    require_once("../../../model/usermodel.php");
    require_once("../../../model/admodel.php");
    if(!isset($_SESSION['status'])){
        header('location: login.html'); 
    }
    $idd = $_REQUEST['id'];
    // $adv_name2= $user_info2['username'];

    $result1 = show_ads();
    $result2 = show_ads();

    $user_info = user_info($idd);
    $name = $user_info['username'];
?>
<html>
<html>
<head>
    <title>AD Analytics Page</title>
    <link rel="stylesheet" href="../../../asset/css/ad_analytic.css">
    <link rel="icon" type="image/x-icon" href="../../../asset/images/logo/ad.svg">
</head>
<body>
    <div class="main_container">
        <div class="container">
            <div class="header">
                <div class="page_name">
                    <img src="../../../asset/images/analytics.png" alt="">
                    <p>AD Analytics Page</p>
                </div>

                <div class="adventure_name">
                    <img src="../../../asset/SVG//white_adventure.svg" alt="">
                </div>
                <div class="admin_name">
                    <div class="image_container">
                        <img src="../../../asset/images/TOWSIF_PIC.jpg" alt="">
                    </div>
                    <p>Hello , <?php echo $name ?></p>
                </div>
            </div>
            <div class="left">
                <div class="logo_cotainer">
                    <img src="../../../asset/SVG/white_ad.svg" alt="">
                </div>
                <div class="admin_menu_container">
                <div>
                    <a href="../../opi_features/Dashboard/admin_db.php?id=<?php echo $idd ?>">
                            <img src="../../../asset/images/dashboard.png" alt="">
                            Dashboard
                        </a>
                    </div>
                    <div>
                    <a href="../manage_ads/manage_ad.php?id=<?php echo $idd ?>">
                            <img src="../../../asset/images/ad.png" alt="">
                            Manage ADs
                        </a>
                    </div>
                    <div>
                        <a href="../manage_users/view_users.php?id=<?php echo $idd ?>">
                            <img src="../../../asset/images/users.png" alt="">
                            View User
                        </a>
                    </div>
                    <div>
                        <a href="../manage_users/manage_users.php?id=<?php echo $idd ?>">
                            <img src="../../../asset/images/manage_users.png" alt="">
                            Manage Users
                        </a>
                    </div>
                    <div>
                        <a href="../manage_advertisers/view_advertisers.php?id=<?php echo $idd ?>">
                            <img src="../../../asset/images/advs.png" alt="">
                            View Advertisers
                        </a>
                    </div>
                    <div>
                        <a href="../manage_advertisers/manage_advertisers.php?id=<?php echo $idd ?>">
                            <img src="../../../asset/images/manage_advs.png" alt="">
                            Manage Advertisers
                        </a>
                    </div>
                    <div>
                        <a href="../ad_analytics/ad_analytics.php?id=<?php echo $idd ?>">
                            <img src="../../../asset/images/analytics.png" alt="">
                            AD Analytics
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="../../../asset/images/flag.png" alt="">
                            Flagged Content
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="../../../asset/images/report.png" alt="">
                            Generate Report
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="../../../asset/images/change_pass.png" alt="">
                            Change Password
                        </a>
                    </div>
                    <div class="go_back">
                    <a href="../../opi_features/menu/admin_menu.php?id=<?php echo $idd ?>"> 
                        <img src="../../../asset/images/back.png" alt="">Go Back</a> 
                    </div>

                </div>
            </div>
            
            <div class="middle">
                <form action="">
                    <div class="ad_analytic_contatiner">
                        <div class="search_container">
                            <div class="search_ad_container">
                                <img src="../../../asset/images/search.png" alt="">
                                <p>Search AD</p>
                            </div>
                            <div class="search_input_container">
                                <input type="text">
                                <button>search</button>
                            </div>
                        </div>

                        <div class="choose_ads_container">
                            <div class="choose_first_ad_container">
                                <p>Choose First Ad</p>
                                <select name="" id="" onchange="display_ad(event, this.value, null)">
                                    <option value="" disabled selected>choose</option>
                                    <?php while($row = mysqli_fetch_assoc($result1)){
                                    ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['id'] ?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="choose_second_ad_container">
                            <p>Choose Second Ad</p>
                                <select name="" id="" onchange="display_ad(event,null, this.value)">
                                    <option value="" disabled selected>choose</option>
                                    <?php while($row = mysqli_fetch_assoc($result2)){
                                    ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['id'] ?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="right">
            <div class="manage_ad_container">
                <div class="table_container">
                    <div class="choose_ad_text_container">
                        Please choose Two Ads to compare
                    </div>
                    <div class="first_table_container">
                    </div>

                    <div class="second_table_container">
                    
                    </div>
                    <div class="third_table_container">
                    </div>
                    
                </div>
                </div>
                </div>
            </div>
            <div class="footer"></div>
        </div>
    </div>

    <script src="../../../asset/js/ad_analytics.js"></script>


</body>
</html>
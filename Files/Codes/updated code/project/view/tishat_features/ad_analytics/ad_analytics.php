<?php
    session_start();
    require_once("../../../model/usermodel.php");
    require_once("../../../model/admodel.php");
    if(!isset($_SESSION['status'])){
        header('location: login.html'); 
    }
    $idd = $_REQUEST['id'];
      // while($row = mysqli_fetch_assoc($result)){
    //     echo "<br>";
    //     print_r($row);
    // }
    $result = show_ads();
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
                        <img src="../../../asset/images/dashboard.png" alt="">
                        <button>Dashboard</button>
                    </div>
                    <div>
                        <img src="../../../asset/images/ad.png" alt="">
                        <button>Manage ADs</button>
                    </div>
                    <div>
                        <img src="../../../asset/images/users.png" alt="">
                        <button>View User</button>
                    </div>
                    <div>
                        <img src="../../../asset/images/manage_users.png" alt="">
                        <button>Manage Users</button>
                    </div>
                    <div>
                        <img src="../../../asset/images/advs.png" alt="">
                        <button>View Advertiesers</button>

                    </div>
                    <div>
                        <img src="../../../asset/images/manage_advs.png" alt="">
                        <button>Manage ADvertisers</button>

                    </div>
                    <div>
                        <img src="../../../asset/images/analytics.png" alt="">
                        <button>AD Analytics </button>
                    </div>
                    <div>
                        <img src="../../../asset/images/settings.png" alt="">
                        <button>System settings</button>

                    </div>
                    <div>
                        <img src="../../../asset/images/flag.png" alt="">
                        <button>Flagged Content</button>

                    </div>
                    <div>
                        <img src="../../../asset/images/report.png" alt="">
                        <button>Generate Report </button>

                    </div>
                    <div>
                        <img src="../../../asset/images/change_pass.png" alt="">
                        <button>Change Password </button>

                    </div>
                    <div class="go_back">
                        <a href="../../dashboard/admin_menu.php?id=<?php echo $idd ?>"> <button>
                        <img src="../../../asset/images/back.png" alt=""></button>Go Back</a> 
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

                        <div class="filter_range_container">
                            <div class="filter_ad_range_container">
                                <img src="../../../asset/images/range.png" alt="">
                                <p>Filter Ads by range</p>
                            </div>
                            <div class="filter_options_range_container">
                                <input type="range">
                            </div>
                        </div>

                        <div class="filter_container">
                            <div class="filter_ad_container">
                                <img src="../../../asset/images/filter_ad.png" alt="">
                                <p>Filter AD by category</p>
                            </div>
                            <div class="filter_options_container">
                                <select name="" id="">
                                    <option value="electronic">Electronics</option>
                                    <option value="education">Education</option>
                                    <option value="mobile">Mobiles</option>
                                    <option value="agriculture">Agriculture</option>
                                    <option value="property">Property</option>
                                    <option value="daily_living">Daily Living</option>
                                    <option value="diverse">Diverse</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="right">
            <div class="manage_ad_container">
                <div class="table_container">
                <table  cellspacing="0"  class="ad_table">
                <tr  align="center">
                <th>AD ID</th>
                <th>Adv Name</th>
                <th>Title</th>
                <th>Description</th>
                <th>Ad Photo</th>
                <th>Price</th>
                <th>Category</th>
                <th colspan="2">Action</th>
                
            </tr>
            <?php 
                 while($row = mysqli_fetch_assoc($result)){
                $adv_id = $row['user_id'];
                $user_info =  user_info($adv_id);
                $adv_name = $user_info['username']
                //echo "<br>";
                //print_r($row);
                // }
            ?>
            <tr align="center">
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $adv_name ?> </td>
                <td><?php echo $row['ad_title']; ?></td>
                <td id="ad_description"><?php echo $row['ad_description']; ?></td>
                <td>
                    <div class="ad_photo_container">

                        <img src="../../../asset/images/ad_pics/<?php echo $row['ad_photo']; ?>" alt="" >
                    </div>
                 </td>
                <td><?php echo $row['price']; ?></td>
                <td>Category</td>
                
                <td>    
                        <a href="edit_users.php?id=<?php echo $idd?>&idt=<?php echo $row['user_id']?>"> <img src="../../../asset/images/view_users_icons/edit2.ico" alt=""> </a> 
                    
                </td>
                <td>
                    
                        <a id="delete_user" href="../../../model/delete_user.php?id=<?php echo $idd?>&idt=<?php echo $row['user_id']?>"> <img src="../../../asset/images/view_users_icons/delete.ico" alt=""> </a> 
                   
                </td>
                <?php } ?>
            </tr>
                </table>
                </div>
                </div>
                </div>
            </div>
            <div class="footer"></div>
        </div>
    </div>

</body>
</html>
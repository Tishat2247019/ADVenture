<?php
    session_start();
    require_once("../../../model/usermodel.php");
    if(!isset($_SESSION['status'])){
        header('location: ../../../signin/signin.html'); 
    }
    $idd = $_REQUEST['id'];
    $result = show_users();
      // while($row = mysqli_fetch_assoc($result)){
    //     echo "<br>";
    //     print_r($row);
    // }
    $user_info = user_info($idd);
    $name = $user_info['username'];
?>
<html>
<html>
<head>
    <title>Manage Advertisers Page</title>
    <link rel="stylesheet" href="manage_advertiser.css">
    <link rel="icon" type="image/x-icon" href="../../../asset/images/logo/ad.svg">
</head>
<body>
    <div class="main_container">
        <div class="container">
            <div class="header">
                <div class="page_name">
                    <img src="../../../asset/images/manage_advs.png" alt="">
                    <p>Manage Advertisers Page</p>
                </div>
                <div class="adventure_name">
                    <img src="../../../SVG//white_adventure.svg" alt="">
                </div>
                <div class="admin_name">
                    <div class="image_container">
                        <img src="../../../asset/images/TOWSIF_PIC.jpg" alt="">
                    </div>
                    <p>Hello, <?php echo $name ?></p>
                </div>
            </div>
            <div class="left">
                <div class="logo_cotainer">
                    <img src="../../../SVG/white_ad.svg" alt="">
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
                    <div class="advs_manage_contatiner">
                        <div class="search_container">
                            <div class="search_advs_container">
                                <img src="../../../asset/images/search.png" alt="">
                                <rtiser>Search Advertisers</p>
                            </div>
                            <div class="search_input_container">
                                <input type="text">
                                <button>search</button>
                            </div>
                        </div>

                       
                        <div class="filter_container">
                            <div class="filter_advs_container">
                                <img src="../../../asset/images/filter_user.png" alt="">
                                <p>Filter Advertisers by category</p>
                            </div>
                            <div class="filter_options_container">
                                <select name="" id="">
                                    <option value="Fashion">Fashion</option>
                                    <option value="Technology">Technolgy</option>
                                    <option value="Science">Science</option>
                                </select>
                            </div>
                        </div>

                        <div class="view_ad_campaign_container">
                            <button>
                                <a href="">
                                View AD Campaign
                                </a>
                            </button>
                        </div>

                        <div class="view_profile_details_container">
                        
                            <button>
                                <a href="">
                                View Business Profile Details
                                </a>
                            </button>
                        </div>

                        <div class="manupulate_container">
                        
                            <button>
                                <a href="">
                                Manage Status
                                </a>
                            </button>
                            
                            <button>
                            <a href="">
                            Edit Information
                            </a> </button>
                            
                        </div>

                        <div class="ban_unban_container">
                        
                            <button>
                                <a href="">
                                 Ban
                                </a>
                            </button>
                            
                            <button>
                            <a href="">
                            Unban
                            </a> </button>
                            <button>

                            <a href="">
                            Delete 
                            </a> </button>
                            
                        </div>

                    </div>
                </form>
            </div>
            <div class="right">
                <div class='all_user_container'>
                <table border=1 cellspacing="0" align="center" width="50%">
            <tr align="center">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th colspan="2">Action</th>
                
            </tr>
            <?php 
                 while($row = mysqli_fetch_assoc($result)){
                 if($row['type'] == 'Advertiser'){
                //echo "<br>";
                //print_r($row);
                // }
            ?>
            <tr align="center">
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['type']; ?></td>
                <td>
                    <button>
                        <a href="edit.php?id=<?php echo $idd?>&idt=<?php echo $row['id']?>"> EDIT </a> 
                    </button>
                </td>
                <td>
                    <button>
                        <a href="../model/delete_user.php?id=<?php echo $idd?>&idt=<?php echo $row['id']?>"> DELETE </a> 
                    </button>
                </td>
                <?php }} ?>
            </tr>
                </table>
                </div>
            </div>
            <div class="footer"></div>
        </div>
    </div>

</body>
</html>
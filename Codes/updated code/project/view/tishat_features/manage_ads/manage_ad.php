<?php
    session_start();
    require_once("../../../model/usermodel.php");
    require_once("../../../model/admodel.php");

    if(!isset($_SESSION['status'])){
        header('location: login.html'); 
    }
    $idd = $_REQUEST['id'];
    //$status_filter = isset($_GET['status']) ? $_GET['status'] : 'all';
   // $result = show_users($status_filter);
      // while($row = mysqli_fetch_assoc($result)){
    //     echo "<br>";
    //     print_r($row);
    // }
    $result = show_ads();
    $user_info = user_info($idd);
    $name = $user_info['username'];
?>
<html>
<head>
    <title>Manage Ad Page</title>
    <link rel="stylesheet" href="../../../asset/css/manage_ad.css">
    <link rel="icon" type="image/x-icon" href="../../../asset/images/logo/ad.svg">
</head>
<body>
    <div class="main_container">
        <div class="container">
            <div class="header">
                <div class="page_name">
                    <img src="../../../asset/images/ad.png" alt="">
                    <p>Mange ADs Page</p>
                </div>
                <div class="adventure_name">
                    <img src="../../../asset/SVG//white_adventure.svg" alt="">
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
                    <div class="ad_manage_contatiner">
                        <div class="search_container">
                            <div class="search_ad_container">
                                <img src="../../../asset/images/search.png" alt="">
                                <p>Search AD</p>
                            </div>
                            <div class="search_input_container">
                                <input type="text" onkeyup="ad_based_catecogry(event, null, this.value)">
                                <button>search</button>
                            </div>

                        </div>

                        <div class="filter_container">
                            <div class="filter_ad_container">
                                <img src="../../../asset/images/filter_ad.png" alt="">
                                <p>Filter AD by category</p>
                            </div>
                            <div class="filter_options_container">
                                <select name="" id="ad_category" onchange="ad_based_catecogry(event, this.value, null)">
                                    <option value="All">All</option>
                                    <option value="Electronics">Electronics</option>
                                    <option value="Education">Education</option>
                                    <option value="Mobile">Mobiles</option>
                                    <option value="Agriculture">Agriculture</option>
                                    <option value="Property">Property</option>
                                    <option value="Daily living">Daily Living</option>
                                    <option value="Diverse">Diverse</option>
                                </select>
                            </div>
                        </div>

                        <div class="pending_container">
                            <div class="pending_ad_container">
                                <img src="../../../asset/images/pending_ads.png" alt="">
                            </div>
                            <div class="pending_ad_view">
                                <button>
                                    <a href="">View Pending ADs</a><br>
                                </button>
                            </div>
                        </div>
                        <div class="statistics_container">
                            <div class="statistics_ad_container">
                                <img src="../../../asset/images/statistics.png" alt="">
                            </div>
                            <div class="statistics_ad_view">
                                <button>
                                    <a href="">View ADs Stastics </a><br>
                                </button>
                            </div>
                        </div>

                        <div class="manupulate_ad_container">
                            <button>Approve ADs</button><br>
                            <button>Edit AD Details </button><br>
                        </div>
                        <div class="delete_ad_container">
                            <button>Delete AD</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="right">
                <div class="manage_ad_container">
                <div class="table_container">
                <table  cellspacing="0"  class="ad_table">
                <thead>
                    <tr  align="center" id="table_header">
                        <th>AD ID</th>
                        <th>Adv Name</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Ad Photo</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                
          
                </table>
                </div>
                </div>
            </div>
            <div class="footer"></div>
        </div>
    </div>

    <script src="../../../asset/js/manage_ad.js"></script>


</body>
</html>
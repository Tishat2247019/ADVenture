<?php
    session_start();
    require_once("../../../model/usermodel.php");
    if(!isset($_SESSION['status'])){
        header('location: ../../../signin/signin.html'); 

    }
    $idd = $_REQUEST['id'];
    // $status_filter = isset($_GET['status']) ? $_GET['status'] : 'all';
    // $result = show_users($status_filter);
    // while($row = mysqli_fetch_assoc($result)){
    //     echo "<br>";
    //     print_r($row);
    // }
    $user_info = user_info($idd);
    $name = $user_info['username'];
    $admin_photo = $user_info['profile_pic'];
?>
<html>
<head>
    <title>View Users Page</title>
    <link rel="stylesheet" href="../../../asset/css/view_users.css">
    <link rel="icon" type="image/x-icon" href="../../../asset/images/logo/ad.svg">
</head>
<body>
    <div class="main_container">
        <div class="container">
            <div class="header">
                <div class="page_name">
                    <img src="../../../asset/images/ad.png" alt="">
                    <p>View Users Page</p>
                </div>
                <div class="adventure_name">
                    <img src="../../../asset/SVG//white_adventure.svg" alt="">
                </div>
                <div class="admin_name">
                    <div class="image_container">
                    <img src="../../../asset/images/profile_pics/<?php echo $admin_photo; ?>" alt="" height="40px"> 
                    </div>
                    <p>Hello, <?php echo $name   ?></p>
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
                        <a href="../manage_ads/manage_ad.php?id=<?php echo $idd ?>">Manage ADs</a>
                    </div>
                    <div>
                        <img src="../../../asset/images/users.png" alt="">
                        <button>View User</button>
                    </div>
                    <div>
                        <img src="../../../asset/images/manage_users.png" alt="">
                        <a href="./manage_users.php?id=<?php echo $idd ?>">Manage Users</a>
                    </div>
                    <div>
                        <img src="../../../asset/images/advs.png" alt="">
                        <a href="../manage_advertisers/view_advertisers.php?id=<?php echo $idd ?>">View Advertiesers</a>

                    </div>
                    <div>
                        <img src="../../../asset/images/manage_advs.png" alt="">
                        <a href="../manage_advertisers/manage_advertisers.php?id=<?php echo $idd ?>">Manage
                            Advertiesers</a>
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
                <form action="" method="">
                    <div class="user_manage_contatiner">
                        <div class="search_container">
                            <div class="search_user_container">
                                <img src="../../../asset/images/search.png" alt="">
                                <p>Search User</p>
                            </div>
                            <div class="search_input_container">
                                <input type="text" name="searchuser" class="search_user_i" onkeyup="search_user()">
                                <button onclick="search_user()">search</button>
                            </div>
                        </div>

                        <div class="user_status_container">

                            <a href="" onclick="display_user_ajax(event,'Active', null)"> Active Users</a>
                            <!-- <button onclick="check(event)">click</button> -->
                            <a href="" onclick="display_user_ajax(event,'Inactive', null)"> Inactive Users</a>
                            <a href="" onclick="display_user_ajax(event,'All', null)"> All Users</a>

                        </div>

                        <div class="user_activity_container">
                            <button>
                                <a href="">User Activity History</a>
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
                    </div>
                </form>
            </div>
            <div class="right">
                <div class='all_user_container'>
                    <div class="table_container">
                    <table  cellspacing="0"  class="user_table">
                    <thead>
                        <tr align="center" id="table_header">
                        <th>ID</th>
                        <th>Profile Pic</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                         </tr>
                     </thead>
    
            </table>
                                
                    </div>
                </div>
            </div>
            <div class="footer"></div>
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


    <script src="../../../asset/js/view_users.js"></script>

    
</body>
</html>
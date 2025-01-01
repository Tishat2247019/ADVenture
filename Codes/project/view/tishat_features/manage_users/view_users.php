<?php
    session_start();
    require_once("../../../model/usermodel.php");
    if(!isset($_SESSION['status'])){
        header('location: login.html'); 
    }
    $idd = $_REQUEST['id'];
    $result = show_users();
      // while($row = mysqli_fetch_assoc($result)){
    //     echo "<br>";
    //     print_r($row);
    // }
?>
<html>
<html>
<head>
    <title>View Users Page</title>
    <link rel="stylesheet" href="view_users.css">
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
                <div class="admin_name">
                    <div class="image_container">
                        <img src="../../../asset/images/TOWSIF_PIC.jpg" alt="">
                    </div>
                    <p>Hello Admin</p>
                </div>
            </div>
            <div class="left">
                <div class="logo_cotainer">
                    <img src="../../../SVG/ad.svg" alt="">
                    <img src="../../../SVG//adventure.svg" alt="">
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
                        <button>
                        <img src="../../../asset/images/back.png" alt="">
                        <a href="../../dashboard/admin_menu.php?id=<?php echo $idd ?>"> Go Back</a> </button>
                    </div>
                </div>
            </div>
            
            <div class="middle">
                <form action="">
                    <div class="user_manage_contatiner">
                        <div class="search_container">
                            <div class="search_user_container">
                                <img src="../../../asset/images/search.png" alt="">
                                <p>Search User</p>
                            </div>
                            <div class="search_input_container">
                                <input type="text">
                                <button>search</button>
                            </div>
                        </div>

                        <div class="user_status_container">
                           
                                <button>
                                    <a href="">Active Users</a>
                                </button>
                          
                            
                                <button>
                                    <a href="">Inactive Users</a>
                                </button>
                           
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
                 if($row['type'] == 'User'){
                //echo "<br>";
                //print_r($row);
                // }
            ?>
            <tr align="center">
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
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
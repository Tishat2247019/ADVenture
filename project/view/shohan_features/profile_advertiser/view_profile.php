<?php
session_start();
require_once("../../../model/usermodel.php");
if(!isset($_SESSION['status'])){
    header('location: ../../../signin/signin.html'); 
}

    $user_id = $_REQUEST["id"];
    $user_info = user_info($user_id);
    $name = $user_info['username'];
    $email = $user_info['email'];
    $profile_pic = $user_info['profile_pic'];
?>


<html>
<head>
    <title>View Advertiser Profile</title>
    <link rel="stylesheet" href="../../../asset/css/shohan_css_files/view_profile.css">
</head>
<body>

    <div class="profile-container">
        
      <div class="info_container">

          <h1>View Profile (Advertiser)</h1>
          
          <div class="profile-section profile-item">
              <b>Name:</b>
              <p><?php echo $name?></p>
            </div>
            
            <div class="profile-section profile-item">
                <b>Contact Information:</b>
                <p><b>Email:</b> <?php echo $email?></p>
            </div>
            <button class="go-back-btn" onclick="window.history.back();">Go Back</button>
        </div>

        <div class="pic_container">
            <img src="../../../asset/images/profile_pics/<?php echo $profile_pic ?>" alt="" height=150px">
        </div>

    </div>

</body>
</html>
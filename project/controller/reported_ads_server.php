<?php   

require_once('../model/ads_statisticsmodel.php');
require_once('../model/admodel.php');

$reported_ads = reported_ad_statistics_info();

 while($row1 = mysqli_fetch_assoc($reported_ads)){
        $row = ad_info($row1['id']);
        


echo "<div class='reported_ad_info_container'>
    <div  class='same_class'>
        <p>Title</p>
        <p> {$row['ad_title']}</p>
         
    </div>
    <div class='same_class'>
        <p>Description</p>
        <p> {$row['ad_description']}</p>
         
    </div>
    <div class='same_class'>
        <p>Phone</p>
        <p>{$row['phone']}</p>
         
    </div>
    <div class='same_class'>
        <p>price</p>
        <p>{$row['price']}</p>
    </div>
    <div class='same_class'>
        <p>Category</p>
        <p>{$row['category']}</p>
    </div>
    <div class='same_class red'>
        <p>Total Reports</p>
        <p>{$row1['report']}</p>
    </div>

    <div class='delete_btn'>
        <button onclick=\"confirmDelete({$row1['id']})\"> 
        <img src='../../../asset/images/delete_ads.png' alt='' >Delete</button>
    </div>

</div>";
    }


    ?>
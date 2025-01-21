<?php  

session_start();
require_once("../model/usermodel.php");
require_once("../model/admodel.php");

function display_advs($row){
    $num_of_ads = total_ad_adv($row['user_id']);
    return "<tr align='center'>
                    <td>{$row['user_id']}</td>
                    <td><img src='../../../asset/images/profile_pics/" . (!empty($row['profile_pic']) ? $row['profile_pic'] : 'no_profile_pic.png') . "' alt='' '> </td>
                    <td>{$row['username']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['type']}</td>
                    <td><button id='status-{$row['status']}'>{$row['status']}</button></td>
                    <td>{$num_of_ads}</td>
                </tr>
            ";
}


if(isset($_REQUEST['order'])){
    $order = $_REQUEST['order'];
    $order = show_advs_by_ads($order);
    
    while ($row1 = mysqli_fetch_assoc($order)) {
              $row = user_info($row1['user_id']);
              echo display_advs($row);
            
        }
    
}


if(isset($_REQUEST['status'])){
    $status = $_REQUEST['status'];
    $result = show_users($status);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['type'] === 'Advertiser') {
                echo display_advs($row);
            }
        }
    } 
    
}

if(isset($_REQUEST['search_word'])){
    $search_word = $_REQUEST['search_word'];
    $result1 = show_users();
    $user_found = false;

    while ($row = mysqli_fetch_assoc($result1)) {
        $search_word_original = strpos($row['username'], $search_word);
        $search_word_upper = strpos(strtoupper($row['username']), strtoupper($search_word)) ;
        $search_word_lower = strpos(strtolower($row['username']), strtolower($search_word));

        if ($row['type'] === 'Advertiser' && ($search_word_original !== false || $search_word_upper !== false || $search_word_lower !== false )) {
            echo display_advs($row);
            $user_found = true;

        }
    }
    if(!$user_found){
        echo "no user found";
    }

}

?>
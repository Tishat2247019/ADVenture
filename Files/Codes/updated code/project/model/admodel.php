<?php

require_once("usermodel.php");
function ad_info($id){
    $conn = getConnection();
    $sql = "select * from ads where id = '$id'";
   
    $result = mysqli_query($conn, $sql);
    // var_dump($result);

    $row = mysqli_fetch_assoc($result);
        return $row; 
    
}


function show_ads($ad_category = 'All'){
    $conn = getConnection();
    // if ($category_filter === 'Active') {
    //     $sql = "select * from users where Category = 'category_filter'";
    // } elseif ($status_filter === 'Inactive') {
    //     $sql = "select * from users where status = 'Inactive'";
    // } else {
    // }
    if($ad_category !== 'All'){
    $sql = "select * from ads where category = '{$ad_category}'";
    }
    else{
        $sql = "select * from ads";
    }
    $result = mysqli_query($conn, $sql);
    return $result;
}


function delete_ad($idt){
    $conn = getConnection();
    $sql = "DELETE FROM ads WHERE id='$idt'";
    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    }
    else{
        return false;
    }
}

function edit1_user($idt, $name, $email, $type, $status){
    $conn = getConnection();
    $sql = "UPDATE users
            SET username = '$name', email = '$email', type = '$type', status = '$status'
            WHERE user_id = $idt";
    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    }
    else{
        return false;
    }
}

// show_users();   

?>

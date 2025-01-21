<?php
function getConnection2(){
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'check');
    return $conn;
}

function save_ad($user_id, $ad_id){
    $conn = getConnection2();
    $sql = "insert into saved_ad values ('$user_id', '$ad_id')";
    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    }
    else{
        return false;
    }
}
function show_saved_ad($user_id){
    $conn = getConnection2();
    $sql = "SELECT DISTINCT ad_id from saved_ad where user_id = {$user_id}";
    $result = mysqli_query($conn, $sql);
    return $result;
}


?>
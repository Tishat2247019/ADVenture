<?php

function getConnection2(){
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'check');
    return $conn;
}
function show_ad_statistics_info($id){

    $conn = getConnection2();
    $sql = "select * from ad_statistics where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row; 
}

function increase_impression($id){
    $conn = getConnection2();
    $sql = "select * from ad_statistics where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $old_impression = $row['impressions'];
    $new_impression = $old_impression + 1;
    $new_sql = "update ad_statistics set impressions = '$new_impression' where id = $id";
    $result1 = mysqli_query($conn, $new_sql);
    $result3 = mysqli_query($conn, $sql);
    return $result3;
}
function increase_report($id){
    $conn = getConnection2();
    $sql = "select * from ad_statistics where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $old_report = $row['report'];
    $new_report = $old_report + 1;
    $new_sql = "update ad_statistics set report = '$new_report' where id = $id";
    $result1 = mysqli_query($conn, $new_sql);
    $result3 = mysqli_query($conn, $sql);
    return $result3;
}

function delete_ad_statistics($idt){
    $conn = getConnection2();
    $sql = "DELETE FROM ad_statistics WHERE id='$idt'";
    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    }
    else{
        return false;
    }
}

function reported_ad_statistics_info(){

    $conn = getConnection2();
    $sql = "select * from ad_statistics where report > 0 ";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function view_flaggged_ad(){

    $conn = getConnection2();
    $sql = "select * from ad_statistics where report > 10 ";
    $result = mysqli_query($conn, $sql);
    return $result;
}




?>
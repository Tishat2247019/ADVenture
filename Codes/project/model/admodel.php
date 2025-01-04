<?php

require_once("usermodel.php");
function user1_info($id){
    $conn = getConnection();
    $sql = "select * from users where user_id = '$id'";
   
    $result = mysqli_query($conn, $sql);
    // var_dump($result);

    $row = mysqli_fetch_assoc($result);
        return $row; 
    
}


function show_ads(){
    $conn = getConnection();
    // if ($category_filter === 'Active') {
    //     $sql = "select * from users where Category = 'category_filter'";
    // } elseif ($status_filter === 'Inactive') {
    //     $sql = "select * from users where status = 'Inactive'";
    // } else {
    // }
    $sql = "select * from ads";
    $result = mysqli_query($conn, $sql);
    return $result;
    // while($row = mysqli_fetch_assoc($result)){
    //     echo "<br>";
    //     print_r($row);
    // }
}


function delete1_user($idt){
    $conn = getConnection();
    $sql = "DELETE FROM users WHERE user_id='$idt'";
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

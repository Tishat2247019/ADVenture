<?php
session_start();
require_once('../../../model/usermodel.php');
if($_SESSION['status'] == true){   
    $idd = $_REQUEST['id'];
    $idt = $_REQUEST['idt'];
    $user_info = user_info($idt);
    $name = $user_info['username'];
    $type = $user_info['type'];
    $pass = $user_info['password'];
    $email = $user_info['email'];
    $status = $user_info['status'];
    // $destination = $_REQUEST['destination'];
}

?>

<html>
    <head>
        <title>Edit User Page</title>
    </head>
    <body>

    <table align="center" >
    <form action="../../../controller/edit_user_check.php?id=<?php echo $idd  ?>&idt=<?php echo $idt ?>" method="POST">
        <tr height="250px">
            <td></td>
        </tr>
        <tr>
            <td>ID</td>
            <td><input type="text" disabled value="<?php echo $idt ?>" name="id"></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" readonly value="<?php echo $name ?>" name="username"></td>
        </tr>
        <tr>
            <td>New Username</td>
            <td><input type="text"  name="new_username"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" readonly value="<?php echo $email ?>" name="email"></td>
        </tr>
        <tr>
            <td>New email</td>
            <td><input type="email"  name="new_email"></td>
        </tr>
        <tr>
            <td>Type</td>
            <td><input type="text" readonly value="<?php echo $type ?>" name="type"></td>
        </tr>
        <tr>
            <td>New type</td>
            <td><input type="text"  name="new_type"></td>
        </tr>
        <tr>
            <td>Status</td>
            <td><input type="text" readonly value="<?php echo $status ?>" name="status"></td>
        </tr>
        <tr>
            <td>New Status</td>
            <td><input type="text"  name="new_status"></td>
        </tr>
        
        <tr>
            <td></td>
            <td><input type="submit" value="Submit" name="submit"> &nbsp; &nbsp; &nbsp;<input type="reset" value="Reset" name="reset"></td>
        </tr>
        <tr>
            <td></td>
            <td>
            <input type="hidden" name="destination" value="<?php echo $_SERVER["REQUEST_URI"]; ?>"/>
            </td>
        </tr>    
        </form>
        <tr>
            <td colspan="2">
<a href="<?php echo $destination ?>"> Go Back</a>
            </td>
        </tr>
    </table>
        
       
    </body>
</html>
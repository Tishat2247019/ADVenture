<?php 
$user_id = $_REQUEST['id'];

?>

<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="../../asset/css/rafi_css_files/changepassword_admin.css">

</head>

<body>
    <form action="../../controller/rafi_controller/change_password.php" method="POST">
        <table align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend>
                            <h3>Change Password</h3>
                        </legend>
                        <table align="center">
                            <tr>
                                <td>Enter Current Password:</td>
                                <td>
                                    <input type="password" value="" name="current_password" required>
                                    <input type="hidden" value="<?php echo $user_id; ?>" name="user_id" >
                                </td>
                            </tr>
                            <tr>
                                <td>Enter New Password:</td>
                                <td>
                                    <input type="password" value="" name="new_password" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Confirm New Password:</td>
                                <td>
                                    <input type="password" value="" name="confirm_new_password" required>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2">
                                    <br>
                                    <input type="submit" value="Save Changes" name="save_changes">
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
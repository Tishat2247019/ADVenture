<?php
$user_id=$_REQUEST['id'];


?>

<html>
<head>
    <title>Wishlist</title>
    <link rel="stylesheet" href="../../asset/css/rafi_css_files/user_wishlist.css">

</head>

<body>
    <form action="../../controller/rafi_controller/wishlist.php" method="POST">
        <table align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend>
                            <h3>Wishlist</h3>
                        </legend>
                        <input type="submit" value="Show Wishlist">
                        <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
                    </fieldset>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
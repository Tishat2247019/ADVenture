<?php
session_start();
require_once('../../../model/admodel.php');
if($_SESSION['status'] == true){   
    $idd = $_REQUEST['id'];
    $idt = $_REQUEST['idt'];
    $ad_info = ad_info($idt);
    $ad_id = $ad_info['id'];
    $adv_id = $ad_info['user_id'];
    $description = $ad_info['ad_description'];
    $title = $ad_info['ad_title'];
    $phone = $ad_info['phone'];
    $email = $ad_info['email'];
    $photo = $ad_info['ad_photo'];
    $price = $ad_info['price'];
    
    // $destination = $_REQUEST['destination'];
}

?>

<html>
    <head>
        <title>Edit Ad Page</title>
    </head>
    <body>

    <table align="center" >
    <form action="../../../controller/edit_user_check.php?id=<?php echo $idd  ?>&idt=<?php echo $idt ?>" method="POST" id="edit_ad_form">
        <tr height="250px">
            <td></td>
        </tr>
        <tr>
            <td>AD ID</td>
            <td><input type="text" disabled value="<?php echo $idt ?>" name="id"></td>
        </tr>
        <tr>
            <td>Advertiser ID</td>
            <td><input type="text" readonly value="<?php echo $adv_id ?>" name="adv_id"></td>
        </tr>
        <tr>
            <td>AD Descriptin</td>
            <td>
            <textarea readonly id="ad_descriptoin" class="text" cols="56" rows="15" name="ad_description"
            form="edit_ad_form"><?php echo $description; ?></textarea> 
            </td>   
        </tr>
        <tr>
            <td>New Description</td>
            <td><textarea  id="new_ad_descriptoin" class="text" cols="56" rows="15" name="new_ad_description"
            form="edit_ad_form"><?php echo $description; ?></textarea> </td>
        </tr>
        <tr>
            <td>AD Title</td>
            <td><input type="text" value="<?php echo $title ?>"  name="title"></td>
        </tr>
        <tr>
            <td>New Title</td>
            <td><input type="text" name="new_title"></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="text" readonly value="<?php echo $phone ?>" name="phone"></td>
        </tr>
        <tr>
            <td>New Phone</td>
            <td><input type="text"  name="new_phone"></td>
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
            <td>Price</td>
            <td><input type="text" readonly value="<?php echo $price ?>" name="price"></td>
        </tr>
        <tr>
            <td>New price</td>
            <td><input type="text"  name="new_price"></td>
        </tr>
        <tr>
            <td>Ad photo</td>
            <td><img src="../../../asset/images/ad_pics/<?php echo $photo ?>" alt="" height="20px">
            </td>
        </tr>
        <tr>
            <td>New photo</td>
            <td><input type="text"  name="new_photo"></td>
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
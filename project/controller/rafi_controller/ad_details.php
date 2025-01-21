<?php
require_once '../../model/usermodel1.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $ad_id = intval($_GET['id']);
    if ($ad_id <= 0) {
        echo "<h3>Invalid Ad ID.</h3>";
        exit();
    }

    $conn = getConnection();
    $sql = "SELECT ad_title, ad_description, phone, email, price, ad_photo, category FROM ads WHERE id = '$ad_id'";
    $result = mysqli_query($conn, $sql);

    $user_id=$_GET['user_id'];

    if ($ad = mysqli_fetch_assoc($result)) {


?>
        <html>
        <head>
            <title>Ad Details</title>
            <link rel="stylesheet" href="../../asset/css/rafi_css_files/ad_details.css"></link>
        </head>

        <body>
            <table align="center">
                <tr>
                    <td>
                        <fieldset>
                            <legend>
                                <h3>Ad Details</h3>
                            </legend>
                            <p><strong>Title:</strong> <?php echo $ad['ad_title']; ?></p>
                            <p><strong>Description:</strong> <?php echo $ad['ad_description']; ?></p>
                            <p><strong>Category:</strong> <?php echo $ad['category']; ?></p>
                            <p><strong>Price:</strong> $<?php echo $ad['price']; ?></p>
                            <p><strong>Contact Phone:</strong> <?php echo $ad['phone']; ?></p>
                            <p><strong>Contact Email:</strong> <?php echo $ad['email']; ?></p>
                            <?php if (!empty($ad['ad_photo'])): ?>

                                <p><img src="../../asset/images/ad_pics/<?php echo $ad['ad_photo']; ?>" alt="Ad Photo" style="max-width: 300px;"></p>
                            <?php endif; ?>
                            <a href="view_ads2.php?user_id=<?php echo $user_id;?>">Back to Ads</a>
                            <button onclick="save_ad(<?php echo $user_id; ?>, <?php echo $ad_id; ?>)">Save Ad</button>
                        </fieldset>
                    </td>
                </tr>
            </table>
            <script src="../../asset/js/rafi_js/ad_details.js"></script>
        </body>

        </html>
<?php
    } else {
        echo "<h3>Ad not found.</h3>";
    }

    mysqli_close($conn);
} else {
    echo "<h3>Invalid request.</h3>";
}
?>
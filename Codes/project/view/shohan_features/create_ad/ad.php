

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="../../../controller/ad_check.php" method="post" enctype="multipart/form-data" id="crate_ad_form">
        <p>upload image</p>
        <input type="file" name="uploadfile"> <br>
        <p>ad title</p><br>
        <input type="text" name="title">
        <p>ad description</p>
        <textarea id="confirmationText" class="text" cols="56" rows="15" name="ad_description"
            form="crate_ad_form"></textarea>
        <p>contact information</p>
        <p>Phone</p> <input type="text" name="phone">
        <p>Email</p> <input type="email" name="email">
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>


</body>
</html>
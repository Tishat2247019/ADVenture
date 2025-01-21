<?php

$user_id = $_REQUEST['id'];
?>

<html>
<head>
    <title>View Ads</title>
</head>
<body>
    <form action="../../controller/rafi_controller/view_ads2.php" method="GET">
        <table align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend>
                            <h3>Search Ads</h3>
                        </legend>
                        <link rel="stylesheet" href="../../asset/css/rafi_css_files/view_ads_html.css">
                        </link>
                        <table align="center">
                            <tr>
                                <td>Search by Keyword:</td>
                                <td><input type="text" name="keyword" placeholder="Enter title or description"></td>
                            </tr>
                            <tr>
                                <td>Price Range:</td>
                                <td>
                                    <input type="number" name="price_min" placeholder="Min Price">
                                    <input type="number" name="price_max" placeholder="Max Price">
                                    <input type="hidden" name="user_id" value="<?php echo $user_id;?>" >
                                </td>
                            </tr>
                            <tr>
                                <td>Sort By:</td>
                                <td>
                                    <select name="sort">
                                        <option value="price_asc">Price (Low to High)</option>
                                        <option value="price_desc">Price (High to Low)</option>
                                        <option value="title_asc">Title (A to Z)</option>
                                        <option value="title_desc">Title (Z to A)</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2">
                                    <br>
                                    <input type="submit" value="Search">
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>
    </form>

    <table align="center">
        <tr>
            <td>
                <fieldset>
                    <legend>
                        <h3>List of Ads</h3>
                    </legend>
                    <table align="center">
                        <tr>
                            <td>Ad Title</td>
                            <td>Description</td>
                            <td>Price</td>
                            <td>Actions</td>
                        </tr>
                        <tr>
                            <td colspan="4">Ads will be displayed here based on your search and filter options.</td>
                        </tr>
                    </table>
                </fieldset>
            </td>
        </tr>
    </table>
</body>
</html>
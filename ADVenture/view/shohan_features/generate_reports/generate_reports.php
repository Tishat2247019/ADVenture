<?php
session_start();
require_once("../../../model/usermodel.php");
require_once("../../../model/admodel.php");

if (!isset($_SESSION['status'])) {
    header('location: login.html'); 
}

$user_id = $_REQUEST["id"];
$ads = show_ads();
$user_info = user_info($user_id);
$name = $user_info['username'];
?>

<html>
<head>
    <title>Generate Reports</title>
    <link rel="stylesheet" href="../../../asset/css/shohan_css_files/generate_reports.css">
    <script>
        function filterAds() {
            let input = document.getElementById("ad-search").value.toLowerCase();
            let options = document.getElementById("ad-title").options;
            for (let i = 0; i < options.length; i++) {
                let text = options[i].text.toLowerCase();
                options[i].style.display = text.includes(input) ? "" : "none";
            }
        }
    </script>
</head>
<body>
    <div class="form-container">
        <div class="form-box">
            <h2>Generate Report</h2>
            <form action="../../../controller/shohan_controller/check_generate_reports.php" method="post" enctype="multipart/form-data" id="generate_reports_form">
                <label for="ad-search">Search Ad</label>
                <input type="text" id="ad-search" onkeyup="filterAds()" placeholder="Search by Ad Title">

                <label for="ad-title">Select Ad</label>
                <select name="ad-title" id="ad-title" required>
                    <option value="" disabled selected>Select an Ad</option>
                    <?php while ($ad = mysqli_fetch_assoc($ads)) { ?>
                        <option value="<?php echo $ad['id']; ?>"> <?php echo $ad['ad_title']; ?> </option>
                    <?php } ?>
                </select>

                <label for="report-type">Select Report Type</label>
                <select name="report-type" id="report-type" required>
                    <option value="" disabled selected>Please Select File Format</option>
                    <option value=".txt">.txt</option>
                    <option value=".pdf">.pdf</option>
                </select>

                <input type="submit" name="download_report" value="Download Report">
                <button type="button" onclick="history.back()">Go Back</button>
            </form>
        </div>
    </div>
</body>
</html>

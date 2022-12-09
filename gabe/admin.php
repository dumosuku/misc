<?php
session_start();
require_once "config.php";
if (!isset($_SESSION["account_type"])){
    header('HTTP/1.0 403 Forbidden');
    exit;
}
elseif ($_SESSION["account_type"] != 1) {
    header('HTTP/1.0 403 Forbidden');
    exit;
}
?>

<html>

<head>
    <title>RedemptionNFT - Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/header.css">
    <link rel="stylesheet" href="assets/main.scss">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include("header.php"); ?>
    <div class="hero" style="padding:7rem;">    
        <h1>Page Under Development</h1>
        <h2>Testing file upload functionality</h2>
    </div>

    <div class="uploadBackground">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select file to upload:
            <input class= "upload" type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload File" name="submit">
        </form>
    </div>
</body>


</html>
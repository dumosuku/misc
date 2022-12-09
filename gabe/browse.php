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

<head>
    <title>RedemptionNFT - File Browser</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/header.css">
    <link rel="stylesheet" href="assets/main.scss">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>

<?php include("header.php"); ?>

<div class="hero" style="padding:10rem;">
    <h1>Browse uploaded files here</h1>

    <form action="browse.php" method="get">
        <div class="input-group mb-3" style="width:500px;margin:0 auto;">
            <input name="file" type="text" class="form-control" placeholder="Search for file here" aria-label="Search for file here" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-info" type="submit" id="button-addon2">Search</button>
            </div>
        </div>  

    <div>
        <?php
        if(isset($_GET["file"])) {
            $searchQuery = $_GET["file"];
            $target_dir = "uploads/";
            $target_file = $target_dir . $searchQuery;
            $file_type = mime_content_type($target_file);            
            $fp = fopen($target_file, "r") ;

            if($_GET["file"] == "") {
                exit;
            }
                
            if(file_exists($target_file)) {
                header("Content-type: " . $file_type);
                header('Content-Length:' . filesize($target_file));
                ob_clean();
                flush();

                while (!feof($fp)) {
                    $buff = fread($fp, 1024);
                    print $buff;
                }
                include($target_file);
            }
            else{
                echo "
                <div class='error'>
                    <p>File does not exist.</p>
                </div>
                ";
            }
        }

        ?>
    </div>
</div>
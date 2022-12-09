<?php
// Allow only POST requests
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('HTTP/1.0 405');
    exit;
}
?>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/header.css">
    <link rel="stylesheet" href="assets/main.scss">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>

<?php
$errormsg = $successmsg = "";
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if file already exists
if (file_exists($target_file) ) {
    $errormsg = "Sorry, file already exists.";
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $errormsg = "Sorry, your file is too large.";
}

// Allow certain file formats
if($file_type != "pdf" && $file_type != "txt" && $file_type != "php" && $file_type != "html" && $file_type != "gif" && $file_type != "png" && $file_type != "jpg" ) {
    $errormsg = "File extention not allowed.";
}

// If everything is ok, try to upload file
else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $successmsg = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        $errormsg = "Sorry, there was an error uploading your file.";
    }
}

?>

<div class="hero" style="padding:27rem;">    
        <?php
        if(!empty($errormsg)) { 
            echo $errormsg;
        }
        else {
            echo $successmsg;
        } 
        ?>
        <p> Redirecting you back shortly...</p>
        <?php 
            header( "refresh:5; url=admin.php" ); 
        ?>
</div>


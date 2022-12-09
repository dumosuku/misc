<?php
session_start();

require_once "config.php";
// Redirect to appropriate page depending on account type
if ($_SESSION["account_type"] == 1)
    header("Location: admin.php"); 
else
    header('HTTP/1.0 403 Forbidden');
?>
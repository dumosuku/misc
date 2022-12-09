<?php
session_start();
require_once "config.php";
include("header.php");
?>

<?php echo "eth count ". $eth ; ?>

<head>
    <title>RedemptionNFT - Flip Jimmy</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/header.css">
    <link rel="stylesheet" href="assets/main.scss">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>

<div id="eth" style="font-family:'Montserrat,sans-serif'; color: white;"></div>

<div class="hero" style="padding:4rem;">    
        <h1>Flip Jimmy for ETH!</h1>
</div>

<div class="test">
    <img id="jim" src="https://i.imgur.com/uiPirqV.png"></img>
</div>

<div class="hero" style="padding:25px;">
    <button onclick="flip()"> Flip the Jimmy</button>
</div>

<div class="form" method="post" action="jimmy.php">
    <div class="form-group">
        <label>Wallet ID</label>
        <input type="text" name="wallet_id" class="form-control" value="">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Submit" onclick="add()">
        <input type="reset" class="btn btn-secondary ml-2" value="Reset">
    </div>
</div>

<script>
    let rotation = 0;
    let count = 0;
    function flip() {
        rotation += 360;
        document.getElementById("jim").style.transform = `rotate(${rotation}deg)`;
        count = count + 1;
        eth = count;
        document.getElementById("eth").innerText = "ETH earned: " + eth;
    }
</script>

<script>
    function add() {
        $.ajax({
            type: "POST",
            url: 'jimmy.php',
            data: { eth : eth }
            success: function(data)
            {
                alert("success!");
            }
        }
    }
</script>
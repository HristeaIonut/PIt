<?php
define('SLASH', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
require("../res/constants.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../view/styles.css">
    <script src="../controller/scripts/script.js"></script>
    <script src="../controller/scripts/emptyCode.js"></script>
    <link rel="icon"
          href="https://icons-for-free.com/iconfiles/png/512/clipboard+paste+task+icon-1320161389075402003.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIt</title>
</head>

<body>
<p hidden id="checking" style="color:white;">This text should be hidden</p>
<div class="header">
    <div class="header-left">
        <a class="home" id="continut" href="../indexLogged.php">PasteIt</a>
        <a class="contact" href="contactLogged.php">Contact</a>
        <a class="how-to" href="how-toLogged.php">How to use</a>
        <a class="report" href="reportLogged.html">Report</a>
        <a class="contact" href="">My Pastes</a>
    </div>
    <div class="header-right">
        <a class="login" > <?php require ("../controller/getUsername.php")?> </a>
        <a class="register" href="../logout.php">Log out</a>

    </div>

</div>
<div class="footer">
    <a class=reportContent href="reportContentLogged.php"> Report a post</a>
</div>

<table id="pastes">

</table>
</body>
<script src="../controller/scripts/loadPastes.js"></script>

</html>

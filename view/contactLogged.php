<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="https://icons-for-free.com/iconfiles/png/512/clipboard+paste+task+icon-1320161389075402003.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIt</title>
</head>
<body>
<div class="header">
    <div class="header-left">
        <a class="home" href="../indexLogged.php">PasteIt</a>
        <a class="contact" href="../view/contactLogged.php">Contact</a>
        <a class="how-to" href="../view/how-toLogged.php">How to use</a>
        <a class="report" href="../view/report.html">Report</a>
        <a class="contact" href="../view/mypastes.php">My Pastes</a>
        
    </div>
    <div class="header-right">
        <a class="login" > <?php require ("../controller/getUsername.php")?> </a>
        <a class="register" href="../logout.php">Log out</a>
    </div>
</div>
<div class="footer">
    <a class=reportContent href="reportContentLogged.php"> Report a paste</a>
</div>
<div>
    <h3>Contact Us</h3>
    <hr>
    <p>Please email us all your questions at <u class="email">admin@pit.com</u></p>
    <hr>
    <h3>How can I report bad content?</h3>
    <p>To report possible malicious activity and/or violation of our T&Cs please use the 'REPORT A PASTE' button above each
        paste. This requires a PIt account, or you may send an email to <u class="email">security@pit.com</u>.</p>
    <p>Please follow the next steps:</p>
    <ol>
        <li>Please indicate who you are, why the item is abusive and also include the direct link to the item(s) you want removed.</li>
        <li>Make sure you write to us in english, otherwise we might ignore your email.</li>

    </ol>
</div>


</body>


</html>
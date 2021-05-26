<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon"
          href="https://icons-for-free.com/iconfiles/png/512/clipboard+paste+task+icon-1320161389075402003.png">
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
        <a class="report" href="../view/reportLogged.html">Report</a>
        <a class="contact" href="../view/mypastes.php">My Pastes</a>

    </div>
    <div class="header-right">
        <a class="login" > <?php session_start(); echo $_SESSION["username"]; ?> </a>
        <a class="register" href="../logout.php">Log out</a>
    </div>
</div>
<div class="footer">
    <a class=reportContent href="reportContentLogged.php"> Report a post</a>
</div>
<div>

    <hr>
    <p>If the information below is not helpful, feel free to contact us. Details in the <u class="email">Contact</u> tab above.</p>
    <hr>
    <h3>About</h3>
    <p>The purpose of this site is to allow users to safely and conveniently send a text to another user.</p>
    <h3>How do i use this webpage?</h3>
    <ol>
        <li>Paste the text in the Box</li>
        <li>Click/tap the "Create Paste" button</li>
        <li>Copy the link of the current page</li>
        <li>Send the link to your friend</li>
    </ol>
</div>


</body>

</html>
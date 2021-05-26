<!DOCTYPE html>
<script src="../controller/scripts/cryptojs-aes.min.js"></script>
<script src="../controller/scripts/cryptojs-aes-format.js"></script>
<?php
include '../controller/insertValuestoDB.php';
$basename = basename(__FILE__);
$is_expired = false;
if(checkExpiration(getExpirationDate($basename))){
    $is_expired = true;
}
include '../controller/connection/connection.php';
require ("../controller/generatekeys.php");
global $cipher, $key, $iv, $tag, $conn;

if(isset($_COOKIE["user_login"]))
    $decryptedId = openssl_decrypt($_COOKIE["user_login"], $cipher, $key, $options = 0, $iv);
$pastes = array();
$sql = "SELECT * FROM pastes WHERE paste_name = ?";
$stmt = $conn->prepare($sql);
$stmt -> bind_param("s", $basename);
$stmt -> execute();
$pasteName =  null;
$pasteId = null;
$password = null;
$created_at = null;
$expiration_date = null;
$is_creator = false;
$stmt -> bind_result($pasteId, $pasteName, $password, $created_at, $expiration_date);
while($stmt -> fetch()){
if(isset($_COOKIE["user_login"]))
if(($pasteId == $decryptedId)){
$is_creator = true;
}
}

?>
<script type="text/JavaScript">

    const thisIsCreator = "<?php echo $is_creator ?>";
    const thisIsExpired = "<?php echo $is_expired ?>";
    var server_password = '<?php echo $password; ?>';
    var key = "<?php echo $key; ?>";
    if (server_password && !thisIsCreator) {
        input = prompt("Please enter the password");
        let decrypted = CryptoJSAesJson.decrypt(server_password, key);
        console.log(decrypted);
        if (!(input === decrypted))
            location.reload();
    }
    if(thisIsExpired){
        alert('This paste is no longer available');    
        location.reload();
    }

</script>

<html lang="en">
<head id="this_paste">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../view/styles.css">
    <link rel="stylesheet" href="../controller/highlight.css">
    <link rel="icon"
          href="https://icons-for-free.com/iconfiles/png/512/clipboard+paste+task+icon-1320161389075402003.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIt</title>
</head>

<body>
<div class="header">
    <?php
        if(isset($_COOKIE["user_login"])){
            echo'<div class="header-left">
    <a class="home" href="../indexLogged.php">PasteIt</a>
    <a class="contact" href="../view/contactLogged.php">Contact</a>
    <a class="how-to" href="../view/how-toLogged.php">How to use</a>
    <a class="report" href="../view/reportLogged.html">Report</a>
    <a class="contact" href="../view/mypastes.php">My Pastes</a>
</div>
';
echo'
<div class="header-right">
    <a class="login">';
        require ("../controller/getUsername.php");
        echo '</a>
    <a class="register" href="../logout.php">Log out</a>
</div>
';
}
else{
echo '
<div class="header-left">
    <a class="home" href="../index.php" id="past">PasteIt</a>
    <a class="contact" href="../view/contact.php">Contact</a>
    <a class="how-to" href="../view/how-to.php">How to use</a>
    <a class="report" href="../view/report.html">Report</a>
</div>
<div class="header-right">
    <a class="login" href="../view/login.php">Login</a>
    <a class="register" href="../view/report.html">Register</a>
</div>
';
}
?>
</div>

<pre><code id='cod'>ihhjbbhj</code></pre><script src="../controller/scripts/syntaxHighlightC.js"></script>
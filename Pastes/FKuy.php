<!DOCTYPE html>
<script src="../controller/scripts/cryptojs-aes.min.js"></script>
<script src="../controller/scripts/cryptojs-aes-format.js"></script>
<script src="../controller/scripts/editPaste.js"></script>
<?php
include '../controller/insertValuestoDB.php';
$basename = basename(__FILE__);
if($basename>9)
    $basename = substr($basename, 0, 5).".php";
$_SESSION["basename"] = $basename;
    $is_expired = false;
    if(!checkExpiration(getExpirationDate($basename))){
        $is_expired = true;
        header("Location: ../index.php");
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
$burn_after_read = null;
$is_creator = false;
$stmt -> bind_result($pasteId, $pasteName, $password, $created_at, $expiration_date, $burn_after_read);
while($stmt -> fetch()){
    if(isset($_COOKIE["user_login"])){
        if(($pasteId == $decryptedId)){
            $is_creator = true;
        }
        else if($burn_after_read == 1)
        {
           unlink(basename(__FILE__));
           $sql_delete_paste = "DELETE FROM pastes WHERE paste_name = ?";
           $stmt = $conn->prepare($sql_delete_paste);
           $stmt -> bind_param("s", $basename);
           $stmt -> execute();
        }
    }
    else if($burn_after_read == 1)
    {
        unlink(basename(__FILE__));
        $sql_delete_paste = "DELETE FROM pastes WHERE paste_name = ?";
        $stmt = $conn->prepare($sql_delete_paste);
        $stmt -> bind_param("s", $basename);
        $stmt -> execute();
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

</script>

<html lang="en">
<head id="this_paste">
    <script src='../controller/scripts/loadModifiedPastes.js'></script>
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

<body onload="loadModifiedPaste('<?php echo basename(__FILE__);?>')">
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

    <div class="modified-pastes">Other Versions<table id="modified-pastes"></table></div>


<div class='textarea-container'><pre><code id='cod'>dfbhdghbdghdgh</code></pre><form method='post' action='../controller/editCode.php'><textarea name='codeArea' id='edit' class='textarea' style='display: none'>dfbhdghbdghdgh</textarea>Edit<input type='checkbox' id='Checkbox'  onclick='mySwitch()'><input type='hidden' name='fileName' value="<?php echo basename(__FILE__)?>"/><input type='submit' class='submit' id='submit' name='submit' value='Apply changes' style='display: none'/></form></div><script src="../controller/scripts/syntaxHighlightC.js"></script>
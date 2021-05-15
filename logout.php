<?php
setcookie('user_login','', time() - 3600);
$_SESSION["username"] = '';

header("Location: index.php");
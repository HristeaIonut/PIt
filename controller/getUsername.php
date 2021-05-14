<?php
require ("generatekeys.php");
require ("connection/connection.php");
    global $cipher, $key, $iv, $tag, $conn;
    $decryptedId = openssl_decrypt($_COOKIE["user_login"], $cipher, $key, $options = 0, $iv);
    $sql = "SELECT * FROM connectiontable where user_id='$decryptedId' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row["user_name"];

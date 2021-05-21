<?php
session_start();
require ("generatekeys.php");
require ("connection/connection.php");
    global $cipher, $key, $iv, $tag, $conn;
    if(isset($_COOKIE["user_loing"])){
        $decryptedId = openssl_decrypt($_COOKIE["user_login"], $cipher, $key, $options = 0, $iv);
        $sql = "SELECT * FROM connectiontable where user_id=? ";
        $stmt = $conn->prepare($sql);
        $stmt -> bind_param("s", $decryptedId);
        $stmt -> execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        echo $row["user_name"];
    }
    else{
        echo $_SESSION["username"];
    }

<?php
include '../connection/connection.php';
require ("../generatekeys.php");
global $cipher, $key, $iv, $tag, $conn;
$decryptedId = openssl_decrypt($_COOKIE["user_login"], $cipher, $key, $options = 0, $iv);
$pastes = array();
$sql = "SELECT * FROM pastes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt -> bind_param("s", $decryptedId);
$stmt -> execute();
$pasteName =  null;
$pasteId = null;
$password = null;
$created_at = null;
$stmt -> bind_result($pasteId, $pasteName, $password, $created_at);
while($stmt -> fetch()){
    $pastes[] = $pasteName;
}
echo json_encode($pastes);
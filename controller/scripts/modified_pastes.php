<?php
session_start();
include '../connection/connection.php';
$sql = "SELECT * from modified_pastes where paste_name = ?";
$stmt = $conn->prepare($sql);
$name = $_POST["filename"];
$stmt -> bind_param("s", $name);
$stmt -> execute();
$paste_name = null;
$modified_paste_name = null;
$stmt -> bind_result($paste_name, $modified_paste_name);
$modified_pates = array();
while($stmt -> fetch()){
    $modified_pates[] = $modified_paste_name;
}
echo json_encode($modified_pates);
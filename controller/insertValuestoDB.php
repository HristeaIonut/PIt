<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function insert_into_db($id, $pasteName, $password, $expirationDate){
    include 'connection/connection.php';
    $sql = "INSERT INTO pastes(id, paste_name, password, expiration_date) values(?, ?, ?, (CURRENT_TIMESTAMP + INTERVAL (?) MINUTE));";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("isss", $id, $pasteName, $password, $expirationDate);
        $stmt->execute();
    }
    
}
function insert_into_db_month($id, $pasteName, $password){
    include 'connection/connection.php';
    $sql = "INSERT INTO pastes(id, paste_name, password, expiration_date) values(?, ?, ?, (CURRENT_TIMESTAMP + INTERVAL 1 MONTH));";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("iss", $id, $pasteName, $password);
        $stmt->execute();
    }
    
}
function insert_no_expiration($id, $pasteName, $password){
        include 'connection/connection.php';
    $sql = "INSERT INTO pastes(id, paste_name, password) values(?, ?, ?)";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("iss", $id, $pasteName, $password);
        $stmt->execute();
    }
}
function getExpirationDate($pasteName){
    include 'connection/connection.php';
    $sql = "SELECT expiration_date from pastes where paste_name = ?";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("s", $pasteName);
        $stmt->execute();
        $stmt->store_result();
        $date = null;
        $result = null;
        $stmt->bind_result($date);
        while($stmt -> fetch()){
            $result = $date;
        }
        return $result;
    }
}
function checkExpiration($expiration){
    $timeNow = date("Y-m-d h:i:s");
    if($expiration > $timeNow){
        return true;
    }
    return false;
    
}
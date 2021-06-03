<?php
session_start();
include 'controller/connection/connection.php';
require 'controller/generatekeys.php';
global $conn, $cipher, $key, $ivlen, $iv;
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($email)) {
    echo '<script>alert("You haven\'t inserted an email, please do so.")</script>';
    header("Refresh:0, url=view/login.php");
} elseif (empty($password)) {
    echo '<script>alert("Do you think you can trick me? Enter your password and stop playing.\u{1F643}")</script>';
    header("Refresh:0, url=view/login.php");
} else {

    $sql = "SELECT * FROM connectiontable where email=? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $_SESSION["username"] = $row["user_name"];

    if ($result->num_rows == 1) {
        $encryptedCookie = openssl_encrypt($row["user_id"], $cipher, $key, $options = 0, $iv);
        if (!empty($_POST["remember"]))
            setcookie('user_login', $encryptedCookie, time() + (10 * 365 * 24 * 60 * 60), "", "", false, true);
        else
            setcookie('user_login', $encryptedCookie, time() + (10 * 60), "", "", false, true);

        $validPassword = password_verify($password, $row['password']);

        if ($validPassword) {
            echo "id: " . $row["user_id"] . " - Name: " . $row["first_name"] . " " . $row["last_name"] . "<br>";
            header("Location: indexLogged.php");
        }
        else {
            echo '<script>alert("Incorrect email or password")</script>';
            header("Refresh:0, url=view/login.php");
        }
    }
}


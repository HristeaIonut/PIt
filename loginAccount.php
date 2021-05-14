<?php
session_start();
include 'controller/connection/connection.php';
require 'controller/generatekeys.php';
global $conn,$cipher,$key, $ivlen, $iv;
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "SELECT * FROM connectiontable where email='$email' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$_SESSION["username"] = $row["user_name"];

    if (empty($email)) {
        echo '<script>alert("You haven\'t inserted an email, please do so.")</script>';
        header("Refresh:0, url=view/login.php");
    } elseif (empty($password)) {
        echo '<script>alert("Do you think you can trick me? Enter your password and stop playing.\u{1F643}")</script>';
        header("Refresh:0, url=view/login.php");
    } else {
        if ($result->num_rows == 1) {

            if(!empty($_POST["remember"])){
                $encryptedCookie = openssl_encrypt($row["user_id"], $cipher, $key, $options=0, $iv);
                setcookie('user_login', $encryptedCookie, time() + (10 * 365 * 24 * 60 * 60));
            }
            else
                setcookie('user_login','', time() - 3600);
            $validPassword = password_verify($password, $row['password']);

            if ($validPassword) {
                echo "id: " . $row["user_id"] . " - Name: " . $row["first_name"] . " " . $row["last_name"] . "<br>";
                $_SESSION['user'] = $email;
                header("Location: indexLogged.php");
            }
            echo '<script>alert("Incorrect email or password")</script>';
            header("Refresh:0, url=view/login.php");
    }
}


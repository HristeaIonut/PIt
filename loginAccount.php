<?php
session_start();
include 'controller/connection/connection.php';
$email = $_POST['email'];
$password = $_POST['password'];
    if (empty($email)) {
        echo '<script>alert("You haven\'t inserted an email, please do so.")</script>';
        header("Refresh:0, url=view/login.php");
    } elseif (empty($password)) {
        echo '<script>alert("Do you think you can trick me? Enter your password and stop playing.\u{1F643}")</script>';
        header("Refresh:0, url=view/login.php");
    } else {
        $sql = "SELECT * FROM connectiontable where email='$email' ";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if(!empty($_POST["remember"]))
                setcookie('user_login', $row["user_id"], time() + (10 * 365 * 24 * 60 * 60));
            else
                setcookie('user_login','', time() - 3600);
            $validPassword = password_verify($password, $row['password']);

            if ($validPassword) {
                echo "id: " . $row["user_id"] . " - Name: " . $row["first_name"] . " " . $row["last_name"] . "<br>";
                $_SESSION['user'] = $email;
                header("Location: index.php");
            }
            echo '<script>alert("Incorrect email or password")</script>';
            header("Refresh:0, url=view/login.php");
    }
}
?>
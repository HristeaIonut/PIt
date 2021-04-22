<?php
    session_start();
    include 'connection.php';
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email)){
        echo "You haven't inserted an email, please do so.";
        //header("Location: login.html");
    }
    if(empty($password)){
        echo "You haven't inserted a password, please do so.";
        //header("Location: login.html");
    }
    $sql = "SELECT * FROM users where email='$email' AND password='$password' ";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo "id: " . $row["user_id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. "<br>";
        $_SESSION['user'] = $email;
        header("Location: ../index.php");
    }
     else {
        header("Location: login.html");
    }
    

    
          

?>
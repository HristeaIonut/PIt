<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
            //something was posted
            $user_name = $_POST['user_name'];
            $password = $_POST['password'];

            if(empty($user_name) || is_numeric($user_name)){
                echo "Please, insert a valid username..";
            }
            if(empty($password)){
                echo "You forgot to type a password.";
            }

            else {
                //read from database
                $query = "select * from users where user_name = '$user_name' limit = 1";
                $result = mysqli_query($con, $query);
                if($result && mysqli_num_rows($result) > 1){
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['password'] == $password){
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php");
                        die;
                    }
                    else{
                        echo "The password you have entered is wrong.";
                    }
                }
                header("Location: index.php");
                die;

            }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="formStyle.css">
    <link rel="icon"
        href="https://icons-for-free.com/iconfiles/png/512/clipboard+paste+task+icon-1320161389075402003.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIt</title>
</head>

<body>
    <div class="header">
        <div class="header-left">
            <a class="home" href="../index.php">PasteIt</a>
            <a class="contact" href="contact.php">Contact</a>
            <a class="how-to" href="how-to.php">How to use</a>
            <a class="report" href="report.php">Report</a>
        </div>
        <div class="header-right">
            <a class="login" href="login.php">Login</a>
            <a class="register" href="register.php">Register</a>
        </div>
    </div>
    <div class="footer">
        <a class=reportContent href="reportContent.php"> Report a post</a>
    </div>
    <form method="post" class="form-style-report">
        <p>Login to your account!</p>
        <ul>
            <li>
                <label id="field4"> Insert your username:
                <input type="text" name="field4" class="field-style field-split align-right" placeholder="Username" />
                </label>
            </li>
            <li>
                <label id="field5"> Insert your password:
                <input type="password" name="field5" class="field-style field-split align-right" placeholder="Password" />
                </label>
            </li>
            <li>
                <input type="submit" value="Login" class="field-style field-split align-left" />
                <a href="register.php" class="field-style field-split align-right">Click to Signup</a>
            </li>
            
        </ul>
    </form>

</body>

</html>
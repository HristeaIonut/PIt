<?php
    include 'connection.php';
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        echo '<script>alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.")</script>';
        header("Refresh:0, url=../../view/register.php");
    }else{
        $sql1 = "select * from connectiontable where email = '$email'";
        $result = $conn->query($sql1);
        if($result->num_rows == 0){
            if(isset($first_name) && $first_name!='' &&
            isset($last_name) && $last_name!='' &&
            isset($user_name) && $user_name!='' &&
            isset($email) && $email!='' &&
            isset($password2) && $password!=''){
                $sql = "INSERT INTO connectiontable (first_name, last_name, user_name, email, password) values ('$first_name', '$last_name', '$user_name', '$email', '$password') ";

                if ($conn->query($sql)) {
                    
                    header("Location: ../../view/login.php");
                }
                else {
                    header("Location: ../../view/register.php");
                }
        }
         
    } else echo "The email is already used. Please try to login.";
    
}
    

    
          

?>
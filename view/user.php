<?php

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../index.html");
    exit;
}
    
    class User{
        public function add_user($first_name, $last_name, $user_name, $email, $password){
            include 'connection.php';
            $sql = "INSERT INTO users(first_name, last_name, user_name, email, password) VALUES ('$first_name', '$last_name', '$user_name', '$email', '$password')";
            if($conn->query($sql) == TRUE){
                echo "New record created succesfully";
            } else{
                echo "Error: " . $sql . "<br>" . $conn->error;            }
        }

        public function user_authentication($email, $password){
           if(isset($_POST['save']))
            {
                extract($_POST);
                include 'connection.php';
                $sql=mysqli_query($conn,"SELECT * FROM users where email='$email' and Password='$password' ");
                $row  = mysqli_fetch_array($sql);
                if(is_array($row))
                {
                    $_SESSION["user_id"] = $row['user_id'];
                    $_SESSION["first_name"]=$row['first_name'];
                    $_SESSION["last_name"]=$row['last_name'];
                    $_SESSION["email"]=$row['email']; 
                    return 0;
                }
                else
                {
                    return 1;
                }
            }
        }    
        
        //public function users_list(){
          //  $sql = "SELECT id, first_name, last_name, user_name, email, password from users";
            
        //}

    }





?>

<?php
$servername = "localhost";
$username = "Malina";
$password = "malina123";
$database = 'WT';

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>







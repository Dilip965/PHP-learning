<?php
echo "Welcome to MySQL test";
// MySQL database connection

// 1. mysqli extension
// 2. PDO (PHP Data Object)

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";

// Connection object
$conn = mysqli_connect($servername, $username, $password);




$sql="create database workers";

$result=mysqli_query($conn,$sql);

echo "result".$result;

// If the connection is not successful
if (!$conn) {
    die("Sorry, we failed to connect: " . mysqli_connect_error());
} else {
    echo "Connection was successful";
}
?>

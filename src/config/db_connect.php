<?php
$servername1 = "92.42.111.73";     
$username1 = "ashishen_reWear";
$password1 = "reWear@123#$";
$database1 = "ashishen_reWear";


$conn = new mysqli($servername1, $username1, $password1, $database1);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
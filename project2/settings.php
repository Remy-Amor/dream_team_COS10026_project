<?php
// Database connection settings
$host = "127.0.0.1"; // works same as localhost, can append port number to it 
$user = "root";              // XAMPP default username
$pwd = "";                   // XAMPP default has no password
$sql_db = "eoi_db";  // Agreed project database name

// Establish the connection
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sanitize user input to prevent malicious injection
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}





 
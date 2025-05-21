<?php
// Database connection settings
$host = "localhost";
$user = "root";              // XAMPP default username
$pwd = "";                   // XAMPP default has no password
$sql_db = "project_part_two_db";  // Agreed project database name

// Establish the connection
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sanitize user input to prevent injection
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
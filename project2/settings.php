<?php
     $host = "localhost";         // because XAMPP runs the server locally
     $user = "root";          // default username for XAMPP's MySQL
     $pwd = "";              // default password is empty in XAMPP
     $sql_db = "eoi_db";  // wont work unless eoi_db is created locally

     $conn = mysqli_connect($host, $user, $pwd, $sql_db);

     if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
     }
?>
<?php
     session_start();
     require("settings.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="author" content="Remy Amor, William Anthony, Amanuial Ashagrie">
     <meta name="description" content="Homepage of Dream Team IT Solutions">
     <meta name="keywords" content="homepage, IT, software, software development, network, network administrator, jobs">
     <!-- link to styles.css -->
     <link rel="stylesheet" href="project1/styles/styles.css">
     <link rel="stylesheet" href="styles/styles.css">
     <!-- <link rel="stylesheet" href="styles/aman_styles.css"> -->

     <!-- link to responsive css -->
     <link rel="stylesheet" href="styles/responsive.css">
     <!-- link the manage styles -->
     <link rel="stylesheet" href="styles/manage_styles.css">
     <title>Manager Login</title>
</head>
<body>
     <?php include("header.inc"); ?>
     <main>
          <h1>Login</h1>
          <form action="login.php" novalidate method="post" class="login-signup-form">
          <div>
               <label for="manager_username">Username: </label>
               <input type="text" id="manager_username" name="manager_username">
          </div>
          <div>
               <label for="manager_password">Password: </label>
               <input type="password" id="manager_password" name="manager_password">
          </div>
          <div>
          <input type="submit" value="login">
          </div>
          </form>
     </main>
     <?php include("footer.inc"); ?>
</body>
</html>
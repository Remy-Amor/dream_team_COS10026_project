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
     <!-- link to manage styles -->
     <link rel="stylesheet" href="styles/manage_styles.css">
     <title>Manager Signup</title>
</head>
<body>
     <?php include("header.inc"); ?>
     <main>
     <h1>Signup</h1>
          <div class="login-signup-div">
          <form action="manager_signup.php" class="login-signup-form" novalidate="novalidate" method="post">
               <label for="manager_username">Username: </label>
               <input type="text" id="manager_username" name="manager_username">
               <br>
               <label for="manager_password">Password: </label>
               <input type="password" id="manager_password" name="manager_password">
               <label for="manager_password">Confirm Password: </label>
               <input type="password" id="confirm_manager_password" name="confirm_manager_password">
               <br>
               <input type="submit" value="signup">
          </form>
          </div>
          <?php
          if($_SERVER["REQUEST_METHOD"] == "POST") {
               // Get form data
               $manager_username = trim($_POST['manager_username']);
               $manager_hashed_password = password_hash(trim($_POST['manager_password']),PASSWORD_DEFAULT);
               // Insert user into the database
               $query = "INSERT INTO manager_details_tb (username, password) VALUES ('$manager_username', '$manager_hashed_password')";
               // check for duplicate username
               try {
                    $result = mysqli_query($conn, $query);
               }
               catch(exception) {
                    echo "<p class='new-user'> username already exists</p>";
               }
               if ($result) {
               echo "<p class='new-user'>Signup successful. You can now <a href='manager_login.php'>login</a>.</p>";
               } else {
               echo "<p class='new-user'>Signup failed. Please try again.</p>";
               }
          }
          ?>

          <p class="new-user">Already a user? <a href="manager_login.php">Login here</a>!</p>
     </main>
     <?php include("footer.inc"); ?>
</body>
</html>
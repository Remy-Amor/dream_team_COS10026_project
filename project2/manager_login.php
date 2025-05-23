<?php
     session_start();
     require("settings.php");

     if (isset($_SESSION["locked"])) {
          $difference = time() - $_SESSION["locked"];
          if ($difference > 30)
          {
               unset($_SESSION["locked"]);
               $_SESSION["login_attempt_no"] = 0;
          }
     }
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
          <div class="login-signup-div">
          <form action="manager_login.php" class="login-signup-form" novalidate="novalidate" method="post">
               <label for="manager_username">Username: </label>
               <input type="text" id="manager_username" name="manager_username">
               <br>
               <label for="manager_password">Password: </label>
               <input type="password" id="manager_password" name="manager_password">
               <br>
               <input type="submit" value="login">
          </form>
          </div>
          <?php
               if($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Get user input
                    $manager_username = trim($_POST['manager_username']);
                    $manager_password = password_hash(trim($_POST['manager_password']),PASSWORD_DEFAULT);
                    // Simple query to check credentials
                    $query = "SELECT * FROM manager_details_tb WHERE username = '$manager_username'";
                    $result = mysqli_query($conn, $query);
                    $user = mysqli_fetch_assoc($result);
                    if (($user) and password_verify($manager_password,$user['password'])===true) {
                    $_SESSION['manager_username'] = $user['username'];
                    // reset number of login attempts
                    $_SESSION['login_attempt_no'] = 0;
                    // user will be logged out after 30 minutes
                    $_SESSION['expires_at'] = time() + 1800;
                    header("Location: manage.php");
                    exit();
                    } else {
                    $_SESSION['login_attempt_no'] += 1;
                    if ($_SESSION['login_attempt_no'] == 3) {
                         echo "<p>Login has been locked for 30 seconds</p>";
                    }
                    echo "<p>Incorrect username or password. " . $_SESSION['login_attempt_no'] . "attempts remain </p>";
                    }
               }
               ?>

          <p class="new-user">New user? <a href="manager_signup.php">sign up here</a>!</p>
     </main>
     <?php include("footer.inc"); ?>
</body>
</html>
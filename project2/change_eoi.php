<?php
     session_start();
     require("settings.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
     <title>Results</title>
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
     <!-- link to manage css -->
     <link rel="stylesheet" href="styles/manage_styles.css">
</head>
<body>
     <?php include("header.inc"); ?>
     <main>
          <?php 
               if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $new_status = sanitize_input($_POST["status"]);
                    if(empty($new_status)) {
                         echo "<h3>Please select a status. <a href='manage.php'>Back to Manage Page</a></h3>";
                    }
               }

          ?>

     </main>
     <?php include("footer.inc"); ?>
</body>
</html>
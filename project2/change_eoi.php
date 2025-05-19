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
     <!-- link to manage css -->
     <link rel="stylesheet" href="styles/manage_styles.css">
     <title>Results</title>
</head>
<body>
     <?php include("header.inc"); ?>
     <main>
          <?php 
               if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $new_status = sanitize_input($_POST["status"]);
                    // if no status set
                    if(empty($new_status)) {
                         echo "<h3>Please select a status. <a href='manage.php'>Back to Manage Page</a></h3>";
                    }
                    // updates status and heads back to manage.php
                    else {
                         $record = $_POST['EOInumber'];
                         $sql = "UPDATE eoi_tb SET eoi_status = '$new_status' WHERE EOInumber = '$record'";
                         if (mysqli_query($conn, $sql)) {
                              echo "Record updated successfully";
                          } else {
                              echo "Error: " . mysqli_error($conn);
                          }
                         header("Location: manage.php");
                    }
               }

          ?>

     </main>
     <?php include("footer.inc"); ?>
</body>
</html>
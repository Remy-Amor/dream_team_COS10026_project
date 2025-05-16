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
     <title>Manage</title>
</head>
<body>
     <?php include("header.inc"); ?>
     <main>
          <h1>Manage Expressions of Interest</h1>
          <h2>EOI Table</h2>
          <?php
               $sql = "SELECT * from eoi_tb";
               $result = mysqli_query($conn, $sql);
               if($result) {
                         echo "<table>";
                         echo "<tr><th>ID</th><th>Make</th><th>Model</th><th>Price</th><th>Year</th></tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                         echo "<tr>";
                         echo "<td>" . $row['EOInumber'] . "</td>";
                         echo "<td>" . $row['job_ref_no'] . "</td>";
                         echo "<td>" . $row['first_name'] . "</td>";
                         echo "<td>" . $row['last_name'] . "</td>";
                         echo "<td>" . $row['street_address'] . "</td>";
                         echo "<td>" . $row['suburb_town'] . "</td>";
                         echo "<td>" . $row['state'] . "</td>";
                         echo "<td>" . $row['post_code'] . "</td>";
                         echo "<td>" . $row['email'] . "</td>";
                         echo "<td>" . $row['phone_number'] . "</td>";
                         echo "<td>" . $row['network_admin_skills'] . "</td>";
                         echo "<td>" . $row['software_developer_skills'] . "</td>";
                         echo "<td>" . $row['other_skills'] . "</td>";
                         echo "<td>" . $row['status'] . "</td>";
                         echo "</tr>";
                    }
                     echo "</table>";
               } else {
                    echo "<h3>No Records Found</h3>";
               }
          ?>
     </main>
     <?php include("footer.inc"); ?>
</body>
</html>
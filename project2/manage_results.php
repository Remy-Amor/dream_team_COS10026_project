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
     <!-- link to manage_styles.css -->
     <link rel="stylesheet" href="styles/manage_styles.css">
</head>
<body>
     <?php include("header.inc"); ?>
     <main>
     <?php
          if($_SERVER["REQUEST_METHOD"] == "POST") {
               if(isset($_POST["search_by_job_ref"])) {
                    $search_job_ref = sanitize_input($_POST["search_job_ref"]);
                    $sql = "SELECT * from eoi_tb WHERE job_ref_no = '$search_job_ref'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)>0) {
                         echo "<div class='table-wrapper'><table>";
                         echo "<tr><th>EOI number</th><th>Job Reference</th><th>First Name</th><th>Last Name</th>
                         <th>Street address</th><th>Suburb/town</th><th>State</th><th>Post Code</th>
                         <th>email</th><th>Phone number</th><th>Network admin skills</th>
                         <th>Software developer skills</th><th>Other skills</th><th>Change status</th><th>Change Status</th></tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                         $network_admin = $row['network_admin_skills'] ? 'true' : 'false';
                         $software_development = $row['software_developer_skills'] ? 'true' : 'false';
                         echo "<tr>
                         <td>" . $row['EOInumber'] . "</td>"
                         . "<td>" . $row['job_ref_no'] . "</td>"
                         . "<td>" . $row['first_name'] . "</td>"
                         . "<td>" . $row['last_name'] . "</td>"
                         . "<td>" . $row['street_address'] . "</td>"
                         . "<td>" . $row['suburb_town'] . "</td>"
                         . "<td>" . $row['state'] . "</td>"
                         . "<td>" . $row['postcode'] . "</td>
                         <td>" . $row['email'] . "</td>"
                         . "<td>" . $row['phone_number'] . "</td>"
                         . "<td>" . $network_admin . "</td>"
                         . "<td>" . $software_development . "</td>"
                         . "<td>" . $row['other_skills'] . "</td>"
                         . "<td>" . $row['eoi_status'] . "</td>"
                         . "<td> <form action='change_eoi.php' method='post' novalidate='novalidate'>
                              <select name='status' id='status' required>
                                   <option value=''>Change Status</option>
                                   <option value='New'>New</option>
                                   <option value='Current'>Current</option>
                                   <option value='Final'>Final</option>
                              </select>
                              <input type='hidden' name='EOInumber' value='" . $row['EOInumber'] . "'>
                              <input type='submit' value='change'> 
                         </form> </td>"
                         . "</tr>";
                    }
                     echo "</table></div>";
               } else {
                    echo "<h3>No Records Found</h3>";
               }
               }
          }
          ?>
     </main>
     <?php include("footer.inc"); ?>
</body>
</html>
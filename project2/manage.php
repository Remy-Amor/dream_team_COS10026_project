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
     <link rel="stylesheet" href="project1/styles/styles.css">
     <link rel="stylesheet" href="styles/styles.css">
     <link rel="stylesheet" href="styles/responsive.css">
     <link rel="stylesheet" href="styles/manage_styles.css">
     <title>Manage</title>
</head>
<body>
     <?php include("header.inc"); ?>
     <main>
          <?php
               if(isset($_SESSION['manager_username'])) {
                    echo "<p class='username-display'> Username is ". $_SESSION['manager_username'] . ", <a href='signout.php'>Sign out?</a></p>";

                    // ✅ NEW: Add or Delete Job Listings button
                    echo "<div class='manage-jobs-link'>
                            <a href='descriptions.php' class='button-link'>➕ Add or Delete Job Listings</a>
                          </div>";
               }
               else {
                    header("Location: manager_login.php");
               }
          ?>
          <h1>Manage Expressions of Interest</h1>
          <h2>EOI Table</h2>
          <form action="manage.php" class="sort_form" method="post">
               <label for="sort_by">Sort by:</label>
               <select name="sort_by" id="sort_by">
                    <option value="">Select Sort Value</option>
                    <option value="first_name">First name</option>
                    <option value="last_name">Last name</option>
                    <option value="skills">Skills</option>
                    <option value="eoi_status">Status</option>
               </select>
               <input type="submit" value="sort">
          </form>
          <?php
               $sql = "SELECT * from eoi_tb";
               if(isset($_POST['sort_by'])) {
                    $column = $_POST['sort_by'];
                    $sql .= " ORDER BY $column ASC";
               }
               $result = mysqli_query($conn, $sql);
               if(mysqli_num_rows($result)>0) {
                         echo "<div class='table-wrapper'><table>";
                         echo "<tr><th>EOI number</th><th>Job Reference</th><th>First Name</th><th>Last Name</th>
                         <th>Street address</th><th>Suburb/town</th><th>State</th><th>Post Code</th>
                         <th>email</th><th>Phone number</th><th>Skills</th>
                         <th>Other skills</th><th>Change status</th><th>Change Status</th></tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
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
                         . "<td>" . $row['skills'] . "</td>"
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
          ?>
          <div class="query-div">
          <form action="manage_results.php" method="post" class="query-form">
               <legend>Search by Job Reference</legend>
               <select name="search_job_ref" id="search_job_ref" required>
                    <option value="">Select a job reference number</option>
                    <?php
                              $sql = "SELECT job_ref FROM jobs";
                              $result = mysqli_query($conn, $sql);
                              while($row = mysqli_fetch_assoc($result)) {
                                   $value = htmlspecialchars($row['job_ref']);
                                   echo "<option value='$value'>$value</option>";
                              }
                         ?>
               </select>
               <input type="hidden" name="search_by_job_ref"value="search_by_job_ref">
               <br><br>
               <input type="submit" value="submit">
          </form>
          <form action="manage_results.php" method="post" class="query-form">
               <legend>Delete Records</legend>
               <select name="delete_job_ref" id="delete_job_ref" required>
                    <option value="">Select a job reference number</option>
                    <?php
                              $sql = "SELECT job_ref FROM jobs";
                              $result = mysqli_query($conn, $sql);
                              while($row = mysqli_fetch_assoc($result)) {
                                   $value = htmlspecialchars($row['job_ref']);
                                   echo "<option value='$value'>$value</option>";
                              }
                         ?>
               </select>
               <input type="hidden" name="delete_by_job_ref" value="delete_by_job_ref">
               <br><br>
               <input type="submit" value="submit">
          </form>
          </div>
          <div class="query-div">
          <form action="manage_results.php" method="post" class="query-form">
               <legend>Search by Name</legend>
               <label for="search_first_name">First Name:</label>
               <input type="text" name="search_first_name">
               <br>
               <label for="search_last_name">Last Name:</label>
               <input type="text" name="search_last_name">
               <input type="hidden" name="search_by_name" value="search_by_name">
               <input type="submit" value="submit">
          </form>
          </div>
     </main>
     <?php include("footer.inc"); ?>
</body>
</html>
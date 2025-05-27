<?php
// WA - Setup database connection using credentials from settings.php
require_once "settings.php";

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("<p>Database connection failure: " . mysqli_connect_error() . "</p>");
}

// WA - Include the common site header
include 'header.inc';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- WA - Meta tags for responsive design and author info -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Remy Amor, William Anthony, Amanuial Ashagrie">
    <meta name="description" content="Jobs page for dream_team_COS10026">
    <meta name="keywords" content="Jobs page inc requirements">

    <!-- WA - Page title and linked stylesheets -->
    <title>Dream Team IT Solutions - Jobs Page</title>
    <link rel="stylesheet" href="styles/responsive.css">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/descriptions.css">
</head>

<body>
    <h1>Edit Job Descriptions</h1><br>
    <?php if (isset($_GET['insert']) && $_GET['insert'] === 'success'): ?>
  <p style="color: green; font-weight: bold;">✅ Job was successfully added.</p>
<?php endif; ?>

    <section id="job-form-section"> 
      <h2>Post a New Job</h2>
      <form action="insert_job.php" method="post">
        <label for="job_ref">Job Reference Number:</label><br>
        <input type="text" id="job_ref" name="job_ref" required><br><br>

        <label for="title">Job Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location" required><br><br>

        <label for="job_type">Job Type:</label><br>
        <input type="text" id="job_type" name="job_type" required><br><br>

        <label for="department">Department:</label><br>
        <input type="text" id="department" name="department" required><br><br>

        <label for="reports_to">Reports To:</label><br>
        <input type="text" id="reports_to" name="reports_to" required><br><br>

        <label for="salary">Salary:</label><br>
        <input type="text" id="salary" name="salary" required><br><br>

        <label for="summary">Job Summary:</label><br>
        <textarea id="summary" name="summary" rows="4" cols="50" required></textarea><br><br>

        <label for="responsibilities">Responsibilities:</label><br>
        <textarea id="responsibilities" name="responsibilities" rows="4" cols="50" required></textarea><br><br>

        <label for="qualifications">Qualifications:</label><br>
        <textarea id="qualifications" name="qualifications" rows="4" cols="50" required></textarea><br><br>

        <label for="preferences">Preferences:</label><br>
        <textarea id="preferences" name="preferences" rows="4" cols="50" required></textarea><br><br>

        <label for="benefits">Benefits:</label><br>
        <textarea id="benefits" name="benefits" rows="4" cols="50" required></textarea><br><br>

        <label for="closing_date">Closing Date:</label><br>
        <input type="date" id="closing_date" name="closing_date" required><br><br>

        <input type="submit" value="Submit Job">
      </form>
    </section>

    <hr><br>

    <section id="delete-job-section">
      <h2>Delete a Job</h2>
      <?php if (isset($_GET['delete']) && $_GET['delete'] === 'success'): ?>
  <p style="color: darkred; font-weight: bold;">🗑️ Job was successfully deleted.</p>
<?php endif; ?>
      <form action="delete_job.php" method="post">
        <label for="job_ref">Select Job Reference to Delete:</label><br>
        <select id="job_ref" name="job_ref" required>
          <option value="">-- Select Job Reference --</option>
          <?php
          // WA - Fetch job reference numbers from the 'jobs' table
          $query = "SELECT job_ref FROM jobs ORDER BY job_ref ASC";
          $result = mysqli_query($conn, $query);

          if ($result && mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value=\"" . htmlspecialchars($row['job_ref']) . "\">" . htmlspecialchars($row['job_ref']) . "</option>";
              }
          } else {
              echo "<option value=\"\">No jobs available</option>";
          }
          ?>
        </select><br><br>
        <input type="submit" value="Delete Job">
      </form>
    </section>

<?php 
// WA - Include the common site footer
include 'footer.inc'; 
?>
</body>
</html>
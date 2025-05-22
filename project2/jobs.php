<?php
require_once "settings.php";

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("<p>Database connection failure: " . mysqli_connect_error() . "</p>");
}

include 'header.inc';
?>

<head>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Job Listings</title>
  <link rel="stylesheet" href="styles/jobs.css">
  <link rel="stylesheet" href="styles/styles.css">
</head>

</head>
<main><div class="jobs-container">
<?php
$sql = "SELECT * FROM jobs ORDER BY job_ref";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($job = mysqli_fetch_assoc($result)) {
        echo '<section class="job-section">';
        echo "<h2>{$job['title']} (Ref: {$job['job_ref']})</h2>";
        echo "<ul>
                <li><strong>Location:</strong> {$job['location']}</li>
                <li><strong>Job-Type:</strong> {$job['job_type']}</li>
                <li><strong>Department:</strong> {$job['department']}</li>
                <li><strong>Reports To:</strong> {$job['reports_to']}</li>
                <li><strong>Salary:</strong> {$job['salary']}</li>
              </ul>";
        echo "<h3>Job Summary</h3><p>{$job['summary']}</p>";
        echo "<h3>Key Responsibilities</h3><ul>{$job['responsibilities']}</ul>";
        echo "<h3>Qualifications & Skills</h3><h4>Essential</h4><ul>{$job['qualifications']}</ul>";
        echo "<h4>Preferable</h4><ul>{$job['preferences']}</ul>";
        echo "<h3>Benefits</h3><ul>{$job['benefits']}</ul>";
        echo '<aside><p><a href="apply.php">Join Us Now</a></p></aside>';
        echo '</section>';
    }
} else {
    echo "<p>No job listings available at this time.</p>";
}

mysqli_close($conn);
?>
</div></main>
<?php include 'footer.inc'; ?>
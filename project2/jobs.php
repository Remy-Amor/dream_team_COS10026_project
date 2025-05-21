<?php
require_once "settings.php";

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("<p>Database connection failure: " . mysqli_connect_error() . "</p>");
}

$createJobsSQL = "CREATE TABLE IF NOT EXISTS jobs (
    job_ref VARCHAR(10) PRIMARY KEY,
    title VARCHAR(100),
    description TEXT,
    closing_date DATE
)";
mysqli_query($conn, $createJobsSQL);

$checkJobs = mysqli_query($conn, "SELECT COUNT(*) FROM jobs");
$count = mysqli_fetch_row($checkJobs)[0];
if ($count == 0) {
    mysqli_query($conn, "INSERT INTO jobs (job_ref, title, description, closing_date) VALUES
        ('SE41B', 'Software Engineer', 'Develop and maintain enterprise web applications.', '2025-07-01'),
        ('NA23X', 'Network Administrator', 'Manage and troubleshoot enterprise networks.', '2025-07-10')");
}

include 'header.inc';
echo "<main>";
echo "<h2 class='visually-hidden'>Job Listings</h2>";
echo "<section aria-labelledby='jobs-heading' class='job-listings'>";
echo "<h2 id='jobs-heading'>Available Jobs</h2>";

$result = mysqli_query($conn, "SELECT * FROM jobs");

while ($row = mysqli_fetch_assoc($result)) {
    echo "<article class='job-card' tabindex='0' aria-labelledby='job-{$row['job_ref']}'>";
    echo "<header><h3 id='job-{$row['job_ref']}' class='job-title'>{$row['title']} ({$row['job_ref']})</h3></header>";
    echo "<p class='job-description'>{$row['description']}</p>";
    echo "<p class='job-closing'><strong>Closing Date:</strong> <time datetime='{$row['closing_date']}'>{$row['closing_date']}</time></p>";
    echo "</article>";
}

echo "</section></main>";
include 'footer.inc';

mysqli_close($conn);
?>
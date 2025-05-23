<?php
require_once "settings.php";

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("<p>Database connection failure: " . mysqli_connect_error() . "</p>");
}

include 'header.inc';
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Remy Amor, William Anthony, Amanuial Ashagrie">
    <meta name="description" content="Jobs page for dream_team_COS10026">
    <meta name="keywords" content="Jobs page inc requirements">
    <title>Dream Team IT Solutions - Jobs Page</title>
    <link rel="stylesheet" href="styles/responsive.css">
    <link rel="stylesheet" href="styles/jobs.css">
    <link rel="stylesheet" href="styles/styles.css">
</head>

<main>
    <section class="jobs-intro">
        <h1>Current Opportunities</h1>
        <p>Welcome to Dream Team IT Solutions! We’re always on the lookout for great talent. Browse our open roles below and see where you could make an impact.</p>
    </section>
    <div class="jobs-container">
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
    </div>
</main>
<?php include 'footer.inc'; ?>
<?php
// WA- Setup database connection using credentials from settings.php
require_once "settings.php";

// WA- Attempt to connect to the database, suppress error output to handle it manually
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

// WA- Show a user-friendly message if connection fails
if (!$conn) {
    die("<p>Database connection failure: " . mysqli_connect_error() . "</p>");
}

// WA- Include the common site header
include 'header.inc';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- WA- Meta tags for responsive design and author info -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Remy Amor, William Anthony, Amanuial Ashagrie">
    <meta name="description" content="Jobs page for dream_team_COS10026">
    <meta name="keywords" content="Jobs page inc requirements">
    
    <!-- WA- Page title and linked stylesheets -->
    <title>Dream Team IT Solutions - Jobs Page</title>
    <link rel="stylesheet" href="styles/responsive.css">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/jobs.css">
</head>

<body>
<main>
    <!-- WA- Intro section for current opportunities -->
    <section class="jobs-intro">
        <h1>Current Opportunities</h1>
        <p>Welcome to Dream Team IT Solutions! We’re always on the lookout for great talent. Browse our open roles below and see where you could make an impact.</p>
    </section>

    <div class="jobs-container">
    <?php
    // WA- Fetch all job records ordered by reference number
    $sql = "SELECT * FROM jobs ORDER BY job_ref";
    $result = mysqli_query($conn, $sql);

    // WA- Check if any job records exist
    if (mysqli_num_rows($result) > 0) {
        // WA- Loop through each job 
        while ($job = mysqli_fetch_assoc($result)) {
            echo '<section class="job-section">';
            
            // WA- Sanitize all output to prevent HTML injection
            echo "<h2>" . htmlspecialchars($job['title']) . " (Ref: " . htmlspecialchars($job['job_ref']) . ")</h2>";
            echo "<ul>
                    <li><strong>Location:</strong> " . htmlspecialchars($job['location']) . "</li>
                    <li><strong>Job-Type:</strong> " . htmlspecialchars($job['job_type']) . "</li>
                    <li><strong>Department:</strong> " . htmlspecialchars($job['department']) . "</li>
                    <li><strong>Reports To:</strong> " . htmlspecialchars($job['reports_to']) . "</li>
                    <li><strong>Salary:</strong> " . htmlspecialchars($job['salary']) . "</li>
                </ul>";

            // WA- Sanitize text content while preserving line breaks if needed
            echo "<h3>Job Summary</h3><p>" . htmlspecialchars($job['summary']) . "</p>";
            echo "<h3>Key Responsibilities</h3><ul>" . htmlspecialchars($job['responsibilities']) . "</ul>";
            echo "<h3>Qualifications & Skills</h3><h4>Essential</h4><ul>" . htmlspecialchars($job['qualifications']) . "</ul>";
            echo "<h4>Preferable</h4><ul>" . htmlspecialchars($job['preferences']) . "</ul>";
            echo "<h3>Benefits</h3><ul>" . htmlspecialchars($job['benefits']) . "</ul>";
            
            // WA- Link to application page
            echo '<aside><p><a href="apply.php">Join Us Now</a></p></aside>';
            echo '</section>';
        }
    } else {
        // WA- Fallback message if no jobs are found
        echo "<p>No job listings available at this time.</p>";
    }

    // WA- Close the database connection
    mysqli_close($conn);
    ?>
    </div>
</main>

<!-- WA- Include the common site footer -->
<?php include 'footer.inc'; ?>
</body>
</html>
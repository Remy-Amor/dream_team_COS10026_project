<?php
// WA - Commenting was cleaned up using chat-gpt
// WA - Import DB settings and connect
require_once "settings.php";

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("WA - Database connection failure: " . mysqli_connect_error());
}

// WA - Sanitize POST inputs
$job_ref         = sanitize_input($_POST['job_ref']);
$title           = sanitize_input($_POST['title']);
$location        = sanitize_input($_POST['location']);
$job_type        = sanitize_input($_POST['job_type']);
$department      = sanitize_input($_POST['department']);
$reports_to      = sanitize_input($_POST['reports_to']);
$salary          = sanitize_input($_POST['salary']);
$summary         = sanitize_input($_POST['summary']);
$responsibilities= sanitize_input($_POST['responsibilities']);
$qualifications  = sanitize_input($_POST['qualifications']);
$preferences     = sanitize_input($_POST['preferences']);
$benefits        = sanitize_input($_POST['benefits']);
$closing_date    = sanitize_input($_POST['closing_date']);

// WA - Validate job reference: must be at least 5 characters, only letters/numbers
if (!preg_match('/^[A-Za-z0-9]{5,}$/', $job_ref)) {
    header("Location: descriptions.php?insert=invalidref");
    exit();
}

// WA - Basic validation: ensure no required fields are empty
if (
    empty($job_ref) || empty($title) || empty($location) || empty($job_type) ||
    empty($department) || empty($reports_to) || empty($salary) ||
    empty($summary) || empty($responsibilities) || empty($qualifications) ||
    empty($preferences) || empty($benefits) || empty($closing_date)
) {
    // WA - Redirect back with an error if validation fails
    header("Location: descriptions.php?insert=error");
    exit();
}

// WA - Prepare SQL insert using a prepared statement
$query = "INSERT INTO jobs (
    job_ref, title, location, job_type, department, reports_to, salary,
    summary, responsibilities, qualifications, preferences, benefits, closing_date
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $query);

// WA - Bind parameters to statement
mysqli_stmt_bind_param($stmt, "sssssssssssss",
    $job_ref, $title, $location, $job_type, $department, $reports_to, $salary,
    $summary, $responsibilities, $qualifications, $preferences, $benefits, $closing_date
);

// WA - Execute and clean up
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);

// WA - Simulation of post method to return user to descriptions.php - done with chat gpt using the prompt " How to redirect user back to descriptins with post method"
<?php
// WA - POST redirect to descriptions.php with insert=success flag
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Redirecting...</title>
</head>
<body>
    <form id="postBackForm" action="descriptions.php" method="post">
        <input type="hidden" name="insert_status" value="success">
    </form>
    <script>
        document.getElementById("postBackForm").submit();
    </script>
</body>
</html>';
exit();
?>
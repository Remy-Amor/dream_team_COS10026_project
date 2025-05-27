<?php
// WA - Commenting was cleaned up using chat-gpt
// WA - Import DB settings and connect
require_once "settings.php";

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("WA - Database connection failure: " . mysqli_connect_error());
}

// WA - Sanitize input from POST
$job_ref = sanitize_input($_POST['job_ref']);

// WA - Validate that a job reference was provided
if (empty($job_ref)) {
    // WA - Redirect back with error if job_ref is missing
    header("Location: descriptions.php?delete=error");
    exit();
}

// WA - Prepare DELETE SQL query
$query = "DELETE FROM jobs WHERE job_ref = ?";
$stmt = mysqli_prepare($conn, $query);

// WA - Bind the job reference parameter to the prepared statement
mysqli_stmt_bind_param($stmt, "s", $job_ref);

// WA - Execute the deletion and clean up
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);

// WA - Simulation of post method to return user to descriptions.php - done with chat gpt using the prompt " How to redirect user back to descriptins with post method"

echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Redirecting...</title>
</head>
<body>
    <form id="postBackForm" action="descriptions.php" method="post">
        <input type="hidden" name="delete_status" value="success">
    </form>
    <script>
        document.getElementById("postBackForm").submit();
    </script>
</body>
</html>';
exit();
?>
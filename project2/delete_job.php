<?php
require_once "settings.php";

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Database connection failure: " . mysqli_connect_error());
}

$job_ref = sanitize_input($_POST['job_ref']);

$query = "DELETE FROM jobs WHERE job_ref = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $job_ref);

mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);

header("Location: description.php");
exit();
?>
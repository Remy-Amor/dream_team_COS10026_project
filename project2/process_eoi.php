<?php
     session_start();
     require("settings.php");

     // Use of Gen AI to generate the following Validation Functions
     function isValidName($name) {
         if (preg_match("/^[a-zA-Z]{1,20}$/", $name)) {
             return $name; 
         }
         return false;
     }

     function isValidStreetAddress($address) {
         if (preg_match("/^[a-zA-Z0-9, ]{1,40}$/", $address)) {
             return $address;
         }
         return false;
     }

     function isValidSuburbTown($suburb) {
         if (preg_match("/^[a-zA-Z ]{1,40}$/", $suburb)) {
             return $suburb;
         }
         return false;
     }

     function validatePhoneNumber($phone) {
         if (preg_match('/^[\d ]{8,12}$/', $phone)) {
             return $phone;
         }
         return false;
     }

     // WA: Prevent direct access to process_eoi.php by checking request method
     if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
         header("Location: about.php");
         exit();
     }

     // Check if the form is submitted
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
         // Sanitize and validate input data
         $job_ref_no = sanitize_input($_POST["job_ref"]);
         $first_name = isValidName(sanitize_input($_POST["first_name"]));
         $last_name = isValidName(sanitize_input($_POST["last_name"]));
         $dob = sanitize_input($_POST["date_of_birth"]);
         $gender = sanitize_input($_POST["gender"]);
         $street_address = isValidStreetAddress(sanitize_input($_POST["street_address"]));
         $suburb_town = isValidSuburbTown(sanitize_input($_POST["suburb_or_town"]));
         $state = sanitize_input($_POST["state"]);
         $post_code = sanitize_input($_POST["post_code"]);
         $email = filter_var(filter_var(sanitize_input($_POST["email"]), FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
         $phone_number = validatePhoneNumber(sanitize_input($_POST["phone_number"]));
         $skills = $_POST['skills'] ?? [];
         $other_skills = sanitize_input($_POST["other_skills"]);

         $errors = [];

        //  Use of GEN AI to generate the following error validations 
        if (empty($job_ref_no)) $errors[] = "Job reference number is required.";
        if (empty($first_name) || $first_name == false) $errors[] = "Valid First name is required.";
        if (empty($last_name) || $last_name == false) $errors[] = "Valid Last name is required.";
        if (empty($street_address) || $street_address == false) $errors[] = "Valid Street address is required.";
        if (empty($suburb_town) || $suburb_town == false) $errors[] = "Valid Suburb or town is required.";
        if (empty($email) || $email == false) $errors[] = "Valid email is required.";
        if (empty($phone_number) || $phone_number == false) $errors[] = "Valid phone number is required.";
        if (empty($dob)) $errors[] = "Date of birth is required.";
        if (empty($gender)) $errors[] = "Gender is required.";
        if (empty($state)) $errors[] = "State is required.";
        if (empty($post_code)) $errors[] = "Post code is required.";


         // WA: Ensures required fields meet format requirements; otherwise, redirect to error
         if (!empty($errors) || $first_name === false || $last_name === false || $suburb_town === false || $email === false || $phone_number === false) {
             $_SESSION['errors'] = $errors;
             header('Location: error_page.php');
             exit();
         }

         // WA: Creates eoi_tb table if it doesn't already exist (attribution: Gen AI assisted)
         $createSQL = "CREATE TABLE IF NOT EXISTS eoi_tb (
             EOInumber INT AUTO_INCREMENT PRIMARY KEY,
             job_ref_no VARCHAR(10),
             first_name VARCHAR(20),
             last_name VARCHAR(20),
             street_address VARCHAR(40),
             suburb_town VARCHAR(40),
             state VARCHAR(3),
             postcode VARCHAR(4),
             email VARCHAR(100),
             phone_number VARCHAR(15),
             network_admin_skills VARCHAR(50),
             software_developer_skills VARCHAR(50),
             other_skills TEXT,
             eoi_status VARCHAR(20) DEFAULT 'New'
         )";
         mysqli_query($conn, $createSQL);   

         // WA: Skill classification logic - marks "Yes" if matching skill exists in selection
         $network_admin_skills = in_array('network_diagnostics', $skills) || in_array('network_security', $skills) ? 'Yes' : 'No';
         $software_developer_skills = in_array('programming', $skills) || in_array('version_control', $skills) ? 'Yes' : 'No';

         // Insert data into the database
         $sql = "INSERT INTO eoi_tb (job_ref_no, first_name, last_name, street_address, suburb_town, state, postcode, email, phone_number, network_admin_skills, software_developer_skills, other_skills) VALUES ('$job_ref_no', '$first_name', '$last_name', '$street_address', '$suburb_town', '$state', '$post_code', '$email', '$phone_number', '$network_admin_skills', '$software_developer_skills', '$other_skills')";
     }

     if (mysqli_query($conn, $sql)) {
         echo "Insert successful<br>";
     } else {
         echo "Insert failed: " . mysqli_error($conn) . "<br>";
     }

     $sql = "SELECT EOInumber FROM eoi_tb WHERE first_name LIKE '%$first_name%' ORDER BY EOInumber DESC LIMIT 1";
     $result = mysqli_query($conn, $sql);

     if ($result && mysqli_num_rows($result) > 0) {
         $row = mysqli_fetch_assoc($result);
         $eoi_number = $row['EOInumber'];
     } else {
         $eoi_number = "Unavailable";
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Message</title>
    <link rel="stylesheet" href="project1/styles/styles.css">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/responsive.css">
</head>
<body>
    <?php include 'header.inc';?>
    <main>
        <h2>Thank you for your application!</h2>
        <p>Your Expression of Interest has been recorded successfully.</p>
        <p>Your EOInumber is: <strong><?php echo htmlspecialchars($eoi_number); ?></strong></p>
    </main>
    <?php include 'footer.inc';?>
</body>
</html>

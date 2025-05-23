<?php
     session_start();
     require("settings.php");

     // Use of AI to generate the following Validation Functions
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
         $skills = array_map('htmlspecialchars', $_POST['skills']);
         $other_skills = sanitize_input($_POST["other_skills"]);

         // WA: Ensures required fields meet format requirements; otherwise, redirect to error
         if ($first_name === false || $last_name === false || $suburb_town === false || $email === false || $phone_number === false) {
             header('Location: error_page.php');
             exit();
         }

         // WA: Validates gender radio selection for allowed values only
         if (!in_array($gender, ['male', 'female', 'other'])) {
             header('Location: error_page.php');
             exit();
         }

         // WA: Validates that at least one skill or the other_skills text area is filled
         if (empty($skills) && empty($other_skills)) {
             header('Location: error_page.php');
             exit();
         }  
        // skills get concatenated 
        $skills_concatenated = implode(', ', $skills);
         // Insert data into the database
         $sql = "INSERT INTO eoi_tb (job_ref_no, first_name, last_name, street_address, suburb_town, state,
          postcode, email, phone_number, skills, other_skills) 
          VALUES ('$job_ref_no', '$first_name', '$last_name', '$street_address', '$suburb_town', '$state', '$post_code',
           '$email', '$phone_number', '$skills_concatenated', '$other_skills')";
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

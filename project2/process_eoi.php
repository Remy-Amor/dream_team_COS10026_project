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
        $network_admin_skills = isset($_POST['skills']);
        $software_developer_skills = isset($_POST['skills']);
        $other_skills = sanitize_input($_POST["other_skills"]);


        if ($firstName === false || $lastName === false || $suburb === false || $email === false || $phone === false) {
            header('Location: error_page.php');
            exit();
        }
        
        
        // Insert data into the database
        $sql = "INSERT INTO eoi_tb (job_ref_no, first_name, last_name, street_address, suburb_town, state, postcode, email, phone_number, network_admin_skills, software_developer_skills, other_skills) VALUES ('$job_ref_no', '$first_name', '$last_name', '$street_address', '$suburb_town', '$state', '$postcode', '$email', '$phone_number', '$network_admin_skills', '$software_developer_skills', '$other_skills')";
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
    <!-- link to styles.css -->
     <link rel="stylesheet" href="project1/styles/styles.css">
     <link rel="stylesheet" href="styles/styles.css">

     <!-- link to responsive css -->
     <link rel="stylesheet" href="styles/responsive.css">
     <!-- <link rel="stylesheet" href="styles/aman_styles.css"> -->
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
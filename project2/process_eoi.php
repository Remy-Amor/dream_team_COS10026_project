<?php
     session_start();
     require("settings.php");

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize and validate input data
        $job_ref_no = sanitize_input($_POST["job_ref_no"]);
        $first_name = sanitize_input($_POST["first_name"]);
        $last_name = sanitize_input($_POST["last_name"]);
        $street_address = sanitize_input($_POST["street_address"]);
        $suburb_town = sanitize_input($_POST["suburb_town"]);
        $state = sanitize_input($_POST["state"]);
        $post_code = sanitize_input($_POST["post_code"]);
        $email = filter_var(sanitize_input($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $phone_number = sanitize_input($_POST["phone_number"]);
        $network_admin_skills = isset($_POST['network_admin_skills']) ? implode(", ", $_POST['network_admin_skills']) : '';
        $software_developer_skills = isset($_POST['software_developer_skills']) ? implode(", ", $_POST['software_developer_skills']) : '';
        $other_skills = sanitize_input($_POST["other_skills"]);

        // Insert data into the database
        $sql = "INSERT INTO eoi_tb (job_ref_no, first_name, last_name, street_address, suburb_town, state, post_code, email, phone_number, network_admin_skills, software_developer_skills, other_skills) VALUES ('$job_ref_no', '$first_name', '$last_name', '$street_address', '$suburb_town', '$state', '$post_code', '$email', '$phone_number', '$network_admin_skills', '$software_developer_skills', '$other_skills')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            header("Location: manage.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>
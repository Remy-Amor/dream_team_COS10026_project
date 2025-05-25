<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Remy Amor, William Anthony, Amanuial Ashagrie">
    <meta name="description" content="Enhancements page for WAR website (dream_team_COS10026)">
    <meta name="keywords" content="Enhancements made for 2nd part of project">
    <title>Dream Team IT Solutions - Enhancements</title>
    <!-- WA- Linking global stylesheets for layout and responsiveness -->
    <link rel="stylesheet" href="styles/responsive.css">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/enhancements.css">
</head>
<body>

<?php 
// WA- Include shared site header content (e.g., nav, logo)
include 'header.inc'; 
?>

<main>
    <div id="enhancements">
        <!-- WA- Image generated using ChatGPT-4 image generation tools -->
        <img src="styles/images/enhancements_icon.png" alt="Enhancements icon">
        <h1>Project Enhancements</h1>
    </div>

    <section class="enhancement-card">
        <h2>1. Manager Registration</h2>
        <p>Signup is configured at <code>manager_signup.php</code>, and new manager details are added to the <code>manager_details_tb</code> table (password is hashed). Usernames cannot be duplicated.</p>
        <!-- WA- Relates to backend form validation and password encryption logic -->
    </section>

    <section class="enhancement-card">
        <h2>2. Manager Login</h2>
        <p>The <code>manager_login.php</code> page allows managers to log in using credentials from the signup page. On unsuccessful login, a message is displayed. <code>manage.php</code> and associated result-processing pages are protected unless a manager is logged in.</p>
        <!-- WA- Controlled via PHP session handling and access control logic -->
    </section>

    <section class="enhancement-card">
        <h2>3. Login Locking</h2>
        <p>After three unsuccessful login attempts, the user is blocked from logging in for 30 seconds, and a message is shown. After 30 seconds, refreshing the page will reveal the login button again.</p>
        <!-- WA- Involves session/cookie timing logic, possibly stored in server memory or a DB field -->
    </section>

    <section class="enhancement-card">
        <h2>4. Sorting Records</h2>
        <p>For each EOI record display, the user has a dropdown option to sort records by fields such as first name, last name, and skills.</p>
        <!-- WA- Likely implemented using GET parameters and SQL ORDER BY in the backend -->
    </section>
</main>

<?php 
// WA- Include shared footer content (e.g., copyright)
include 'footer.inc'; 
?>

</body>
</html>
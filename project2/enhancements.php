<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Remy Amor, William Anthony, Amanuial Ashagrie">
    <meta name="description" content="Enhancements page for WAR website (dream_team_COS10026)">
    <meta name="keywords" content="Enhancements made for 2nd part of project">
    <title>Dream Team IT Solutions - Enhancements</title>
    <link rel="stylesheet" href="styles/responsive.css">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/enhancements.css">
</head>
<body>

<?php include 'header.inc'; ?>

<main>
    <div id="enhancements">
        <img src="styles/images/enhancements_icon.png" alt="enhancements icon">
        <h1>Project Enhancements</h1>
     </div>

    <section class="enhancement-card">
        <h2>1. Server-Side Validation</h2>
        <p>All form inputs on <code>apply.php</code> are validated on the server in <code>process_eoi.php</code> to ensure that data meets expected formats and constraints. This includes regex checks, dropdown selections, email format, and conditional logic for skill selections.</p>
    </section>

    <section class="enhancement-card">
        <h2>2. Conditional Skill Validation</h2>
        <p>The form requires that either at least one skill checkbox is selected or that the 'Other Skills' field is filled. This improves data quality and aligns with project requirements.</p>
    </section>

    <section class="enhancement-card">
        <h2>3. Direct Access Prevention</h2>
        <p><code>process_eoi.php</code>, <code>manage_results.php</code>, <code>change_eoi.php</code> and <code>settings.php</code> include logic to block direct URL access. If accessed without a POST request, the user is redirected back to the form page.</p>
    </section>

    <section class="enhancement-card">
        <h2>4. Dynamic Job Listings</h2>
        <p>Job descriptions are loaded dynamically from a MySQL database. This allows content updates to be made without modifying HTML code and supports scalability.</p>
    </section>

    <section class="enhancement-card">
        <h2>5. Responsive Layout</h2>
        <p>Pages including <code>jobs.php</code> are styled with responsive CSS layouts using grid and flexbox. They adjust gracefully across various screen sizes including mobile, tablet, and desktop.</p>
    </section>

    <section class="enhancement-card">
        <h2>6. Accessible Structure</h2>
        <p>Semantic HTML is used throughout, including <code>&lt;fieldset&gt;</code>, <code>&lt;legend&gt;</code>, <code>&lt;time&gt;</code>, and ARIA attributes. Keyboard focus outlines and screen reader-friendly headings are also implemented.</p>
    </section>

    <section class="enhancement-card">
        <h2>7. Automatic Table Creation</h2>
        <p>When <code>process_eoi.php</code> is first used, it checks whether the required database table exists and creates it if missing, ensuring deployment compatibility.</p>
    </section>

    <section class="enhancement-card">
        <h2>8. Secure and Modular PHP Structure</h2>
        <p>All shared components like headers, footers, and navigation bars are placed in reusable <code>.inc</code> files and imported where needed. This reduces redundancy and improves maintainability.</p>
    </section>

    <section class="enhancement-card">
        <h2>9. AI-Assisted Styling</h2>
        <p>Some CSS layout techniques (e.g., responsive grid, bubble card layout) were guided using AI tools for optimal readability and device adaptability.</p>
    </section>
</main>

<?php include 'footer.inc'; ?>

</body>
</html>
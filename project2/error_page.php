<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/styles.css">

    <link rel="stylesheet" href="styles/responsive.css">
    <!-- Error tyles page -->
    <link rel="stylesheet" href="styles/error_styles.css">

</head>
<body>
    <?php include 'header.inc'; ?>

    <main>
        <div class="error-container">
        <h1>Oops! Something went wrong.</h1>
        <p>Your input was invalid. Please check your form and try again.</p>
        <p><a href="apply.php">Go back to the form</a></p>
        </div>
        <?php
            session_start();

            if (isset($_SESSION['errors'])) {
                echo '<div class="error-messages">';
                
                $i = 0;
                while ($i < count($_SESSION['errors'])) {
                    echo "<p>" . $_SESSION['errors'][$i] . "</p>";
                    $i++;
                }

                echo '</div>';
            }
            ?>
    </main>
    <?php include 'footer.inc'; ?>
</body>
</html>
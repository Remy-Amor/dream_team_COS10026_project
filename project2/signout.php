<?php
     session_start();
     require("settings.php");

     if(isset($_SESSION['manager_username'])){
          unset($_SESSION['manager_username']);
     }
     header("Location: manage.php")

?>


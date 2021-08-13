<!DOCTYPE html>

<html>
    <head>
        <title>Log in/Register</title>

        <!-- meta tags -->
        <meta charset="utf-8">
        <meta name="keywords" content="register,blog,blogger" />
        <meta name="description" content="Logout page of the blog" />

        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/form.css" />

        <!--Based on user preference, show the theme they used from last time-->
        <link rel="stylesheet" href="css/<?php
            if(isset($_SESSION["theme"])) {
                echo $_SESSION["theme"];
            } else {
                echo "light";
            }
        ?>.css" />
    </head>

    <body>
        <!-- Disconnect from all user session -->
        <?php 
            session_start();
            unset($_SESSION["userid"]);
            unset($_SESSION["email"]);
            unset($_SESSION["display_name"]);
            unset($_SESSION["is_admin"]);
            unset($_SESSION["theme"]);
            
            include_once('navbar.php'); 
        ?>

        <h3>You have been signed out</h3>
        
    </body>
</html>
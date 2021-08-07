<!DOCTYPE html>

<html>
    <head>
        <?php session_start(); ?>
        <title>Error!</title>

        <link rel="stylesheet" href="css/styles.css" />

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
        <?php include_once("navbar.php"); ?>

        <h1 style="color: red">Cannot access this page</h1>
    </body>
</html>
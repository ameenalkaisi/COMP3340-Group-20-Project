<!DOCTYPE html>

<!-- Site Description for COMP3340 Team Project -->
<html>
    <head>
        <?php session_start(); ?>
        <title>Site Description</title>
        <meta charset="utf-8">
        <!-- meta tags -->
        <meta name="author" content="Koto Sumioka">
        <meta name="keywords" content="HTML, PHP, Blog, Blogsite, Site Description">
        <meta name="description" content="COMP3340 Team Project">
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

        <h2>About this Website</h2>
        <!-- From Phase 2's description -->
        <p>A general blog site that hostsblogs. There will be a functionality to search blogs by tags assigned by the authors. 
            There will also be functionality for searching for bloggers who write a particular topic frequently.</p>
    </body>
</html>
<!DOCTYPE html>

<!-- About Us for COMP3340 Team Project -->
<!-- This is a page to direct to Terms of Use and Site Description -->
<html>
    <head>
        <?php session_start(); ?>

        <title>About Us</title>
        <!-- meta tags -->
        <meta charset="utf-8">
        <meta name="author" content="Koto Sumioka">
        <meta name="keywords" content="HTML, PHP, Blog, Blogsite, About Us">
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
    </style>
    </head>

    <body>
        <?php include_once('navbar.php'); ?>

        <!-- Description about Us -->
        <!-- I basically wrote information we submitted for phase 2 -->
        <h1>About Us</h1>
        <h2>Team 20 of COMP3340's Team Project</h2>
        <br>
        <p><b>Joshua R Guenette</b> (Skills/Roles: HTML, mySQL)</p>
        <p><b>Koto Sumioka</b> (Skills/Roles:HTML, CSS)</p>
        <p><b>Matthew Eppel</b> (Skills/Roles: HTML, CSS, Javascript, mySQL)</p>
        <p><b>Ameem Al-Kaisi</b> (Skills/Roles: HTML, CSS)</p>
        <p><b>Christopher Rafinski</b> (Skills/Roles: HTML, CSS)</p>

        <br>
        <h2>Github Used</h2>
        <div><a href="https://github.com/ameenalkaisi/COMP3340-Group-20-Project4">https://github.com/ameenalkaisi/COMP3340-Group-20-Project4</a></div>
        <br>
        <h2>Homepage of the Website</h2>
        <div><a href="alkaisi.myweb.cs.uwindsor.ca/COMP-3340/Project/">https://alkaisi.myweb.cs.uwindsor.ca/COMP-3340/Project/</a></div>

        <h2>Page Direct</h2>
        <div class="directPage">
            <ul>
                <li>    
                    <a href="./termsOfUse.php">Terms of Use</a>
                </li>
                <li>    
                    <a href="./siteDescription.php">Site Description</a>
                </li>
            </ul>    
        </div>
    </body>
</html>
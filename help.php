<!DOCTYPE html>

<html>
    <head>
        <?php session_start(); ?>

        <title>Blogsite</title>
        <!-- meta tags -->
        <meta charset="utf-8">
        <meta name="keywords" content="blog,blogsite,create,help" />
        <meta name="description" content="Blog hosting service and search" />

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
        <h1>Instructions on using this site</h1>
        <ol>
            <li>Firstly, register by clicking login, then click on the register link under the submit button and filling out the form then submitting
                <br />
                <img width="30%" src="imgs/register-sample.png" /> 
                <br />
            </li>
            <li>Then, you can create a post by going into the Create Post tab. You can use the text editor to format your post.
                <br />
                <img width="30%" src="imgs/create-post-sample.png" /> 
                <br />
            </li>
            <li>You can view your created posts in the Profile page. You can also change your theme there</li>

            Good luck! If you have any feedback feel free to email us.
        </ol>
    </body>
</html>

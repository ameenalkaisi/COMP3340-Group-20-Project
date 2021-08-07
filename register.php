<!DOCTYPE html>

<html>
    <head>
        <?php session_start(); ?>

        <title>Log in/Register</title>
        <!-- meta tags -->
        <meta charset="utf-8">
        <meta name="keywords" content="register,blog,blogger" />
        <meta name="description" content="Registeration page of the blog" />

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
        <?php include_once('navbar.php'); ?>

        <form action="register.php" method="POST" autocomplete="off">
            <label for="display_name">Enter Display Name</label>
            <input type="text" name="display_name" id="display_name" required />

            <label for="email">Enter Email</label>
            <input type="email" name="email" id="email" required />

            <label for="password">Enter Password</label>
            <input type="password" name="password" id="password" required />

            <input type="submit" value="Register!" />
        </form>

        <?php
            require_once("connection.php");

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                // get safe version of user's input
                $dname = htmlentities($_POST["display_name"]);
                $email = htmlentities($_POST["email"]);
                $password = htmlentities($_POST["password"]);

                // try to connect to database
                $db = db_connect();

                if($db) {
                    // try to insert into the database
                    $result = $db->query("INSERT INTO users (`display_name`, `email`, `is_admin`, `password`) VALUES('$dname', '$email', '0', MD5('$password'));");
                    if($result === FALSE) {
                        echo "<p style='color: red'>Error inserting user into database!</p>";
                    } else {
                        echo "<p style='color: green'>Registration successful! Try to login now</p>";
                    }

                    mysqli_close($db);
                } else {
                    echo "<p style='color: red'>Error connecting to server!</p>";
                }
            }
        ?>
    </body>
</html>
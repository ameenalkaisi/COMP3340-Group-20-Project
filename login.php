<!DOCTYPE html>

<html>
    <head>
        <title>Log in/Register</title>

        <!-- meta tags -->
        <meta charset="utf-8">
        <meta name="keywords" content="register,blog,blogger" />
        <meta name="description" content="Login page of the blog" />

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
        <?php 
            session_start();
            include_once('navbar.php');
        ?>

        <!-- receive all login data, required -->
        <form action="login.php" method="POST">
            <label for="email">Enter Email</label>
            <input type="email" name="email" id="email" required />

            <label for="password">Enter Password</label>
            <input type="password" name="password" id="password" required />

            <input type="submit" value="Login" />
            <a href="register.php">Don't have an account? Register here!</a>
        </form>
        
        <?php
            require_once("connection.php");

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                // get safe version of user's input
                $email = htmlentities($_POST["email"]);
                $password = htmlentities($_POST["password"]);

                // try to connect to database
                $db = db_connect();

                $result = $db->query("SELECT userid, display_name, email, is_admin, theme FROM users WHERE email='$email' AND password='" . md5($password) . "'");

                mysqli_close($db);

                if($result->num_rows != 1) {
                    echo "<p style='color: red'>No users found with that email and password combination</p>";
                } else {
                    $outputText = "Login successful!";

                    // save display name and email on successful login
                    $row = $result->fetch_assoc();
                    $_SESSION["userid"] = $row["userid"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["display_name"] = $row["display_name"];
                    $_SESSION["is_admin"] = $row["is_admin"];
                    $_SESSION["theme"] = $row["theme"];
                    
                    header("Location: index.php");
                    exit();
                }
            }
        ?>
    </body>
</html>
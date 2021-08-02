<!DOCTYPE html>

<html>
    <head>
        <title>Log in/Register</title>

        <meta name="keywords" content="register,blog,blogger" />

        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/form.css" />
    </head>

    <body>
        <?php 
            session_start();
            unset($_SESSION["userid"]);
            unset($_SESSION["email"]);
            unset($_SESSION["display_name"]);
            unset($_SESSION["is_admin"]);
            
            include_once('navbar.php'); 
        ?>

        <h3>You have been signed out</h3>
        
    </body>
</html>
<!DOCTYPE html>

<html>
    <head>
        <title>Blogsite</title>
        <meta name="keywords" content="blog, blogsite, create blogpost" />
        <meta name="description" content="Blog hosting service and search" />

        <link rel="stylesheet" href="css/styles.css" />
    </head>

    <body>
        <?php 
            session_start();
            include_once("navbar.php");
            require("connection.php");

            $is_not_admin = FALSE;


            if($_SERVER["REQUEST_METHOD"] == "GET") {
                $userid = $_GET["id"];

                $db = db_connect();

                if($db) {
                    $result = $db->query("SELECT display_name, email, is_admin FROM users WHERE userid=$userid");
                    $user = $result->fetch_assoc();

                    $display_name = $user["display_name"];
                    $email = $user["email"];
                    $is_admin = $user["is_admin"];
                    mysqli_close($db);
                }

            } else if($_SERVER["REQUEST_METHOD"] == "POST") {
                $userid = $_POST["userid"];
                $display_name = $_POST["display_name"];
                $email = $_POST["email"];
            
                if(isset($_POST["is_admin"]))
                    $is_admin="1";
                else
                    $is_admin="0";

                $db = db_connect();
                if($db) {
                    // change password if there is a new password otherwise keep last one
                    if(empty($_POST["password"]))
                        $passed = $db->query("UPDATE users SET display_name='$display_name', email='$email', is_admin=$is_admin WHERE userid=$userid");
                    else {
                        $password = md5($_POST["password"]);
                        $passed = $db->query("UPDATE users SET display_name='$display_name', email='$email', is_admin=$is_admin, password='$password'
                            WHERE userid=$userid");
                    }
                    mysqli_close($db);

                    if(!$passed) {
                        echo "<p style='color: red'>Could not update user!</p>";
                    } else {
                        header("Location: admin.php");
                        exit();
                    }
                }
            }
         
            if(!isset($_SESSION["is_admin"]) || ($_SESSION["is_admin"] === "0" && $_SESSION["userid"] != $userid)) {
                header("Location: error.php");
            }
        ?>

        <!--Form for editing a user-->
        <form action="edit_user.php" method="POST">
            <label for="display_name">Display Name</label>
            <input type="text" id="display_name" name="display_name" value="<?=$display_name?>"/>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?=$email?>"/>

            <label for="password">Password</label>
            <input type="password" id="password" name="password"/>

            <?php if($_SESSION["is_admin"] === "1") { ?>
            <label for="is_admin">Admin</label>
            <input type="checkbox" id="is_admin" name="is_admin" <?php if($is_admin==="1") echo "checked"; ?>/>

            <?php
                echo "<input type='hidden' id='userid' name='userid' value='" . $userid . "'/>";
            ?>
            <?php } ?>
            

            <input type="submit" />
        </form>


    </body>
</html>
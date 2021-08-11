
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
            require_once("connection.php");
           
            // in the delete page, invalid user if no login or the user isn't an admin and trying to change someone else's user id
            if(!isset($_SESSION["is_admin"]) || ($_SESSION["is_admin"] === "0" && $_SESSION["userid"] != $userid)) {
                header("Location: error.php");
                exit();
            }

            if($_SERVER["REQUEST_METHOD"] == "GET") {
                $db = db_connect();

                if($db) {
                    $postid = $_GET["postid"];
                    $db->query("DELETE FROM posts WHERE postid=$postid");
                }

                header("Location: admin.php");
                exit();
            }
        ?>
    </body>
</html>
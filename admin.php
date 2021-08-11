<!DOCTYPE html>

<html>
    <head>
        <?php session_start(); ?>
        <title>Blogsite</title>
        <!-- meta tags -->
        <meta charset="utf-8">
        <meta name="keywords" content="blog, blogsite, create blogpost" />
        <meta name="description" content="Blog hosting service and search" />

        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/admin.css" />

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
            include_once("navbar.php");

            // go to error page if invalid user
            if(!isset($_SESSION["is_admin"]) || $_SESSION["is_admin"] === "0")
                header("Location: error.php");
        ?>

        <table class='show-users'>
            <tr>
                <th>User ID</th>
                <th>Display Name</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Actions</th>
            </tr>

            <?php
                require_once("connection.php");
                $db = db_connect();

                // get attributes to be displayed for all users that isn't the current user's  attributes
                $query = $db->query("SELECT userid, display_name, email, is_admin FROM users WHERE NOT userid=" . $_SESSION["userid"]);

                while($row = $query->fetch_assoc()) {
                    printf("<tr>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>
                                <a href='edit_user.php?id=%s'>Edit</a>
                            </td>
                        </tr>", $row["userid"], $row["display_name"], $row["email"], $row["is_admin"], $row["userid"]);
                }
            ?>
        </table>
        
        <table class='show-posts'>
            <tr>
                <th>Post ID</th>
                <th>User ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Tags</th>
                <th>Actions</th>
            </tr>

            <?php
                // get attributes to be displayed for allposts
                $query = $db->query("SELECT postid, userid, title, content, tags FROM posts");

                while($row = $query->fetch_assoc()) {
                    // only show part of the title
                    $title = $row["title"];
                    $content = $row["content"];
                    if(strlen($title) > 20) {
                        $title = substr_replace($title, "...", 17);
                    }

                    if(strlen($content) > 100) {
                        $content = substr_replace($content, "...", 97);
                    }
                    printf("<tr>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>
                                <a href='edit_post.php?postid=%s'>Edit</a>
                                <a href='delete_post.php?postid=%s'>Delete</a>
                            </td>
                        </tr>", $row["postid"], $row["userid"], $title, $content, $row["tags"], $row["postid"], $row["postid"]);
                }

                mysqli_close($db);
            ?>
        </table>

        <script src="scripts/script.js"></script>
        <script src="scripts/admin.js"></script>
    </body>
</html>
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

            if($_SERVER["REQUEST_METHOD"] == "GET") {
                $postid = $_GET["postid"];

                $db = db_connect();
                if($db) {
                    $post = $db->query("SELECT userid, title, content, tags FROM posts WHERE postid=$postid")->fetch_assoc();

                    $userid = $post["userid"];
                    $title = $post["title"];
                    $content = $post["content"];
                    $tags = $post["tags"];
                    mysqli_close($db);
                }

            } else if($_SERVER["REQUEST_METHOD"] == "POST") {
                $postid = $_POST["postid"];
                $userid = $_POST["userid"];
                $title = $_POST["title"];
                $content = $_POST["content"];
                $tags = $_POST["tags"];

                $db = db_connect();
                if($db) {
                    console_log("UPDATE posts SET title='$title', content='$content', tags='$tags' WHERE postid=$postid");
                    $result = $db->query("UPDATE posts SET title='$title', content='$content', tags='$tags' WHERE postid=$postid");
                    mysqli_close($db);
                    
                    if($result === TRUE) {
                        header("Location: admin.php");
                        exit();
                    } else {
                        echo "<p style='color: red'>Could not update post!</p>";
                    }
                }

            }
           
            // in the edit page, invalid user if no login or the user isn't an admin and trying to change someone else's user id
            if(!isset($_SESSION["is_admin"]) || ($_SESSION["is_admin"] === "0" && $_SESSION["userid"] != $userid)) {
                header("Location: error.php");
            }
        ?>

        <!--Form for editing a user-->
        <form action="edit_post.php" method="POST">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="<?=$title?>"/>

            <label for="content">Content</label>
            <textarea id="content" name="content"><?=$content?></textarea>

            <label for="tags">tags</label>
            <input type="tags" id="tags" name="tags" value="<?=$tags?>"/>

            <input type="hidden" id="postid" name="postid" value="<?=$postid?>"/>
            <input type="hidden" id="userid" name="userid" value="<?=$userid?>"/>

            <input type="submit" />
        </form>


    </body>
</html>
<!DOCTYPE html>

<html>
    <head>
        <title>Blogsite</title>
        <meta name="keywords" content="blog, blogsite, create blogpost" />
        <meta name="description" content="Blog hosting service and search" />

        <link rel="stylesheet" href="styles.css" />
    </head>

    <body>
        <?php include_once("navbar.php"); ?>

        <div class="search">
            <div class="layer"></div>

            <!--Note: might use the search's solution for this-->
            <form action="action.php" autocomplete="off" method="GET">
                <input type="text" id="searchbox" placeholder="Type here to search" />
                <input type="button" id="submit" />
            </form>

            <div class="tags">
                <!--Todo: put some sample tags, and show them to the user try to have an animation-->
                <form action="action.php" id="tags-form">
                    <input type="button" value="tag 1" />
                    <input type="button" value="tag 2" />
                    <input type="button" value="tag 3" />
                </form>
            </div>
        </div>

        <div class="recommended">
            <?php
                require_once("connection.php");
                function createPostView($postid, $userid, $title, $content, $tags, $db) {
                    // after 100 characters, content goes to ...
                    // after 20 charactesr, title goes ...


                    if(strlen($title) > 20) {
                        $title = substr_replace($title, "...", 17);
                    }

                    if(strlen($content) > 100) {
                        $content = substr_replace($content, "...", 97);
                    }
                    // can add checking here
                    $resultRow = $db->query("SELECT display_name FROM users WHERE userid = $userid")->fetch_assoc();
                    $displayName = $resultRow["display_name"];
                    echo "<article id='$postid' class='post'>
                        <header>
                            <h1>$title</h1>
                            <p>Author: $displayName</p>
                        </header>
                        <p>$content</p>
                    </article>";
                }

                $db = db_connect("blogdb");

                $results = $db->query("SELECT * FROM posts");

                while($post = $results->fetch_assoc()) {
                    createPostView($post["postid"], $post["userid"], $post["title"], $post["content"], $post["tags"], $db);
                }

                mysqli_close($db);
            ?>
        </div>

        <script src="script.js"></script>
    </body>
</html>

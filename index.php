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
        <div class="search">
            <div class="layer"></div>
            
            <?php
                // get weather information and display it here
                $response = json_decode(file_get_contents("http://api.weatherapi.com/v1/current.json?key=ce6e75322c984ec5a1f221002210808&q=Windsor&aqi=no"));

                include_once("utils.php");
                echo "<h3>" . $response->current->condition->text . "</h3>";
                echo "<h4>" . $response->current->temp_c . "C</h4>";
            ?>

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
                    /* doesn't work well because ability of user to add tagged information
                    // after 100 characters, content goes to ...
                    // after 20 charactesr, title goes ...

                    if(strlen($title) > 20) { $title = substr_replace($title, "...", 17);
                    }

                    if(strlen($content) > 100) {
                        $content = substr_replace($content, "...", 97);
                    }*/

                    // if query has error, display name should show  
                    $resultRow = $db->query("SELECT display_name FROM users WHERE userid = $userid")->fetch_assoc();
                    $displayName = "&lt;Error Finding Author&gt;";
                    if($resultRow) 
                        $displayName = $resultRow["display_name"];

                    echo "<article id='$postid' class='post'>
                        <header>
                            <h1>$title</h1>
                            <p>Author: $displayName</p>
                        </header>
                        $content
                    </article>";
                }

                // try to connect to database, if can't, don't show recent posts at all
                $db = db_connect();

                if($db) {
                    $results = $db->query("SELECT * FROM posts");

                    while($post = $results->fetch_assoc()) {
                        createPostView($post["postid"], $post["userid"], $post["title"], $post["content"], $post["tags"], $db);
                    }

                    mysqli_close($db);
                }
            ?>
        </div>

        <script src="scripts/index.js"></script>
    </body>
</html>

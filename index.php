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
            <form action="search-results.php" autocomplete="off" method="GET">
                <input type="text" id="searchbox" name="nametitle" placeholder="Type here to search" />
                <input type="hidden" name="target" value="blog" />
                <input type="hidden" name="tags" value="" />
                <input type="submit" id="submit" value=""/>
                <a href="advanced-search.php">Advanced Search</a>
            </form>

            <!--
                <div class="tags">
                    <form action="action.php" id="tags-form">
                        <input type="button" value="tag 1" />
                        <input type="button" value="tag 2" />
                        <input type="button" value="tag 3" />
                    </form>
                </div>
            -->
        </div>

        <div class="posts">
            <?php
                require_once("connection.php");
                require_once("utils.php");

                // try to connect to database, if can't, don't show recent posts at all
                $db = db_connect();

                if($db) {
                    // todo: randomize selection or make randomize towards user
                    $results = $db->query("SELECT * FROM posts");

                    for($i = 0; ($post = $results->fetch_assoc()) && $i < 9; ++$i) {
                        createPostView($post["postid"], $post["userid"], $post["title"], $post["content"], $post["tags"], $db);
                    }

                    mysqli_close($db);
                }
            ?>
        </div>

        <script src="scripts/post_init.js"></script>
    </body>
</html>

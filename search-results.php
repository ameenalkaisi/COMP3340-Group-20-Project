<?php
    include_once("searcher.php");
    $result = search_for(
        $_GET['target'],
        $_GET['nametitle'],
        $_GET['tags']
    );
?>
<!DOCTYPE html>
<html>
    <head>
        <?php session_start(); ?>

        <title>Search Results</title>
        <!-- Important meta tags -->
        <link rel="stylesheet" href="css/styles.css">
        <!--Based on user preference, show the theme they used from last time-->
        <link rel="stylesheet" href="css/<?php
            if(isset($_SESSION["theme"])) {
                echo $_SESSION["theme"];
            } else {
                echo "light";
            }
        ?>.css" />
        <meta name="description" content="Temp description for this site">
        <meta name="keywords" content="keyword, key word, boopitybeep">
        <meta name="author" content="Matthew Eppel">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <?php 
            include_once("navbar.php"); 
            include_once("utils.php");
        ?>

        <h1>Results</h1>

        <div class="posts">
            <?php
                $db = db_connect();

                if($db) {
                    if ($_GET['target']=='profile') {
                        while ($row = $result->fetch_assoc()) {
                            echo "<a href='profile.php?userid={$row["userid"]}>{$row["display_name"]}</a> . <br />";
                        }
                    } else {
                        while ($row = $result->fetch_assoc()) {
                            createPostView($row["postid"], $row["userid"], $row["title"], $row["content"], $row["tags"], $db);
                        }
                    }

                    mysqli_close($db);
                }

                
            ?>
        </div>

    </body>

    <script src="scripts/post_init.js"></script>
</html>
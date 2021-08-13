<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<?php session_start(); ?>

		<title>Blogsite</title>
		<!-- meta tags -->
		<meta charset="utf-8">
		<meta name="keywords" content="post, blog, blogpost" />
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
        <?php
            include_once("navbar.php");
            require_once("connection.php");

            // todo: error handling
            if($_SERVER["REQUEST_METHOD"] == "GET") {
                $postid = $_GET["postid"];
                $db = db_connect();

                if($db) {
                    // get post and author information from database
                    $post = $db->query("SELECT userid, title, content, tags FROM posts WHERE postid='$postid'")->fetch_assoc();
                    $author = $db->query("SELECT display_name FROM users WHERE userid='" . $post["userid"] . "'")->fetch_assoc();

                    mysqli_close($db);
                }
            }
        ?>

        <div class="post-content">
            <h1><?= $post["title"] ?></h1>
            <br>
            <?= $post["content"] ?>
        </div>

        <div class="post-info">
            <p>Author: <a href="profile.php?userid=<?= $post["userid"] ?>"><?= $author["display_name"] ?></a></p>
            <!-- temporary way of displaying tags -->
            <p>Tags: <?= $post["tags"] ?> </p>
        </div>
	</body>
</html>
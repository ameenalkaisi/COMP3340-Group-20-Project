<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<?php session_start(); ?>

		<title>Blogsite</title>
		<!-- meta tags -->
		<meta charset="utf-8">
		<meta name="keywords" content="blog, blogsite, create blogpost" />
		<meta name="description" content="Blog hosting service and search" />

		<link rel="stylesheet" href="css/styles.css" />
		<link rel="stylesheet" href="css/profile.css" />
        
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

			// if current user isn't logged in and isn't trying to view another person's profile, go to the login page 
			if(empty($_GET["userid"])) {
				if(!isset($_SESSION["display_name"])) {
					header("Location: login.php");
					exit();
				} else {
					$userid = $_SESSION["userid"];
				}
			} else {
				$userid = $_GET["userid"];	
			}
		?>

		<div class="content">
			<!--
			<h1>Skeleton Profile, I needed this for testing create, rebase as needed.</h1>
			<form id="createform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
				User name:<input type="text" name="name" size="100">
				<br>
					<select name="admin">
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select>
				<input name ="send" type="submit" value="Post Article">
			</form>
			<?php
				require_once('connection.php');
				require_once('utils.php');

				$db = db_connect();

				// get user's defualt theme
				$user = $db->query("SELECT display_name, theme, userid FROM users WHERE userid=$userid")->fetch_assoc();

				if(empty($user["userid"])) {
					header("Location: error.php");
					exit();
				}

				$defualtTheme = $db->query("SELECT theme FROM users WHERE userid={$user["userid"]}")->fetch_assoc()["theme"];

				if($_SERVER["REQUEST_METHOD"] == "POST"){
					//check if user exist by searching name
					$send=0;
					if(!empty($_POST["name"])){
						$name = input($_POST["name"]);
					} else {
						$send=1;
					}

					$admin = input($_POST["admin"]);

					//validates the new user so as not to enter empty data
					if($send==0){
						$sql = "INSERT INTO users (display_name, is_admin) VALUES ('$name','$admin')";
						if ($db->query($sql) === TRUE) {
							echo "NEW POST MADE<br>";
						} else {
							echo "Error: " . $sql . "<br>" . $conn->error;
						}
					}
					$send=0;
				}

				mysqli_close($db);

				function input($data){
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}
			?>
			-->

			<h1><?= $user["display_name"] ?></h1>

			<?php if(isset($_SESSION["userid"]) && $_SESSION["userid"] == $userid) { ?>
				<!-- Only seen by people who are viewing their own profiles -->
				<div class="theme">
					<h2>Theme settings</h2>
					<form action="profile.php" method="POST">
						<select name="new_theme">
							<option value="light" <?php if($defualtTheme === "light") echo "selected"?>>Light</option>
							<option value="dark" <?php if($defualtTheme === "dark") echo "selected"?>>Dark</optoin>
							<option value="christmas" <?php if($defualtTheme === "christmas") echo "selected"?>>Christmas</option>
						</select>
						<input type="submit" value="Change Theme"/>
					</form>

					<!-- Can select all posts that are made by user or something like that -->

					<?php
						if(!empty($_POST)) {
							// update session variable
							$_SESSION["theme"] = $_POST["new_theme"];

							// update database
							$db = db_connect();
							if($db) {
								$db->query("UPDATE users SET theme='{$_SESSION["theme"]}' WHERE userid={$_SESSION["userid"]}");
								mysqli_close($db);
							}
							header("Refresh:1");
						}
					?>

				<a href="edit_user.php?id=<?= $_SESSION["userid"] ?>">Edit profile</a>
				</div>
			<?php } ?>

			<div class="history">
				<h2>Created posts</h2>

				<div class="posts">
					<?php
						$db = db_connect();

						if($db) {
							$results = $db->query("SELECT * FROM posts WHERE userid={$user["userid"]}");

							for($i = 0; ($post = $results->fetch_assoc()) && $i < 9; ++$i) {
								createPostView($post["postid"], $post["userid"], $post["title"], $post["content"], $post["tags"], $db);
							}

							mysqli_close($db);
						}
					?>
				</div>
			</div>
		</div>
		<script src="scripts/post_init.js"></script>
	</body>
</html>
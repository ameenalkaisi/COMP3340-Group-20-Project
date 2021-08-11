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

		<!--TinyMCE integration-->
		<script src="https://cdn.tiny.cloud/1/a5nhq8wb7o6e7vpmejfn4ye4rqbg6cx49nihu6mrondcanvq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<script>
			tinymce.init({
				selector: "#createText"
			});
		</script>


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
			include_once('navbar.php'); 
		
			// redirect to login page if user not logged in
			if(!isset($_SESSION["userid"])) {
				header("Location: login.php");
				exit();
			}
		?>

		<!--This is the textarea input that will allow users to insert simple
		text blogs.-->
		<div class="create">
			<div class="createLeft">
			</div>
			<div class="createmiddle">
				<div class="createintro">
					<h1>Welcome to the Create page!</h1>
					<p>This is where you can post blogs and attach tags! you may also save
					your work as a draft to return to it later. If you wish to start, make
					sure you are logged in and start writing whatever you wish. You can add
					tags to the blog later.</p>

					<form id="createform" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
						Article Title:<input type="text" name="title" size="100" required>
						<textarea name="createText" id="createText"></textarea>
						<br>
						Article tags:<input type="text" name="tags" size="100">
						<br>
						<input name ="send" type="submit" value="Post Article">
					</form>
				</div>
			</div>
			<div class="createright">
			</div>
		</div>
		<?php
			//conect to db.
			require_once('connection.php');
			require_once('utils.php');

			$db = db_connect();
			if($db) {
				//form hookup for, handles the title and tags, makes them more usable for
				//the current db set
				//TODO: The tage system for the DB is to simple, we need a table that every
				//Blog carries a FK to to store them in a way that is much easier to search.
				if($_SERVER["REQUEST_METHOD"] === "POST"){
					$send=0;
					if(empty($_POST["createText"]))
						$send = 1;
					else
						$createText = str_replace("'", "\"", $_POST["createText"]); // repalce all single quotes with double quotes

					$title = htmlentities($_POST["title"]);
					$tags = htmlentities($_POST["tags"]);
					$tagsSearchReady = str_replace(' ','',$tags);
					$useridSend = $_SESSION["userid"];

					if($send==0){
						$sql = "INSERT INTO posts (userid, title, content, tags) VALUES ('$useridSend','$title','$createText','$tagsSearchReady')";
						if ($result = $db->query($sql) === TRUE) {
							echo "<br />NEW POST MADE";
						} else {
							echo "<br /><p style='color: red'>Error occurred in creating the page!</p><br>" . $sql;
						}
					}
				}

				mysqli_close($db);
			}
		?>
	</body>
</html>
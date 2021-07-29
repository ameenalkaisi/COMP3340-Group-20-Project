<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Blogsite</title>
    <meta name="keywords" content="blog, blogsite, create blogpost" />
    <meta name="description" content="Blog hosting service and search" />

    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
    <?php include_once("navbar.php"); ?>

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

          <form id="createform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
            Article Title:<input type="text" name="title" size="100">
            <!--Temporary measure to post the blog under a particular name. Just center
            a real display name the php fetches its user id to link them properly.-->
            Username:<input type="text" name="user" size="100">
            <textarea form="createform" name="textPost" id="createText"></textarea>
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

      //form hookup for, handles the title and tags, makes them more usable for
      //the current db set
      //TODO: The tage system for the DB is to simple, we need a table that every
      //Blog carries a FK to to store them in a way that is much easier to search.
      if($_SERVER["REQUEST_METHOD"] == "POST"){
          $send=0;
          if(!empty($_POST["title"])){
            $title = input($_POST["title"]);
          } else {
            $send=1;
          }
          if(!empty($_POST["textPost"])){
            $textPost = input($_POST["textPost"]);
          } else {
            $send=1;
          }
          if(!empty($_POST["user"])){
            $user = input($_POST["user"]);
          } else {
            $send=1;
          }
          $tags = input($_POST["tags"]);
          $tagsSearchReady = str_replace(' ','',$tags);
          $useridSend="";

          $queryResult = $db->query("SELECT userid FROM users WHERE display_name='$user';");
          while($userid = $queryResult->fetch_assoc()){
            $useridSend = $userid["userid"];
          }

          if($send==0){
            $sql = "INSERT INTO posts (userid ,title, content, tags) VALUES ('$useridSend','$title','$textPost','$tagsSearchReady')";
            if ($db->query($sql) === TRUE) {
              echo "NEW POST MADE<br>";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
          }
          $send=0;
      }

      function input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>
  </body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Blogsite</title>
    <meta name="keywords" content="blog, blogsite, create blogpost" />
    <meta name="description" content="Blog hosting service and search" />

    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <div class="top-banner">
        <nav>
            <a href="homepage.html">
                <!-- Temporary icon until having a company one -->
                <img src="imgs/search-icon.png" />
            </a>
            <ul>
                <li>
                    <a href="profile.php">Profile</a>
                </li>
                <li>
                    <a href="#link2">Link 2</a>
                </li>
                <li>
                    <a href="create.php">Create</a>
                </li>
            </ul>
        </nav>
    </div>
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

      $db = db_connect("blogdb");

      if($_SERVER["REQUEST_METHOD"] == "POST"){
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

      function input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>
  </body>
</html>

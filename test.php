<?php
    require_once('connection.php');
    require_once('utils.php');

    # Temporary index.php to showcase the usage of db_connect and the utils
    # db_connect returns mysqli object, to look at how to use it, go to https://www.php.net/manual/en/book.mysqli.php
    
    $db = db_connect();
    echo "<p>test</p>";

    // get display names of users that have made posts and display their names
    echo "<p>Users that have posted before <br />";
    $queryResult = $db->query("SELECT display_name FROM users WHERE userid IN (SELECT userid FROM posts);");
    while($row = $queryResult->fetch_assoc())
        echo $row["display_name"] . "<br />";
    echo "</p>";
    
    // get display names of users that have made posts and display their names
    echo "<p>Users that are present <br />";
    $queryResult = $db->query("SELECT display_name FROM users;");
    while($row = $queryResult->fetch_assoc())
        echo $row["display_name"] . "<br />";
    echo "</p>";

    $db->close();

    echo "<p>test complete</p>";
?>

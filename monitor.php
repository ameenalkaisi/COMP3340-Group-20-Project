<!DOCTYPE html>

<html>
    <head>
        <meta name="keywords" content="test,database,blogpostsite,php,MariaDB" />
        <meta name="author" content="Ameen Al-Kaisi" />

        <title> Test database connection </title>
    </head>

    <body style="background-color: <?php
        require_once("connection.php");

        $db = db_connect();
        
        // db_connect will make $db = 0 if it doesn't work
        if(!$db)
            echo "red";
        else {
            if($db->query("SELECT userid FROM users WHERE userid=10"))
                echo "green";
            else echo "red";

            mysqli_close($db);
        }
    ?>">
        <h1 style="text-align: center">Green background if website works <br />Red background if it does not</h1>
    </body>
</html>
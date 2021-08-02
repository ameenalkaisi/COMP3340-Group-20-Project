<!DOCTYPE html>

<html>
    <head>
        <title>Blogsite</title>
        <meta name="keywords" content="blog, blogsite, create blogpost" />
        <meta name="description" content="Blog hosting service and search" />

        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/admin.css" />
    </head>

    <body>
        <?php 
            session_start();
            include_once("navbar.php");

            // go to error page if invalid user
            if(!isset($_SESSION["is_admin"]) || $_SESSION["is_admin"] === "0")
                header("Location: error.php");
        ?>

        <table>
            <tr>
                <th>User ID</th>
                <th>Display Name</th>
                <th>Email</th>
                <th>Admin</th>
            </tr>

            <?php
                require_once("connection.php");
                $db = db_connect();

                // get attributes to be displayed for all users that isn't the current user's  attributes
                $query = $db->query(("SELECT userid, display_name, email, is_admin FROM users WHERE NOT userid=" . $_SESSION["userid"]));

                while($row = $query->fetch_assoc()) {
                    //todo: set up admin controls
                    printf("<tr>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                        </tr>", $row["userid"], $row["display_name"], $row["email"], $row["is_admin"]);
                }
            ?>
        </table>

        <script src="scripts/script.js"></script>
    </body>
</html>
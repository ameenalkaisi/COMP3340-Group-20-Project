<?php
    require_once("utils.php");
    require_once("credentials.php"); // look at teams/slack if you are in teams

    // use localhost, root, empty password for local server testing
    $hostname = "localhost";
    $username = $cred_user;
    $password = $cred_passwd;
    $dbname = "blogdb";

    # returns 0 if there is an error
    function db_connect() {
        global $hostname, $username, $password, $dbname;

        $db_connection = new mysqli($hostname, $username, $password, $dbname);
        
        if($db_connection->connect_errno) {
            //console_log ($db_connection->connection_error);

            return 0;
        }

        return $db_connection;
    }
?>
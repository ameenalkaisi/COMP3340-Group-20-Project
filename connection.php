<?php
    require_once("utils.php");
    require_once("credentials.php"); // look at teams/slack if you are in teams

    // use localhost, root, empty password for local server testing

    # returns 0 if there is an error
    function db_connect() {
        $hostname = "localhost";
        $username = CRED_USER;
        $password = CRED_PASSWORD;
        $dbname = "blogdb";
        
        @$db_connection = new mysqli($hostname, $username, $password, $dbname);

        if($db_connection->connect_errno) {
            $db_connection = 0;
        }

        return $db_connection;
    }
?>
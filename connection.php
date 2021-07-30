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

        $db_connection = 0;

        try {
            $db_connection = new mysqli($hostname, $username, $password, $dbname);
        } catch(Exception $e) {
            console_log($e);
        }

        return $db_connection;
    }
?>
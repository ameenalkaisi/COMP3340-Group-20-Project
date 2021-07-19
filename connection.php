<?php
    require_once("utils.php");
    require_once("credentials.php"); // look at teams/slack if you are in teams

    // use localhost, root, empty password for local server testing
    $hostname = "localhost";
    $username = $cred_user;
    $password = $cred_passwd;

    # put in database name to connect to
    # returns 0 if error ocurred and will output to log, otherwise the mysqli object created is returned
    #
    # currently there are two databases: 
    #   "alkaisi_blogdb" for production database
    #   "alkaisi_blogdb-test" for testing database
    #   "blogdb" for localhost database <-- use this one
    function db_connect($dbname) {
        global $hostname, $username, $password;

        $db_connection = new mysqli($hostname, $username, $password, $dbname);
        
        if($db_connection->connect_errno) {
            console_log ($db_connection->connection_error);

            return 0;
        }

        return $db_connection;
    }
?>
<?php
    include_once("utils.php");

    $hostname = "localhost";
    $username = "alkaisi_group";
    $password = "comp3340g20";

    # put in database name to connect to
    # returns 0 if error ocurred and will output to log, otherwise the mysqli object created is returned
    #
    # currently there are two databases: 
    #   "alkaisi_blogdb" for production database
    #   "alkaisi_blogdb-test" for testing database
    function db_connect($dbname) {
        global $hostname, $username, $password;

        $db_connection = new mysqli($hostname, $username, $password, $dbname);
        
        if($db_connection->connection_errno) {
            console_log ($db_connection->connection_error);

            return 0;
        }

        return $db_connection;
    }
?>
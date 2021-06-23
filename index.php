<?php
    include_once('connection.php');
    include_once('utils.php');

    # Temporary index.php to showcase the usage of db_connect and the utils
    # db_connect returns mysqli object, to look at how to use it, go to https://www.php.net/manual/en/book.mysqli.php
    
    $db = db_connect('alkaisi_blogdb-test');
    echo "<p>test</p>";

    echo "<p>";
    echo $db->query("SELECT * FROM users")->num_rows;
    echo " rows found </p>";

    console_debug($db);

    $db->close();

    echo "<p>test complete</p>";
?>

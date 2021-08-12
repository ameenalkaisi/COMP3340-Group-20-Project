<?php
    include_once("search/searcher.php");
    $result = search_for(
        $_GET['target'],
        $_GET['nametitle'],
        $_GET['tags']
    );
    if ($result == 400) {
        header('Location: Error400.php');
        die();
    }
    if ($result)
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Search Results</title>
        <!-- Important meta tags -->
        <link rel="stylesheet" href="styles.css">
        <meta name="description" content="Temp description for this site">
        <meta name="keywords" content="keyword, key word, boopitybeep">
        <meta name="author" content="Matthew Eppel">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            
        </style>
    </head>
    <body>

        <?php include_once("navbar.php"); ?>

        <h1>Results</h1>

        <?php
    
            if ($_GET['target']=='profile') {
                while ($row = $result->fetch_row()) {
                    echo $row[0] . '<br>';
                }
            } else {
                while ($row = $result->fetch_row()) {
                    echo $row[2] . "<br>" . $row[3] . "<br><br>";
                }
            }
            
        ?>

    </body>
</html>

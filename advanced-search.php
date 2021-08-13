<!DOCTYPE html>
<html>
    <head>
        <?php session_start(); ?>

        <title>Advanced Search</title>
        <!-- Important meta tags -->
        <link rel="stylesheet" href="css/styles.css">
        <!--Based on user preference, show the theme they used from last time-->
        <link rel="stylesheet" href="css/<?php
            if(isset($_SESSION["theme"])) {
                echo $_SESSION["theme"];
            } else {
                echo "light";
            }
        ?>.css" />
        <meta name="description" content="Form for submitting an advanced search for blog posts">
        <meta name="keywords" content="advanced, search, blog">
        <meta name="author" content="Matthew Eppel">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            
        </style>
        <script>
            function showTags () {
                document.getElementById("after-step-1").hidden = false
                document.getElementById("tagarea").hidden = false
                document.getElementById("nametitle").innerHTML = "2. Title"
            }
            function hideTags () {
                document.getElementById("after-step-1").hidden = false
                document.getElementById("tagarea").hidden = true
                document.getElementById("nametitle").innerHTML = "2. Name"
            }
        </script>
    </head>
    <body>
        
        <?php include_once("navbar.php"); ?>

        <h1>Advanced Search</h1>

        <form action="search-results.php" method="GET">

            <h2>1. Search Target</h2>
            <input type="radio" id="profileBtn" name="target" value="profile" onclick="hideTags()" required="true">
            <label for="profileBtn">Profile</label>
            <input type="radio" id="blogBtn" name="target" value="blog" onclick="showTags()">
            <label for="blogBtn">Blog Post</label>
            <br>
            
            <div id="after-step-1" hidden="true">
                <label for="nametitle"><h2 id="nametitle">2. Name / Title</h2></label>
                <input type="search" id="nametitle" name="nametitle">
                <br>

                <div id="tagarea">
                    <label><h2>3. Tag(s)</h2>
                    <sub>Tags are seperated by commas</sub></label><br>
                    <textarea id="tags" name="tags" rows=3></textarea>
                    <br>
                </div>
            
            </div>
            
            <br>
            <input type="submit">

        </form>

    </body>
</html>
<?php
    # outputs content of data to console
    # i.e., if you put an object, will output all of the objects variables
    function console_debug($data) {
        echo "<script>";
        echo "console.log(". json_encode($data) .");";
        echo "</script>";
    }

    # outputs string to console
    function console_log($str) {
        echo "<script>";
        echo "console.log(" . $str . ");";
        echo "</script>";
    }
    
    function createPostView($postid, $userid, $title, $content, $tags, $db) {
        /* doesn't work well because ability of user to add tagged information
        // after 100 characters, content goes to ...
        // after 20 charactesr, title goes ...

        if(strlen($title) > 20) { $title = substr_replace($title, "...", 17);
        }

        if(strlen($content) > 100) {
            $content = substr_replace($content, "...", 97);
        }*/

        // on query error, show that we could not find author
        $resultRow = $db->query("SELECT display_name FROM users WHERE userid = $userid")->fetch_assoc();
        $displayName = "&lt;Error Finding Author&gt;";
        if($resultRow) 
            $displayName = $resultRow["display_name"];

        echo "<article id='$postid' class='post'>
            <header>
                <h1>$title</h1>
                <p>Author: $displayName</p>
            </header>
            $content
        </article>";
    }
?>
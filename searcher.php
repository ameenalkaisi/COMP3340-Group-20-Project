<?php
    /*
     * $target      str: 'profile' or 'blog'
     * $nametitle   str: name or title to search for
     * $tags        str: comma delimmited tags to search by
     * returns 400 if the client request is invalid
     * returns 500 if the server fails to process the request
     * returns an sql request object on success
     */
    function search_for ($target, $nametitle, $tags) {
        // Enable debugging
        //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        // Log in
        include_once("search/searcher_creds.php");
        $db = new mysqli($cred_host, $cred_user, $cred_pswd, $cred_db);
        if ($db==false || $db->connect_error)
            return 500;
        // Search by target
        if ($target == 'profile') {
            // Make sure name parameter is given
            if (strlen($nametitle)==0)
                return 400;
            // Build our query
            $stmnt = "SELECT display_name FROM users WHERE display_name LIKE '%";
            $name = $db->real_escape_string($nametitle);
            // Tack on the nameparts to the query
            $tkn = strtok($name, " \n\t");
            if ($tkn == false)
                return 400;
            $stmnt .= $tkn . "%'";
            $tkn = strtok(" \n\t");
            while ($tkn != false) {
                $stmnt .= " OR display_name LIKE '%" . $tkn . "%'";
                $tkn = strtok(" \n\t");
            }
            // Execute order 66
            $result = $db->query($stmnt);
            if ($result==false)
                return 500;
            $db->close();
            return $result;
        }
        elseif ($target == 'blog') {
            // Flags for which search param to use
            $paramFlags = 0;
            // Parse out title
            $title = $db->real_escape_string($nametitle);
            $tkn = strtok($title, " \t\n");
            if ($tkn != false) {
                $paramFlags += 0x01;
                $partTitle = "title LIKE '%" . $tkn . "%'";
                $tkn = strtok(" \t\n");
                while ($tkn != false) {
                    $partTitle .= " OR "."title LIKE '%" . $tkn . "%'";
                    $tkn = strtok(" \t\n");
                }
            }
            // Split up tags
            $tags2 = $db->real_escape_string($tags);
            $tkn = strtok($tags2, ",");
            if ($tkn != false) {
                $paramFlags += 0x02;
                $partTags = "tags RLIKE '(?:^|,)" . $tkn . "(?:$|,)'";
                $tkn = strtok(",");
                while ($tkn != false) {
                    $partTags .= " OR "."tags RLIKE '(?:^|,)" . $tkn . "(?:$|,)'";
                    $tkn = strtok(",");
                }
            }
            // Build the statement
            $stmnt = "SELECT postid, userid, title, tags FROM posts WHERE ";
            switch ($paramFlags) {
                case 0: // None of them
                    return 400;
                case 1: // Just Title
                    $stmnt .= $partTitle;
                    break;
                case 2: // Just Tags
                    $stmnt .= $partTags;
                    break;
                case 3: // Title and Tags
                    $stmnt .= $partTitle . " AND " . $partTags;
                    break;
                default:
                    return 500;
            }
            // Execute the criminals
            $result = $db->query($stmnt);
            if ($result==false)
                return 500;
            $db->close();
            return $result;
        }
        else
            return 400;
    }

?>
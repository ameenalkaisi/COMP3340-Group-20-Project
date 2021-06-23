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
?>
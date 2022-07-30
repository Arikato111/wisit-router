<?php
return function ($title) {
    if(isset($GLOBALS['title'])) {
        $GLOBALS['title'] = $title;
    } else {
        echo '<script>alert("$GLOBAL[\'title\'] is not set")</script>';
    }
};
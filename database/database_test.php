<?php

require_once('database_functions.php');

    executeQuery("INSERT user(username, password, score, admin)
                  VALUES('Logan', 'apples', 0, false)");
    executeQuery("INSERT user(username, password, score, admin)
                  VALUES('Drake', 'dick', 0, false)");
?>
<?php

require_once('database_functions.php');

    /*
    executeQuery("INSERT user(username, password, score, admin)
                  VALUES('Logan', 'apples', 0, false)");
    executeQuery("INSERT user(username, password, score, admin)
                  VALUES('Drake', 'banana', 0, false)");
    */
    
    create_user("admin", "admin");
    create_user("Jimmy", "test");
    create_user("Sara", "test");
    create_user("Landon", "banana");
    promote_to_admin("admin");
?>

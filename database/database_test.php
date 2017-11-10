<?php

require_once('database_functions.php');

    /*
    executeQuery("INSERT user(username, password, score, admin)
                  VALUES('Logan', 'apples', 0, false)");
    executeQuery("INSERT user(username, password, score, admin)
                  VALUES('Drake', 'banana', 0, false)");
    */
    
    /*
    create_user("admin", "admin");
    create_user("Jimmy", "test");
    create_user("Sara", "test");
    create_user("Landon", "banana");
    promote_to_admin("admin");
     */
    
    /*
    $conn = conn_start();

    // string sanitation
    $uname = sanitize($conn, 'admin');
    $pword = sanitize($conn, 'admin');

    // password salts
    $salt1 = "j*H2!";
    $salt2 = "9@l#o";
    $pword_hashed = hash('ripemd128', "$salt1$pword$salt2");

    $query = "SELECT * FROM user WHERE username='$uname' AND password='$pword_hashed'"; 
    results = executeQuery($conn, $query); 
    $conn->close(); 
     */
?>

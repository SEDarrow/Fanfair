<?php 
// user_class.php
// Description: "User" functions that pertain to the database
 require_once('playlist_class.php');
 require_once('database/database_functions.php');
 
 class User {
	private $playlists;
	private $username;
	private $score;
	private $current_playlist;
	private $admin;
	
    function __construct($uname)
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
        // start connection
        $conn = conn_start();

        // string sanitation
        $uname = sanitize($conn, $uname);
        /*
        $pword = sanitize($conn, $pword);

        // password salts
        $salt1 = "j*H2!";
        $salt2 = "9@l#o";
        $pword_hashed = hash('ripemd128', "$salt1$pword$salt2");
         */

        // get user data
        $query = "SELECT * FROM user WHERE username='$uname'"; 
        $user_data = executeQuery($conn, $query); 
        if (count($user_data) == 0) // username and password dont match
        {
            die("Incorrect Username/Password");
        }

        // get user's playlists
        $query = "SELECT * FROM playlist WHERE username='$uname'";
        $this->playlists = executeQuery($conn, $query); 

        $conn->close();  // done with database

        $this->username = $uname;
        $this->score = $user_data[0]["score"]; 
        $this->admin = $user_data[0]["admin"]; 
    }

    function vote($song, $up)
    {
	$this->current_playlist->vote($song, $up);
    }

    function vote_encore()
    {
	$this->current_playlist->vote_encore();
    } 

    function add_playlist($playlist_name)
    {
        $conn = conn_start();
        $playlist_name = sanitize($conn, $playlist_name); 
        $query = "INSERT playlist(`add`, username, playlist_name)
                  VALUE(1, $username, $playlist_name)";
        executeQuery($conn, $query); 
        $conn->close();
    }
	
    function get_playlists()
    {
	return $this->playlists;
    }
	
    function update_current_playlist($playlist)
    {
        $this->current_playlist = $playlist;
    }
	
    function get_username()
    {
	 return $this->username;
    }
	
    function get_score()
    {
	return $this->score;
    }
	
    function get_current_playlist()
    {
	return $this->current_playlist;
    }
	
    function get_admin_status()
    {
	return $this->admin;
    }
 }
?>

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
        if (count($results) == 0) // username and password dont match
        {
            die("Incorrect Username/Password");
        }

        // get user's playlists
        $query = "SELECT * FROM playlist WHERE username='$uname'";
        $playlists = executeQuery($conn, $query); 

        $conn->close();  // done with database

        $this->username = $uname;
        $this->score = user_data["score"]; 
        $this->admin = user_data["admin"]; 
        $this->playlists;
        $this->current_playlist; 
    }

    function vote($song, $up)
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
    }

    function vote_encore()
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
    }

    function add_playlist($playlist_name)
    {
        /* TODO: TEST
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
        $conn = conn_start();
        $playlist_name = sanitize($conn, $playlist_name); 
        $query = "INSERT playlist(`add`, username, playlist_name)
                  VALUE(1, $username, $playlist_name)";
        executeQuery($conn, $query); 
        $conn->close();
    }
	
	function get_playlists()
    {
        /*
         * Description: Gets the user's playlists
		 *
		 * Returns: A list of playlist objects
         */
		 return $playlists;
    }
	
    function update_current_playlist($playlist)
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
    }
	
	function get_username()
    {
        /*
         * Description: Gets the user's username
		 *
		 * Returns: The username as a string
         */
		 return $username;
    }
	
	function get_score()
    {
        /*
         * Description: Gets the user's score
		 *
		 * Returns: The score as an integer
         */
		 return $score;
    }
	
	function get_current_playlist()
    {
        /*
         * Description: Gets the playlist the user is currently listening to
		 *
		 * Returns: The current playlist as a playlist object
         */
		 return $current_playlist;
    }
	
	function get_admin_status()
    {
        /*
         * Description: Gets the user's admin status
		 *
		 * Returns: A boolean, true if the user is an admin
         */
		 return $admin;
    }
 }
?>

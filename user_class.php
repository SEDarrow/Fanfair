<?php 
// user_class.php
// Description: "User" functions that pertain to the database

 class User {
	private $playlists;
	private $username;
	private $score;
	private $current_playlist;
	private $admin;
	
    function __construct($uname, $pword)
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
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
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
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

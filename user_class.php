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
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
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
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
    }
	
	function get_score()
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
    }
	
	function get_current_playlist()
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
    }
	
	function get_admin_status()
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
    }
 }
?>

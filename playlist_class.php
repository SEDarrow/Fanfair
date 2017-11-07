<?php 
// playlist_class.php
// Description: "Playlist" functions that pertain to the database

class Playlist {
	private $owner_username;
	private $current_song;
	private $encore_score;
	private $name;
	private $uploaders;
	private $song_list;
	private $pid;
	
    function __construct($owner, $playlist_name)
    {
        /*
         * Description: Create the playlist in database.
         *              Playlist should have a pid and a 
         *              add flag.  Add flag allows other users
         *              to add a song or not.
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         * |   $owner   |   string  |  Owner of the playlist |
         * | $playlist_name | string |  Playlist's name |
         */
    }

    function add_song($song, $uploader)
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
    }

    function remove_song($song)
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
    }
	
	function get_owner_username()
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
    }
	
	function get_current_song()
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
    }

    function update_current_song($uname, $pid)
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
    }
	
	function get_encore_score()
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
}
?>

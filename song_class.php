<?php 
// song_class.php
// Description: "Song" functions that pertain to the database
require_once('database/database_functions.php');

class Song {
	private $score;
	private $uploader;
	private $url;
	private $title;
	private $sid;
	
    function __construct($url, $song_title, $uploader)
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
    }

    function vote($up)
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
         * Description: Gets the song's score
		 *
		 * Returns: The score as an integer
         */
		 return $score;
	}
	
	function get_uploader()
    {
        /*
         * Description: Gets the song's uploader
		 *
		 * Returns: The uploader username as a string
         */
		 return $uploader;
	}
	
	function get_url()
    {
        /*
         * Description: Gets the song's url
		 *
		 * Returns: The url as a string
         */
		 return $url;
	}
	
	function get_title()
    {
        /*
         * Description: Gets the song's title
		 *
		 * Returns: The title as a string
         */
		 return $title;
	}
}
?>

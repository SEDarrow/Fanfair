<?php 
// song_class.php
// Description: "Song" functions that pertain to the database
require_once('database/database_functions.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// TODO: add comments
// TODO: add error handling

class Song {
	private $uploader;
	private $url;
	private $title;
	private $sid;
	private $pid;
	
    function __construct($url, $song_title, $uploader, $pid)
    {
	$conn = conn_start();

    $this->url = sanitize($conn, $url);
	$this->title = sanitize($conn, $song_title);
	$this->uploader = sanitize($conn, $uploader);
	$this->pid = sanitize($conn, $pid);
		
	// see if the song is in the database
	$result = executeQuery($conn, "SELECT * FROM song WHERE url='$this->url'");
		
	// add song to database if it is not already there
	if (sizeof($result) == 0) {
		$result = executeQuery($conn, "INSERT INTO song (url, title) VALUES ('$this->url', '$this->title')");
		$result = executeQuery($conn, "SELECT * FROM song WHERE url='$this->url'");
	}

	$conn->close();
    }
	

	function vote($up) {
		$conn = conn_start();

    		if ($up) executeQuery($conn, "UPDATE playlist_contains_song SET upvotes = upvotes + 1 WHERE pid = '$this->pid' AND sid = '$this->sid'");
		else executeQuery($conn, "UPDATE playlist_contains_song SET downvotes = downvotes + 1 WHERE pid = '$this->pid' AND sid = '$this->sid'");

		$conn->close();
	}

	function vote_encore() {
		$conn = conn_start();

    		executeQuery($conn, "UPDATE playlist_contains_song SET encore = encore + 1 WHERE pid = '$this->pid' AND sid = '$this->sid'");

		$conn->close();
	}
	
	function get_upvotes()
        {
		$conn = conn_start();
    		$result = executeQuery($conn, "SELECT upvotes FROM playlist_contains_song WHERE pid = '$this->pid' AND sid = '$this->sid'");
		$conn->close();

		return $result[0]['upvotes'];
	}

	function get_downvotes()
        {
		$conn = conn_start();
    		$result = executeQuery($conn, "SELECT downvotes FROM playlist_contains_song WHERE pid = '$this->pid' AND sid = '$this->sid'");
		$conn->close();

		return $result[0]['downvotes'];
	}

	function get_encore()
        {
		$conn = conn_start();
    		$result = executeQuery($conn, "SELECT encore FROM playlist_contains_song WHERE pid = '$this->pid' AND sid = '$this->sid'");
		$conn->close();

		return $result[0]['encore'];
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

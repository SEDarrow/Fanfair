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

    function __construct($url, $uploader, $pid, $song_title)
    {
        $conn = conn_start();

    	$this->url = sanitize($conn, $url);
        $this->uploader = sanitize($conn, $uploader);
        $this->pid = sanitize($conn, $pid);
            
        // see if the song is in the database
        $result = executeQuery($conn, "SELECT * FROM song WHERE url='$this->url'");

        // add song to database if it is not already there
        if (sizeof($result) == 0) {
            $result = executeQuery($conn, "INSERT INTO song (url, title) VALUES ('$this->url', '$song_title')");
            $result = executeQuery($conn, "SELECT * FROM song WHERE url='$this->url'");
        }

        $this->sid = $result[0]["sid"];
        $this->title = $result[0]["title"];
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
		 return $this->uploader;
	}
	
	function get_url()
    {
		return $this->url;
	}
	
	function get_title()
    {
		 return $this->title;
	}

	function get_sid() 
	{
		return $this->sid;
	}
}
?>

<?php 
// playlist_class.php
// Description: "Playlist" functions that pertain to the database
 require_once('song_class.php');
 require_once('database/database_functions.php');
 
class Playlist {
	private $owner; 
	private $name;
	private $uploaders;
	private $pid;
	private $current_song;
	private $encore_score;
	
    function __construct($owner, $pid)
    {
        $conn = conn_start();

    	$this->owner = sanitize($conn, $owner);
	$this->pid = sanitize($conn, $pid);
		
	$result = executeQuery($conn, "SELECT * FROM playlist WHERE username='$this->owner' AND pid='$this->pid'");

	$conn->close();
	$this->pid = $result[0]["pid"];
    }

    function add_song($url, $uploader, $title)
    {
        $song = new Song($url, $uploader, $this->pid, $title);
	$sid = $song->get_sid();
	$conn = conn_start();
	executeQuery($conn, "INSERT INTO playlist_contains_song (pid, sid, uploader) VALUES ('$this->pid', '$sid', '$uploader')");
	$conn->close();
    }

    function remove_song($song)
    {
       	$conn = conn_start();
	executeQuery($conn, "DELETE FROM playlist_contains_song WHERE sid='$song' AND pid='$this->pid'");
	$conn->close();
    }
	
    function get_owner_username()
    {
	return $this->owner_username;
    }
	
    function get_current_song()
    {
	$this->update_current_song();
	return $this->current_song;
    }

    function update_current_song()
    {
	$conn = conn_start();
    	$result = executeQuery($conn, "SELECT sid, title MAX(upvotes - downvotes) FROM playlist_contains_song WHERE pid = '$this->pid'");
	$conn->close();

	$sid = result[0]["sid"];
	$title = result[0]["title"];
    	$uploader = "admin"; // TODO:this

	$this->current_song = new Song($sid, $uploader, $this->pid, $title);
    }
	
    function get_encore_score()
    {
	$this->update_current_song();
	return $this->current_song->get_encore_score();
    }

    function vote_encore()
    {
	$this->update_current_song();
	$this->current_song->vote_encore();
    }
}
?>

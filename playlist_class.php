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
    private $song_list;

    function __construct($pid)
    {
        $conn = conn_start();
        $this->pid = sanitize($conn, $pid);
        $result = executeQuery($conn, "SELECT * FROM playlist WHERE pid='$this->pid'")[0];
        $conn->close();

        $this->owner = $result["username"];
        $this->name = $result["playlist_name"];
        $this->update_song_list();      // populate the song list
    }

    function add_song($url, $uploader, $title)
    {
        $song = new Song($url, $uploader, $this->pid, $title);
        $sid = $song->get_sid();
        $conn = conn_start();
        executeQuery($conn, "INSERT INTO playlist_contains_song (pid, sid, uploader, upvotes, downvotes, encore) VALUES ('$this->pid', '$sid', '$uploader', 0, 0, 0)");
        $conn->close();
    }

    // song parameter is sid
    function remove_song($sid)
    {
        $conn = conn_start();
        executeQuery($conn, "DELETE FROM playlist_contains_song WHERE sid='$sid' AND pid='$this->pid'");
        $conn->close();
    }

    function remove_current_song()
    {
        $this->update_current_song();
        $this->remove_song($this->current_song->get_sid());
    }

    function get_owner_username()
    {
        return $this->owner;
    }

    function get_current_song()
    {
        $this->update_current_song();
        return $this->current_song;
    }

    function update_current_song()
    {
        $conn = conn_start();
        $result = executeQuery($conn, "SELECT url, title, uploader FROM playlist_contains_song P, song S WHERE upvotes-downvotes = (SELECT MAX(upvotes - downvotes) FROM playlist_contains_song WHERE pid = $this->pid) AND pid = $this->pid AND P.sid = S.sid");
        $conn->close();

        // get the last element in the array (or the song that has been in the database the longest)
        $url = $result[0]["url"];
        $title = $result[0]["title"];
        $uploader = $result[0]["uploader"];

        $this->current_song = new Song($url, $uploader, $this->pid, $title);
    }

    function update_song_list()
    {
        $this->song_list = [];
        $conn = conn_start();
        $result = executeQuery($conn, "SELECT * FROM playlist_contains_song P, song S WHERE pid = $this->pid AND P.sid = S.sid ORDER BY (upvotes - downvotes) DESC");
        $conn->close();

        $songs = [];
        foreach($result as $song) {
            $url = $song["url"];
            $uploader = $song["uploader"];
            $pid = $this->pid;
            $title = $song["title"];

            array_push($songs, new Song($url, $uploader, $pid, $title));
        }
        $this->song_list = $songs;
    }

    // returns a list of song objects
    function get_song_list() {
        $this->update_song_list();
        return $this->song_list;
    }

    function get_encore_score()
    {
        $this->update_current_song();
        return $this->current_song->get_encore();
    }

    function vote_encore()
    {
        $this->update_current_song();
        $this->current_song->vote_encore();
    }

    function get_playlist_name()
    {
        return $this->name;
    }

    function get_pid()
    {
        return $this->pid;
    }
}
?>

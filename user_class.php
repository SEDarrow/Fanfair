<?php
// user_class.php
// Description: "User" functions that pertain to the database
require_once('playlist_class.php');
require_once('database/database_functions.php');

class User {
    private $playlists;  // associative list [pid : Playlist obj]
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
        echo "DEBUG(1): $uname<br>";

        // get user data
        $query = "SELECT * FROM user WHERE username='$uname'";
        echo "DEBUG(2): $query<br>"; 
        $user_data = executeQuery($conn, $query);

        // update playlist list
        $this->update_playlists($conn);

        $conn->close();  // done with database

        $this->username = $uname;
        $this->score = user_data["score"];
        $this->admin = user_data["admin"];
        $this->current_playlist = $this->playlists[0];   // default first playlist as current_playlist
    }

    function vote($song_index, $up)
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
        $this->current_playlist[$song_index]->vote($up);
    }

    function vote_encore()
    {
        /* Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
        $this->current_playlist->vote_encore();
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
                  VALUE(1, $this->username, $playlist_name)";
        executeQuery($conn, $query);

        // must get pid to create playlist
        $query = "SELECT * FROM playlist
                  WHERE username=$this->username
                  AND playlist_name=$playlist_name";
        $temp_playlist = executeQuery($conn, $query)[0];
        $this->playlists[] = new Playlist($this->username, $temp_playlist["pid"]);
        $conn->close();
    }

    function get_playlists()
    {
        /*
         * Description: Gets the user's playlists
         *
         * Returns: A list of playlist objects
         */
        return $this->playlists;
    }

    function update_current_playlist($playlist_index)
    {
        /*
         * Description: Return the first playlist object from the playlist list
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
        $this->current_playlist = $this->playlists[$playlist_index];
    }

    function get_username()
    {
        /*
         * Description: Gets the user's username
         *
         * Returns: The username as a string
         */
        return $this->username;
    }

    function get_score()
    {
        /*
         * Description: Gets the user's score
         *
         * Returns: The score as an integer
         */
        return $this->score;
    }

    function get_current_playlist()
    {
        /*
         * Description: Gets the playlist the user is currently listening to
         *
         * Returns: The current playlist as a playlist object
         */
        return $this->current_playlist;
    }

    function get_admin_status()
    {
        /*
         * Description: Gets the user's admin status
         *
         * Returns: A boolean, true if the user is an admin
         */
        return $this->admin;
    }

    private function update_playlists($conn)
    {
        // TODO: TEST
        /* Description: Private class function that updates the list of playlists
         *              To be used when a playlist is added/deleted
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
        $query = "SELECT * FROM playlist WHERE username=$this->username";
        $this->playlists =  executeQuery($conn, $query);
    }

}
?>

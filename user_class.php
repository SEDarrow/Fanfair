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
         * Description: Constructor
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         * | $uname     |   string  |   Username        |
         */
        // start connection
        $conn = conn_start();

        // string sanitation
        $uname = sanitize($conn, $uname);

        // get user data
        $query = "SELECT * FROM user WHERE username='$uname'";
        $user_data = executeQuery($conn, $query)[0];

        $this->username = $user_data["username"];
        $this->score = $user_data["score"];
        $this->admin = $user_data["admin"];
        $this->update_playlists($conn);                  // update playlist list
        $this->current_playlist = $this->playlists[0];   // default first playlist as current_playlist

        $conn->close();  // done with database
    }

    function vote($song_index, $up)
    {
        /* Description: Vote on a song in the current playlist
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         * | $song_index|   int     | The index to the song in current playlist |
         * | $up        |   bool    | 1 = upvote; 0 = downvote |
         */
        print_r($this->current_playlist->get_song_list());
    }

    function vote_encore()
    {
        /* Description: Vote for an encore for the current song
         *
         * Parameters: None
         */
        $this->current_playlist->vote_encore();
    }

    function add_playlist($playlist_name)
    {
        /* Description: Create a new playlist
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         * | $playlist_name | string | name of the playlist |
         */
        $conn = conn_start();
        $playlist_name = sanitize($conn, $playlist_name);
        $query = "INSERT playlist(`add`, username, name)
                  VALUE(1, '$this->username', '$playlist_name')";
        executeQuery($conn, $query);

        // must get pid to create playlist
        $query = "SELECT * FROM playlist
                  WHERE username='$this->username'
                  AND playlist_name='$playlist_name'";
        $temp_playlist = executeQuery($conn, $query)[0];
        $this->playlists[] = new Playlist($this->username, $temp_playlist["pid"]);
        $conn->close();
    }

    function remove_playlist($pid)
    {
        /* Description: Delete an existing playlist
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         * | $pid       | int       | pid of the playlist to be deleted |
         */
        $conn = conn_start();
        $query = "DELETE FROM playlist WHERE pid=$pid";
        executeQuery($conn, $query);
        $this->update_playlists($conn);     // update playlist
        $conn->close();
    }

    function get_playlists()
    {
        /* Description: Gets the user's playlists
         *
         * Returns: A list of playlist objects
         */
        return $this->playlists;
    }

    function update_current_playlist($playlist_index)
    {
        /* Description: Change the current playlist
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         * | $playlist_index | int  | playlist index in $this->playlists |
         */
        $this->current_playlist = $this->playlists[$playlist_index];
    }

    function get_username()
    {
        /* Description: Gets the user's username
         *
         * Returns: The username as a string
         */
        return $this->username;
    }

    function get_score()
    {
        /* Description: Gets the user's score
         *
         * Returns: The score as an integer
         */
        return $this->score;
    }

    function get_current_playlist()
    {
        /* Description: Gets the playlist the user is currently listening to
         *
         * Returns: The current playlist as a playlist object
         */
        return $this->current_playlist;
    }

    function get_admin_status()
    {
        /* Description: Gets the user's admin status
         *
         * Returns: A boolean, true if the user is an admin
         */
        return $this->admin;
    }

    private function update_playlists($conn)
    {
        /* Description: Private class function that updates the list of playlists
         *              To be used when a playlist is added/deleted
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         * | $conn      | mysqli_conn | mysqli connection |
         */
        $this->playlists = [];
        $query = "SELECT * FROM playlist WHERE username='$this->username'";
        $results =  executeQuery($conn, $query);
        foreach($results as $row)
        {
            $this->playlists[] = new Playlist($row["username"], $row["pid"]);
        }
    }
}
?>

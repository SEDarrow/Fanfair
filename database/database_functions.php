<?php
// database_functions.php
// Description: Functions that pertain to the mysql database

    function create_user($uname, $pword)
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
    }

    function create_playlist($owner, $playlist_name)
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

    function delete_playlist($pid)
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
    }

    function get_playlist($pid) 
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
    }

    function get_all_playlists($uname)
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
    }

    function add_song($pid, $url, $title)
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
    }

    function remove_song($pid, $title)
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

    function get_user($uname) 
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
    }

    function did_vote($uname, $pid, $sid)
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
?>

<?php
// database_functions.php
// Description: Functions that pertain to the mysql database

// TODO: Populate Functions

    function create_user($uname, $pword)
    {
        /*
         * Description:
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         */
        $conn = connect_database();
        $conn->close();
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

    // Misc "support" functions

    function executeQuery($query)
    {
        /*
         * Description: connect to database and execute query
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         * |   $query   |   string  |   MySQL query     |
         *
         * Returns: <ARRAY <ASSOC_ARRAY>> - a list of associative arrays (data rows)
         *          0 - Query Successfull, no returned items
         *          1 - Generic MySQL Error
         */
        $returnValue = array();

        require 'login.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error)
            die($conn->connect_error);  // Need better error handling

        $result = $conn->query($query);
        if (!$result) {
            /*
            $conn->close();
            die($conn->error);  // Need better error handling
            echo $conn->error; 
             */
            return 1; 
        }
        
        // if result type is boolean, that means it was not a select query
        if (gettype($result) == 'boolean') 
        {
            /* echo $result; */
            return 0;
        }

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $returnValue[] = $row;
        }
        
        $result->close();
        $conn->close();
        
        return $returnValue;
    }

    executeQuery("INSERT user(username, password, score, admin)
                  VALUES('Logan', 'apples', 0, false)");
    executeQuery("INSERT user(username, password, score, admin)
                  VALUES('Drake', 'dick', 0, false)");
?>

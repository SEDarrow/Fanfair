<?php
    // user_class_test.php
    // Description: This is a test file to test the user_class

    require_once("user_class.php");

    // init object
    $user = new User("Jimmy");

    // 1) get get username
    echo "Username:  $user->get_username()<br>";

    /*
    // 1.1) check admin status
    echo "Admin Status: $user->get_admin_status()<br>";

    /*
    // 2) check user score
    echo "User Score: $user->get_score()<br>";

    /*
    // 3) get user's playlists
    echo "Playlists:<br>";
    $playlists = $user->get_playlists();
    foreach ($playlists as $playlist)
    {
        echo "  ";
        print_r($playlist);
        echo "<br>";
    }

    // 3.1) Count the number of playlists (mainly to be used for when we add a new playlist)
    $playlist_count = count($playlists);
    echo "Number of playlists: $playlist_count<br>";

    /*
    // 4) get the current playlist
    //    expected: the first playlist from (3)
    $curr_playlist = $user->get_current_playlist()->get_playlist_name();
    echo "Current Playlist: $curr_playlist<br>";

    /*
    // 5) add a new playlist *check database
    $new_playlist = "new_playlist";
    echo "Adding playlist $new_playlist ...";
    $user->add_playlist($playlist_name);

    // 5.1) should be 1 more than from (3.1)
    $new_playlists = $user->get_playlists();
    $new_count = count($new_playlists);
    echo "New playlist count: $new_count";

    /*
    // 6) set new playlist as current playlist
    echo "Setting current playlist to $new_playlist ...";
    // the new playlist should be the last one in the list
    $user->update_current_playlist($new_playlists[$new_count - 1]);

    /*
    // 7) get the current playlist
    //    expected: the new playlist added in 6)
    $curr_playlist = $user->get_current_playlist()->get_playlist_name();
    echo "New Current Playlist: $curr_playlist<br>";

    /*
    // 8) vote on a song    *check database
    $song = $curr_playlist[1]->get_title();
    echo "Voting on song: $song<br>";
    $user->vote(1, 1);  // vote on the 2nd song

    /*
    // 9) vote encore       *check database
    echo "Voting encore";
    $user->vote_encore();
     */

?>

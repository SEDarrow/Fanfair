<?php
    // playlist_class_test.php
    // Description: This is a test file to test the playlist_class
    require_once("playlist_class.php");

    // init object
    $my_playlist = new Playlist(1);
    $songs = $my_playlist->get_song_list();
    foreach ($songs as $song)
    {
        print("Title: $song->get_title()    Url:  $song->get_url()<br>"); 
    }

?>

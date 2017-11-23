<?php
    // playlist_class_test.php
    // Description: This is a test file to test the playlist_class
    require_once("playlist_class.php");

    // init object
    $my_playlist = new Playlist(1);

    // 1) get_playlist_name()
    echo "Playlist Name:  ";
    print_r($my_playlist->get_playlist_name());
    echo "<br><br>";

    // 2) get_owner_username()
    echo "Owner Name:  ";
    print_r($my_playlist->get_owner_username());
    echo "<br><br>";

    // 3) get_song_list()
    echo "Song List:<br>";
    $song_list = $my_playlist->get_song_list();
    foreach($song_list as $song)
    {
        echo ">>>";
        print_r($song);
        echo "<br>";
    }
    $cnt = count($song_list);
    echo "Song count: $cnt";
    echo "<br>";

    // 4) get_current_song()
    echo "Current Song:  ";
    print_r($my_playlist->get_current_song());
    echo "<br><br>";

    /*
    // 5) remove_current_song()
    echo "Removing current song...<br><br>";
    $my_playlist->remove_current_song();

    // 5.1) get_current_song()  Should be next song
    echo "Current Song:  ";
    print_r($my_playlist->get_current_song());
    echo "<br><br>";
     */

    // 6) remove_song($sid) Song should be missing
    $sid = 4;
    echo "Removing Specifig Song: Pid = $sid";
    $my_playlist->remove_song($sid);
    echo "<br>";

    // 6.1) get_song_list()
    echo "Song List:<br>";
    $song_list = $my_playlist->get_song_list();
    foreach($song_list as $song)
    {
        echo ">>>";
        print_r($song);
        echo "<br>";
    }
    $cnt = count($song_list);
    echo "Song count: $cnt";
    echo "<br>";

    // 7) add_song($url, $uploader, $title)
    $url = "rkStmZMfBEY";
    $uploader = "Jimmy";
    $title = "I Got Top At Bikini Bottom";
    echo "Adding song... url: $url    uploader: $uploader    title: $title<br><br>";
    $my_playlist->add_song($url, $uploader, $title);

    // 7.1) check that the song was added
    echo "Song List:<br>";
    $song_list = $my_playlist->get_song_list();
    foreach($song_list as $song)
    {
        echo ">>>";
        print_r($song);
        echo "<br>";
    }
    $cnt = count($song_list);
    echo "Song count: $cnt";
    echo "<br><br>";

    // 8) vote_encore() & get_encore_score()
    echo "Testing Encore... Current Song: ";
    print_r($my_playlist->get_current_song());
    echo ".... encore count: "; print_r($my_playlist->get_encore_score());
    echo "<br>";
    echo "After Encore function:  ";
    $my_playlist->vote_encore();
    print_r($my_playlist->get_current_song());
    echo ".... encore count: "; print_r($my_playlist->get_encore_score());
    echo "<br><br>";

?>

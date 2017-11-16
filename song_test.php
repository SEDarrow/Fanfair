<?php
	error_reporting(E_ALL);
  	ini_set('display_errors', 1);

	require_once('song_class.php');
	require_once('user_class.php');
	require_once('playlist_class.php');
	
	$playlist = new Playlist("admin", 1);

	print_r($playlist->get_song_list());
	
?>

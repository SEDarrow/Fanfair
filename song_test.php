<?php
	require_once('song_class.php');
	error_reporting(E_ALL);
  	ini_set('display_errors', 1);

			
	$song = new Song('testing', 'testing', 'admin', 1);
	$song->vote(1);
	$song->vote(0);
	$song->vote_encore();

	echo('upvotes: ' . $song->get_upvotes() . '</br>');
	echo('downvotes: ' . $song->get_downvotes() . '</br>');
	echo('encore: ' . $song->get_encore() . '</br>');

	require_once('user_class.php');
	$user = new User("admin");
	print_r($user);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Fanfair</title>
        <style>
            input {
                margin-bottom: 0.5em;
            }
        </style>
		<link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">
		<link rel="stylesheet" href="style/common.css">
		<link rel="stylesheet" href="style/playlist.css">

    </head>

<body>
<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
 
require_once('header.php');
require_once('playlist_class.php');
	$currentPlaylist = new Playlist($_SESSION['playlist']);
	
	$upvotes = 0;
	$down = 0;
	$total = 0;
?>
	<div id="addSongArea">
	<form action="Playlist_Page_User.php" method="post">
		<h1 id="addSongTitle"> Add a song to the playlist: </h1>
		<div id='songInputs'>
			<h2> Youtube Url: <input type="text" name="url"></h2>
			<h2> Song Name: <input type="text" name="sname"></h2>
			<input id="button" id="addSongButton" type="submit" name="submit" value="Add Song">
		</div>
	</form>

	<?php
		if(isset($_POST['submit'])){
			if (!(empty($_POST['url'])) && !(empty($_POST['sname']))) { 
				$user = $_SESSION['username'];
				$url = $_POST['url'];
				$name = $_POST['sname'];
				$err = $currentPlaylist->add_song($url,$user,$name);
				if ($err) echo "<p class='error'>$err</p>";
				else echo "<p>$name added.</p>";
			} else {
				echo "<p class='error'>Please enter a url and song name</p>";
			}
		}
	?>

	</div>

	<form action="" method="post">
		<input type="submit" name="remove" value="Remove Current Song">
	</form>

	<?php
		if(isset($_POST['remove'])){
			
				$user = $_SESSION['username'];
				$playlistUsr =  $currentPlaylist->get_owner_username();
				
				if($user == $playlistUsr){
					
					$currentPlaylist->remove_current_song();
					
				}
				
				 echo "<meta http-equiv='refresh' content='0'>";
			
		}
	?>		
		
	<form action="" method="post">
		<input type="submit" name="stereo" value="Stereo Page">
	</form>
	
	<?php
		if(isset($_POST['stereo'])){
			
				$user = $_SESSION['username'];
				$playlistUsr =  $currentPlaylist->get_owner_username();
				
				if($user == $playlistUsr){
					
					header("Location: fanfair.php");
					
				}
		}
	?>
		
	<form action="" method="post">
		<input type="submit" name="PlaylistList" value="Back To Playlists">
	</form>
	
	<?php
		if(isset($_POST['PlaylistList'])){
			header("Location: Selector_Page.php");
	
		}
	?>	
	<form id="songs" method="POST" action=''>

	<?php
	$MasterList = $currentPlaylist->get_song_list();
	foreach($MasterList as $i => &$song){
		$upvotes = $song->get_upvotes();
		$down = $song->get_downvotes();
		$total = $upvotes - $down;
		$title = $song->get_title();
		
		echo "<div class='song'>
			<div class='songInfo'>
				<input type='submit' name='$i'  value='⇧'>
		      		<h3> $total </h3>
		      		<input type='submit' name='$i'  value='⇩'>
				<span class='space'> </span>
	              		<h3> $title </h3>
			</div>
		      </div>";			
	}
	?>

	</form>

	<?php
	$master = $currentPlaylist->get_song_list();
	foreach($master as &$songif){
	$sid = $songif->get_sid();
	if (isset($_POST['$sid'])) 
	{ 
		$songif->vote(1);
		echo($sid);
	}  
	}
	?>


</body>
</html>
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

	<div id="links">
	<?php
	
	if ($_SESSION['username'] == $currentPlaylist->get_owner_username() ||  $_SESSION['token'] == 1)
		echo '<form action="" method="post">
			<input id="button" type="submit" name="stereo" value="To Stereo Page" style="margin:10px;margin-top:0">
		      </form>';
	
		if(isset($_POST['stereo'])){
			header("Location: fanfair.php");
		}

	?>
		
	<form action="" method="post">
		<input id="button" type="submit" name="PlaylistList" value="Back To Playlists" style="margin:10;margin-top:0">
	</form>
	
	<?php
		if(isset($_POST['PlaylistList'])){
			header("Location: Selector_Page.php");
	
		}
	?>	
	</div>

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
				
				$vid = $_POST['url'];

				$pos = strpos($vid, "&t=");
				if ($pos > 0) $vid = substr($vid, 0, $pos);
				
				$vidlen = strlen($vid);
				$url = "00000000000";
				$urlc = 0;
				for ($x = $vidlen - 11; $x < $vidlen && $x > 0; $x++)
				{
				$url[$urlc] = $vid[$x];
				$urlc++;
				}
				
				if ($vidlen - 11 < 0) $err = "URL is not valid";
				else $err = $currentPlaylist->add_song($url,$user,$name);

				if ($err) echo "<p class='error'>$err</p>";
				else echo "<p>$name added.</p>";
				
			} else {
				echo "<p class='error'>Please enter a url and song name</p>";
			}
		}
	?>

	</div>

<?php
	if ($_SESSION['username'] == $currentPlaylist->get_owner_username() ||  $_SESSION['token'] == 1)
		echo '<form action="" method="post" style="margin-top:10px;display:inline-flex;width:100%;justify-content:center">
			<input type="submit" name="remove" value="Remove Current Song" id="button">
			<input style="margin-left:20px" type="submit" name="clear" value="Clear Playlist" id="button">
		</form>';

	
		if(isset($_POST['remove'])){
			$currentPlaylist->remove_current_song();
			echo "<meta http-equiv='refresh' content='0'>";	
		}

		if(isset($_POST['clear'])){
			$currentPlaylist->remove_all_songs();
			echo "<meta http-equiv='refresh' content='0'>";	
		}
	?>		
		
	
	<?php
	
	
	function up($s){
		
		$pid = $_SESSION['playlist'];
		
		$query = "UPDATE playlist_contains_song SET upvotes = upvotes + 1 WHERE pid = $pid AND sid = $s";
		executeQuery($query);
	}
	function down($s){
		
		$pid = $_SESSION['playlist'];
		
		$query = "UPDATE playlist_contains_song SET downvotes = downvotes + 1 WHERE pid = $pid AND sid = $s";
		
		executeQuery($query);
		
	}
	
	?>
	
	
	
		
		
	<form id="songs" method="POST" action="Playlist_Page_User.php">

	<?php
	$MasterList = $currentPlaylist->get_song_list();
	foreach($MasterList as $i => &$song){
		$upvotes = $song->get_upvotes();
		$down = $song->get_downvotes();
		$total = $upvotes - $down;
		$title = $song->get_title();
		$sid = $song->get_sid();
		
		echo "<div class='song'>
			<div class='songInfo'>
				<input id='arrow' type='submit' name='$sid'  value='⇧' onclick = 'up($sid)' id = '$sid' style='margin-left:20px;'>
		      		<h3 class='votes'> $total </h3>
		      		<input id='arrow' id='$sid' type='submit' name='$sid'  value='⇩' onclick = 'down($sid)'>
				<span class='space'> </span>
	              		<h3 class='songTitle'> $title </h3>
			</div>
		      </div>";			
	}
	
	
	
	?>
	</form>
	
	<?php
	$MasterList = $currentPlaylist->get_song_list();
	foreach($MasterList as $i => &$song){
	
	$sid = $song->get_sid();	
	
	if (isset($_POST[(string)$sid])) {
		if($_POST[(string)$sid] == '⇧'){
			$conn = conn_start();
			$pid = $_SESSION['playlist'];
			$query = "UPDATE playlist_contains_song SET upvotes = upvotes + 1 WHERE pid = $pid AND sid = $sid";
			executeQuery($conn, $query);
			header("Refresh:0");
			
		}else if($_POST[(string)$sid] == '⇩'){
			$conn = conn_start();
			$pid = $_SESSION['playlist'];
			$query = "UPDATE playlist_contains_song SET downvotes = downvotes + 1 WHERE pid = $pid AND sid = $sid";
			executeQuery($conn, $query);
			header("Refresh:0");
		
    		}
	}
	}
	
	
	
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
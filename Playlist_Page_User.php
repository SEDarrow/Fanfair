<!DOCTYPE html>
<html>
<style> 
td, th {
     border: 1px solid;
     text-align: center;
     padding: 0.5em;
  }  
  input[type='radio'] { transform: scale(4); }
  input[type='submit'] { transform: scale(1.5); }
	input[type='button'] { transform: scale(1); }

</style>

    <head>
        <meta charset="UTF-8">
        <title>Fanfair - Log In
		</title>
        <style>
            input {
                margin-bottom: 0.5em;
            }
        </style>
		<link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">
		<link rel="stylesheet" href="style/common.css">
    </head>

    <body>
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
	
	$MasterList = $currentPlaylist->get_song_list();
	?>

	<form action="" method="post">
		<font size='8'>
		Youtube Url: <input type="text" name="url"><br>
		Song Name: <input type="text" name="sname"><br>
		<input type="submit" name="submit" value="Submit">
	</form>

	<?php
		if(isset($_POST['submit'])){
			if (!(empty($_POST['url'])) && !(empty($_POST['sname']))) { 
				$user = $_SESSION['username'];
				$url = $_POST['url'];
				$name = $_POST['sname'];
				$err = $currentPlaylist->add_song($url,$user,$name);
				if ($err) echo "<p class='error'>$err</p>";
			} else {
				echo "<p class='error'>Please enter a url and song name</p>";
			}
		}
	?>
	<form method="POST" action=''>
	<?php 
	foreach($MasterList as &$song){
		
		$upvotes = $song->get_upvotes();
		$down = $song->get_downvotes();
		$total = $upvotes - $down;
		
		echo "<font size='8'>";
		echo("<center>");
		echo("<left>");
		//echo($total);
		
		
		
		?>
		
		<input type="submit"name="$song->get_sid()"  value="⇧">
		
		<?php 
		echo "<font size='8'>";
		echo($total); 
		?>
		<input type="submit" name="$song->get_sid()"  value="⇩">
		
		
	
		
		
	
		<?php
		echo($song->get_title());		
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
<!DOCTYPE html>
<html>
<style> 
td, th {
     border: 1px solid;
     text-align: center;
     padding: 0.5em;
  }  
  input[type='radio'] { transform: scale(4); }
	input[type='submit'] { transform: scale(1); }

</style>

<head>
    <meta charset="UTF-8">
    <title>Fanfair
	</title>
    <style>
        input {
             margin-bottom: 0.5em;
        }
    </style>
	<link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">
	<link rel="stylesheet" href="style/common.css">
</head>
	
<?php
//---------------------------------- ADD DATABASE FUNCTION CALL HERE | REMOVE URL TESTING ---------------------------------------
$pid = '';
$sid = '';
$url = '';
$player = '';
$top_song = '';
$song_list ='';
$total_songs = '';

session_start();
require_once('header.php');
require_once('playlist_class.php');

if ((empty($_SESSION['username'])) || (empty($_SESSION['playlist'])))
	header('Location: Selector_Page.php');

$pid = $_SESSION['playlist'];
$player = new Playlist($pid);

if ($player->get_owner_username() <> $_SESSION['username'])
	header('Location: Selector_Page.php');

$song_list = $player->get_song_list();
$total_songs = count($song_list);

if ($total_songs <= 0)
	header('Location: Playlist_Page_User.php');

$top_song = $player->get_current_song();
$url = $top_song->get_url();
$_SESSION['song'] = $top_song->get_sid();
$sid = $_SESSION['song'];


$player->remove_song($sid);

// --------------------- FIX LOGIN | REGISTER TO SAY LOGOUT IF SESSION IS TRUE -----------------------------------
echo"<div style='text-align:center'><iframe id='ik_player_iframe'  width='640' height='390'src='https://www.youtube.com/embed/$url?enablejsapi=1&autoplay=1'></iframe></object></div>'";
echo"<hr><div style='text-align:center'>";

?>
<script>
  var tag = document.createElement('script');
  tag.id = 'iframe-demo';
  tag.src = 'https://www.youtube.com/iframe_api';
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  var player;
  function onYouTubeIframeAPIReady() {
    player = new YT.Player('ik_player_iframe', {
        events: {
          'onReady': onPlayerReady,
          'onStateChange': onPlayerStateChange
        }
    });
  }
  function onPlayerReady(event) {
    //document.getElementById('ik_player_iframe').style.borderColor = '#FF6D00';
  }
  function changeBorderColor(playerStatus) {
    var color;
    if (playerStatus == -1) {
      //color = "#37474F"; // unstarted = gray
    } else if (playerStatus == 0) {
      //color = "#FFFF00"; // ended = yellow
	  document.getElementById("action").submit();
	  //document.location.reload(true);
    } else if (playerStatus == 1) {
      //color = "#33691E"; // playing = green
    } else if (playerStatus == 2) {
      //color = "#DD2C00"; // paused = red
    } else if (playerStatus == 3) {
      //color = "#AA00FF"; // buffering = purple
    } else if (playerStatus == 5) {
      //color = "#FF6DOO"; // video cued = orange
    }
    if (color) {
      document.getElementById('ik_player_iframe').style.borderColor = color;
    }
  }
  function onPlayerStateChange(event) {
    changeBorderColor(event.data);
  }
  //--------------------------- REPLACE FORM WITH DATABASE FUNCTION CALL AT TOP OF THE FILE AND REMOVE TESTING FORM --------------------------------------
</script>

  <div style="display:inline-flex">
  <form id="action" method="POST" action="fanfair.php">
        <input id="button" name="go" type="submit" value="SKIP" style="margin-right:30px">
  </form>

  <form id="action" method="POST" action="Playlist_Page_User.php">
        <input id="button" name="go" type="submit" value="Back To Voting">
  </form>
  </div>
</html>
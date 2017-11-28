<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Fanfair - Playlists</title>
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
		
		$un_temp = "";
		$pw_temp = "";
		$usernameTest = "";
		$passTest = "";
		$UN_Err = "";
		$PW_Err = "";
		$flag = 0;
		$success = 0;
		$successs = 0;
		$nvalue = "";
		
	
	function inputsanitize($info){
		
		$info = stripslashes($info);
		$info = htmlspecialchars($info);
		return $info;
	}
?>
<?php 
	echo "<center>";
	echo "<h1 style='border-bottom-style:solid;width:35%;font-size:55px;'>Current Playlists</h1>";
	require_once('database/database_functions.php');
	$conn = conn_start();
	$query = "SELECT * FROM playlist";
		
		
	$result = $conn->query($query);
		
			
				
	$rows = $result->num_rows;
?>
	</center>
	<form method = 'POST' action = ''>
	
<?php
	for($j =0; $j < $rows; $j++){ //This loop scans the database for current playlists.	
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$name = ((string)$row['pid']); //Grabbing the PID from the database
		echo "<h2 style='margin-left:30%'> <input type='radio' name='playlist' value=$name>" . $row['username'] . "</h2>";
	}
?>
	<input id='button' type='submit' name = 'Submit Button' value ='View Playlist' style='position:fixed;bottom:20px;left:45%'>
	
	<br>
	
	<?php for($t =0; $t < 1; $t++){
		if(isset($_POST['playlist'])){
		echo("<br>");
		//echo $_POST['playlist'];
		
		$_SESSION['playlist'] = $_POST['playlist'];
		header('Location: Playlist_Page_User.php');
		
		
		}
	}
	?>
	
	</form>
	</div>
	<?php 
	
	
	
	/*
	if(isset($_POST['submit'])){
		if(isset($_POST[radio])){
			
		echo($_POST['radio']);
			
		}
		
		//header( "refresh:4;url=login_page.php" );
		
	}
	*/
		
	
	?>
<?php /*

Requested Username:<br>
<input type="text" name = "NewUser" value = <?php $nvalue ?>><br>
<span class="error"><?php echo $UN_Err;?></span>
<br><br>

Requested Password:<br>
<input type="text" name = "NewPass" value = <?php $passTest ?>><br>
<span class="error"><?php echo $PW_Err;?></span>
<br><br>

<input type="submit" value= "Submit">

</form>
*/ ?>

</body>
	
	

	
	
</html>

<!DOCTYPE html>
<html>
<style> td, th {
     border: 1px solid;
     text-align: center;
     padding: 0.5em;
  }  
  <style>
body { 
  background: url("background.png") repeat;
}
#logo {
  position: absolute;
  top: 0px;
  left: 0px;
  right: 0px;
  width: 395px;
  height: 106px;
  z-index: -1;
}
#banner {
  position: absolute;
  top: 0px;
  left: 395px;
  right: 0px;
  width: 100%;
  height: 106px;
  z-index: -1;
}
input[type='radio'] { transform: scale(4); }
input[type='submit'] { transform: scale(4); }
</style>
</head>
<body>
  <img id="logo" src="Logo.png" alt="Logo Image"/>
</body>
<body>
  <img id="banner" src="Banner.png" alt="Banner Image"/>
</body>  
<body background="background.png"></body>
</style>
    <head>
        <meta charset="UTF-8">
        <title>Log in to Website
		<style>
            .error {color: #FF0000;}
        </style>
		</title>
        <style>
            input{
                margin-bottom: 0.5em;
            }
        </style>
    </head>
	

<br><div style='text-align:center'>
<br><br><br><br><br><br><br>
<body>
<?php 

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

		
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
			echo "<font size='10' face='Arial'>";
			echo "Current Artists";
require_once('database_functions.php');
	$conn = conn_start();
	$query = "SELECT * FROM playlist";
		
		
	$result = $conn->query($query);
		
			
				
	$rows = $result->num_rows;?>
	
	<form method = 'POST' action = ''>
	
	<?php
	for($j =0; $j < $rows; $j++){ //This loop scans the database for current playlists.
			
			$result->data_seek($j);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			echo "<font size='18' face='Arial'>";
			echo $row['username'];
			
			$name = ((string)$row['pid']); //Grabbing the PID from the database
			
	?>
			<input type = "Radio" name = 'playlist' value=<?php echo($name) ?>> //creation of the button locked to the PID value
			<br>
	<?php
		}
	?>
	
	<br>
	<input type="submit" name = "Submit Button" value = 'Go!' >
	
	<?php for($t =0; $t < 1; $t++){
		if(isset($_POST['playlist'])){
		echo("<br>");
		//echo $_POST['playlist'];
		
		$_SESSION['playlist'] = $_POST['playlist'];
		header('Location: fanfair.php');
		
		
		}
	}
	?>
	
	</form>
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

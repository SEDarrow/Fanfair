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


require_once 'database_funtions.php';
		
		$conn = conn_start();
		$username = sanitize($conn,$username);
		
		$query = "SELECT * FROM user WHERE username LIKE '$username'";
		
		
		$result = executeQuery($conn , $query);
		
		
		$un_temp = "";
		$pw_temp = "";
		$usernameTest = "";
		$passTest = "";
		$flag = 0;
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			
			//$passTest = inputsanitize($_POST["NewUser"]);
			
			
			
			if(!(isset($_POST["NewUser"]))){
				echo $_POST["NewUser"];
				$UN_Err = "Please Enter A Username";
				$flag = 0;
				
			}else if(count($result) != 0 ){
				
				$UN_Err = "Sorry That Username Is Already Taken";
				$connection->mysql_close();
			}else{
				
				echo"Congrats";
				
			}
			
			
			
		}
	
	$conn -> mysql_close();
?>
<form method = "POST" action = "register_page.php">

Requested Username:<br>
<input type="text" name = "NewUser" value = <?php $username ?>><br>
<span class="error"><?php echo $UN_Err;?></span>
<br><br>

Requested Password:<br>
<input type="text" name = "NewPass"><br>
<span class="error"><?php echo $PW_Err;?></span>

<input type="submit" value= "Submit">
</form>

</body>
	
	

	
	
</html>




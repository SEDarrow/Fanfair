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
<form method = "post" action = "register_page.php">


<?php 
	require_once("grab_users.php");
	
		$result = $Q_result;
		$rows = $result -> mysql_num_rows;
		$row = $Q_rows;
		$un_temp = "";
		$pw_temp = "";
		$usernameTest = "";
		$passTest = "";
		$flag = 0;
		
		//if($_SERVER["REQUEST_METHOD"] == "POST"){
			
			$usernameTest = inputsanitize($_POST["NewUser"]);
			
			for($r = 0; $r < $rows; $r++){
				
				$result->mysql_data_seek($r);
				$row = $result->mysql_fetch_array(MYSQLI_NUM);
				echo $row[0];
				if($row[0] = $usernameTest){
					$flag = 1;
				}
				
				
			}
			//$passTest = inputsanitize($_POST["NewUser"]);
			
			if(!(isset($_POST["NewUser"]))){
				echo $_POST["NewUser"];
				$UN_Err = "Please Enter A Username";
				
				
			}else if($flag = 1){
				
				$UN_Err = "Sorry That Username Is Already Taken";
				
			}else{
				
				echo"Congrats";
				
			}
			
			
			
		//}
	function inputsanitize($info){
		
		$info = stripslashes($info);
		$info = htmlspecialchars($info);
		return $info;
	}
?>
Requested Username:<br>
<input type="text" name = "NewUser" value = <?php $usernameTest ?>><br>
<span class="error"><?php echo $UN_Err;?></span>
<br><br>

Requested Password:<br>
<input type="text" name = "NewPass"><br>
<span class="error"><?php echo $PW_Err;?></span>
<input type="submit" value= "Submit">


</form>
</body>
	
	

	
	
</html>




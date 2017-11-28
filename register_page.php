<!DOCTYPE html>
<html>
 <head>
    <meta charset="UTF-8">
    <title>
	    FanFair - Register
	</title>
    <style>
        input{
            margin-bottom: 0.5em;
        }
    </style>
	<link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">
	<link rel="stylesheet" href="style/common.css">
</head>

<body>
	
<div style='text-align:center;'>
<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('header.php');
require_once('database/database_functions.php');

		
		$un_temp = "";
		$pw_temp = "";
		$usernameTest = "";
		$passTest = "";
		$UN_Err = "";
		$PW_Err = "";	
		$flag = 0;
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			
		$username = $_POST["NewUser"];
		$conn = conn_start();
		$username = sanitize($conn,$username);
		
		$query = "SELECT * FROM user WHERE username LIKE '$username'";
		
		
		$result = executeQuery($conn , $query);
		
			//$passTest = inputsanitize($_POST["NewUser"]);
			
			
			
			if(!(isset($_POST["NewUser"]))){
				echo $_POST["NewUser"];
				$UN_Err = "Please Enter A Username";
				$flag = 0;
				
			}else if(count($result) != 0 ){
				
				$UN_Err = "Sorry That Username Is Already Taken";
				
			}else{
				
				$flag = 1;
				
			}
			
			if(empty($_POST["NewPass"])){
				$PW_Err = "Please Enter A Password";
				
				$flag = 0;
			}else{
			
				$passTest = $_POST["NewPass"];
				$salt1 = "qm&h*";
				$salt2 = "pg!@";
				
				$flag = 1;
			}
			if($flag){
				
				create_user($username, $passTest);
				$result = executeQuery($conn , "INSERT INTO playlist (username, name, playing) VALUES ('$username', '', -1)");
				Echo "Congratulations On Your New Account! Now Returning To Log In Page <br>";
				
				header( "refresh:4;url=login_page.php" );
				
			}
			
			
			
	$conn ->close();	
		}

?>
<form method = "POST" action = "register_page.php">
<h1 style="font-size:80px;line-height:100px;margin:0;width:40%;border-bottom-style:solid;margin:auto"> Register </h1>
<div>
	<h2>Requested Username:</h2>
	<input type="text" name = "NewUser" value = <?php $username ?>>
	<p class="error"><?php echo $UN_Err;?></p>

	<h2 style="margin-top: 30px">Requested Password:</h2>
	<input type="text" name = "NewPass">
	<p class="error"><?php echo $PW_Err;?></p>

	<input style="margin-top: 30px" type="submit" value= "Submit" id="button">
</div>
</form>

</body>
</html>




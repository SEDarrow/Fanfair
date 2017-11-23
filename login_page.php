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
            input {
                margin-bottom: 0.5em;
            }
        </style>
    </head>
    <body>
        <?php
		session_start();
		if (isset($_SESSION['username']))
		{
			redirect($_SESSION['type']);
		}
		
		require_once 'login.php';
		$connection = new mysqli($hn, $un, $pw, $db);
		
		if ($connection->connect_error) die($connection->connect_error);
		
		$un_temp = "";
		$pw_temp ="";
		$flag = false;
		$loggedin = false;
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$un_temp = mysql_entities_fix_string($connection,$_POST["username"]);
			$pw_temp = mysql_entities_fix_string($connection,$_POST["password"]);
			
		
          // Is someone already logged in? If so, forward them to the correct
          // page. (HINT: Implement this last, you cannot test this until
          //              someone can log in.)
          
          
          // Were a username and password provided? If so check them against
          // the database.
		  
		  if (empty($_POST["username"]) && isset($_POST["username"])) $flag =  true;
		  else if (isset($_POST["username"]) && !preg_match("/[a-zA-Z'-]+$/", $un_temp)) $flag = true;
          
		  if (empty($_POST["password"]) && isset($_POST["password"])) $flag =  true;
		  
		  $query  = "SELECT * FROM user WHERE username='$un_temp'";
		  $result = $connection->query($query);
		  if (!$result) $flag = true;
		  elseif ($result->num_rows)
		  {
			$row = $result->fetch_array(MYSQLI_NUM);

			$result->close();

			//$salt1 = "qm&h*";
			//$salt2 = "pg!@";
			//$token = hash('ripemd128', "$salt1$pw_temp$salt2");

			if ($pw_temp === $row[1])
			{
              $_SESSION['username'] = $un_temp;
              $_SESSION['password'] = $pw_temp;
             // $_SESSION['forename'] = $row[0];
              //$_SESSION['surname']  = $row[1];
			  $_SESSION['type'] = $row [3];
			  $loggedin = true;
			}
			else $flag = true;
		  }
		  else $flag = true;
		}
          //      If username / password were valid, set session variables
          //      and forward them to the correct page
          
          
          //      If the username / password were not valid, show error message
          //      and populate form with the original inputs
          
          
        ?>
        <br><br><br><br><br><br>
                
        <p style="color: red">
        <!--Placeholder for error messages-->
        </p>
        <?php
		echo"<br><div style='text-align:center'>  ";
        echo'<form method="post" action="login_page.php">';
            echo'<label>Username: </label>';
            echo'<input type="text" name="username" value=' . $un_temp . '><br>';
            echo'<label>Password: </label>';
            echo'<input type="password" name="password" value=' . $pw_temp . '> <br>';
            echo'<input type="submit" value="Log in">';
        echo'</form>';
		echo'<span class="error">';
		  if ($flag === true) { echo' Invalid Username/Password'; }
			echo'</span><br><br>'; 
			
			if ($loggedin === true)
				redirect($_SESSION['type']);
			
			
		?>
        
      
		Don't Have An Account? <a href="register_page.php">Register</a>
		</div><t>
</html>
<?php
// place useful functions here
// examples: salt and hash a string
//           check to see if a username/password combination is valid
//           forward user or admin to the correct page
  function mysql_entities_fix_string($connection, $string)
  {
    return htmlentities(mysql_fix_string($connection, $string));
  }	

  function mysql_fix_string($connection, $string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $connection->real_escape_string($string);
  }

  function redirect($type)
  {
	  if ($type == '0')
		header("Location: fanfair.php");
	  if ($type == '1')
		header("Location: fanfair.php");
  }
  
?>

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

</style>
<?php
$vid = '';
require_once('header.php');
  if (isset($_POST['video'])) $vid = $_POST['video'];
$vidlen = strlen($vid);
$url = "nfWlot6h_JM";
$urlc = 0;
for ($x = $vidlen - 11; $x < $vidlen && $x > 0; $x++)
{
  $url[$urlc] = $vid[$x];
  $urlc++;
}


	if($_SESSION['type'] = 'admin' || $_SESSION['type'] = 'user'){
		echo"<br><div style='text-align:right'><a href='logout_page.php'>LogOut</a> </div><t><br><br><br><br>";   

	}else{
		echo"<br><div style='text-align:right'><a href='login_page.php'>LogIn</a> </div><t><br><br><br><br>";
	}
	?>
	<form action="" method="post">
	<input type="submit" name="vote" value="Voting Page">
		
	
	</form>
	
	<?php
		if(isset($_POST['vote'])){
			
				
					
					header("Location: Playlist_Page_User.php");
					
				
				
				 
			
		}
		
	
	
echo"<div style='text-align:center'><iframe width='420' height='315'src='https://www.youtube.com/embed/$url?autoplay=1'></iframe></object></div><hr>'";
echo"<div style='text-align:center'>";
echo"<table align='center'><tr><th>Votes</th><th>Song Name</th><th>Duration</th></tr>";
echo"</table>";
?>
  <form method="POST" action="fanfair.php">
    <p>
      URL:
        <input name="video" type="text" value="" size="50" maxlength="50">
    </p>
  </form>
  
  <?php
  
  
  
  ?>
  
  
  
  
  
 </html>
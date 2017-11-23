<link rel="stylesheet" href="style/header.css">
<img src="images/logo.png" id="logo">
<img src="images/lines.png" id="lines">

<div id="header-buttons">
<?php	
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		echo "<span id='hello'> Hello, $username! </span>";
		echo '<a href="logout_page.php">
				<img src="images/logout.png" id="logout" class="header-button" >
			</a>';
	} else {
		echo '<a href="register_page.php">
				<img src="images/register.png" id="register" class="header-button" >
			</a>
			<a href="login_page.php">
				<img src="images/login.png" id="login" class="header-button">
			</a>';
	}
?>
</div>
<div id="header-space"></div>
<!DOCTYPE html>
<html>
<?php 
require_once 'login.php';
		//$connection = new mysqli($hn, $un, $pw, $db);
		
	if ($connection->connect_error){
		die($connection->connect_error);
		echo"Fail";
		}
	
	$query = "SELECT username FROM user";
	$Q_result = $connection->mysql_query($query);
	$Q_rows = $Q_result-> mysql_num_rows;
	
	//for($j = 0; $j < $Q_rows; $j++){
		
	//	$Q_result -> mysql_data_seek($j);
    //	$row = 
		
	//}
	
	
	$Q_result ->mysql_close();
	$connection ->mysql_close();


?>

</html>
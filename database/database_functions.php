<?php
// database_functions.php
// Description: Functions that pertain to the mysql database

   function executeQuery($conn, $query)
    {
        /*
         * Description: connect to database and execute query
         *
         * Parameters:
         * |   Param    |   Type    |   Description     |
         * |   $query   |   string  |   MySQL query     |
         *
         * Returns: <ARRAY <ASSOC_ARRAY>> - a list of associative arrays (data rows)
         *          0 - Query Successfull, no returned items
         *          1 - Generic MySQL Error
         */
        $returnValue = array();
        $result = $conn->query($query);

        // if no result, MySQL Error.  Close connection
        if (!$result) {
            $conn->close();
            return 1; 
        }
        
        // if result type is boolean, that means it was not a select query
        if (gettype($result) == 'boolean') 
        {
            return 0;
        }

        // get populate return array
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $returnValue[] = $row;
        }
        
        // close result
        $result->close();
        
        return $returnValue;
    }
 
   function conn_start()
   {
        /*
         * Description: Connect to the Database
         * Parameters: None
         * Returns: mysqli->conn; 
         */ 
       require('login.php');
       $conn = new mysqli($hn, $un, $pw, $db);
       if ($conn->connect_error)
           die($conn->connect_error);  // Need better error handling

       return $conn; 
    }

	function sanitize($conn, $string) {
		return htmlentities(mysql_fix_string($conn, $string));
	}

	function mysql_fix_string($conn, $string) {
		if (get_magic_quotes_gpc())
			$string = stripslashes($string);
		return $conn->real_escape_string($string);
	}
?>

<?php
	$db = @mysql_connect("localhost","root","default");
		if(!$db){
			die("MySQL connection error. " . mysql_error());
		}
		$db_select = mysql_select_db("course_navigator", $db);
		if(!$db_select){
			die("Something went wrong with the query. " . mysql_error());
		}


		$isbn = $_GET['isbn'];

		mysql_query("INSERT INTO onlineretailers VALUES('', '0', '$isbn')", $db);


		mysql_close();

?>

<meta http-equiv="refresh" content="0; url=/edit_textbook.php?isbn=<?php echo $isbn;?> "/>
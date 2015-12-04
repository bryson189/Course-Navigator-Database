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

		$new_name = $_POST['textbookname'];
		$new_ednum = $_POST['ednum'];


		//get num of author tuples for a certain textbook
		$authors = mysql_query('SELECT finit, lname FROM authors WHERE isbn ="'.$isbn.'"', $db);

		$author_array=$_POST['author'];
		$numofauthors=sizeof($author_array);

		//mysql_query("DELETE FROM authors WHERE isbn='$isbn'", $db);


		//update authors
		mysql_query("DELETE FROM authors WHERE isbn='$isbn'", $db);
		for($x=0;$x<$numofauthors;$x++){
			mysql_query("INSERT INTO authors VALUES ('$author_array[$x]', '$isbn')", $db);
		}

		$url_array=$_POST['url'];
		$price_array=$_POST['price'];

		$numofretailers=sizeof($url_array);

		//update retailers
		mysql_query("DELETE FROM onlineretailers WHERE isbn='$isbn'", $db);
		for($x=0;$x<$numofretailers;$x++){
			mysql_query("INSERT INTO onlineretailers VALUES ('$url_array[$x]', '$price_array[$x]', '$isbn')", $db);
		}
		
		/*
		mysql_query("DELETE FROM authors WHERE isbn='$isbn'", $db);
		mysql_query("INSERT INTO authors VALUES ('$new_author[0]', '$isbn')", $db);
		mysql_query("INSERT INTO authors VALUES ('$new_author1', '$isbn')", $db);

		*/

		//update courses
		$course_array=$_POST['course'];

		//parse the course string

		$numofcourses=sizeof($course_array);

		mysql_query("DELETE FROM requiredtextbooks WHERE isbn='$isbn'", $db);
		for($x=0;$x<$numofcourses;$x++){
			$split=explode(" ", $course_array[$x]);
			mysql_query("INSERT INTO requiredtextbooks VALUES ('$new_name', '$split[1]', '$split[0]', '$isbn')", $db);
		}
		


		//mysql_query("DELETE FROM authors WHERE isbn='$isbn'", $db);
		/*
		for($x=0; $x<$numofauthors; $x++){
			mysql_query("INSERT INTO authors VALUES ($new_author[$x], $isbn)", $db);
		}
		*/

		//mysql_query("INSERT INTO authors VALUES ('$new_author', '$isbn')", $db);

		//update new name
		mysql_query("UPDATE textbook SET name ='$new_name' WHERE isbn='$isbn'", $db) or die(mysql_error());

		//update new ednnum
		mysql_query("UPDATE textbook SET editionnum ='$new_ednum' WHERE isbn='$isbn'", $db) or die(mysql_error());

				
		mysql_close();

?>

<meta http-equiv="refresh" content="0; url=/textbook_template.php?isbn=<?php echo $isbn;?> "/>
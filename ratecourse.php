<?php
	session_start();
	$db = @mysql_connect("localhost","root","default");
		if(!$db){
			die("MySQL connection error. " . mysql_error());
		}
		$db_select = mysql_select_db("course_navigator", $db);
		if(!$db_select){
			die("Something went wrong with the query. " . mysql_error());
		}


		$course = $_GET['course'];
		$split=explode('-', $course);

		$rating=$_POST['rating'];
		$ratingint= (int) $rating;
		$email = $_SESSION['email'];

		mysql_query("INSERT INTO courserating(deptcode, coursenum, rating, email) VALUES('$split[0]', '$split[1]', '$ratingint', '$email')", $db);


		mysql_close();

?>

<meta http-equiv="refresh" content="0; url=/course_template-logged-in-not-student.php?course=<?php echo $split[0].'-'.$split[1];?> "/>
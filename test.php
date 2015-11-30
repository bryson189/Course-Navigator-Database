<?php 
	$db = mysql_connect("localhost","root","s#Rh=s-uS4=8");
	if(!$db){
		die("Error: " . mysql_error());
	}
	$db_select = mysql_select_db("CourseNav", $db);
	if(!$db_select){
		die("Error: " . mysql_error());
	}
?>
		

<html>
	<head>
	<title>Hello</title>
	</head>
	<body>

	<?php 
		$result = mysql_query("SELECT * FROM professor", $db);
		if(!$result){
			die("Error: " . mysql_error());
		}
	
		while($row = mysql_fetch_array($result)){
			echo $row[0]." ".$row[1]." ".$row[2]." ".$row[3]."<br />";
		}
	?>

	</body>
</html>

<?php
	mysql_close($db);
?>
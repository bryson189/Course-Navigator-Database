<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
} else{
	header('Location: index.php');
	die(mysql_error());
}
require('connect.php');

 $information=$_POST['information'];
 $courses=$_POST['courses'];
 $pnumber=$_POST['pnumber'];
 if ( $_SESSION['usertype'] == 'Professor')
 {
 	$hours=$_POST['hours'];
 	mysql_query("UPDATE professor SET  information='$information' WHERE email = '$email';");
 	mysql_query("UPDATE professor SET  pnumber='$pnumber' WHERE email = '$email';");
 	
 	mysql_query("DELETE from teaches WHERE profemail='$email'");
 	$split = explode(PHP_EOL, $courses);
 	$elements = count($split);
 	for($i = 0; $i < $elements; $i++)
 	{
 		$split_2 = explode(' ', $split[$i]);
	    mysql_query("INSERT INTO teaches (profemail, deptcode, coursenum)
	    VALUES ('$email', '$split_2[0]', '$split_2[1]')");
 	}

 	header('Location: professor-profile-success.php');
}
else{	
	$experience=$_POST['experience'];
 	mysql_query("UPDATE tutor SET  information='$information' WHERE email = '$email';");
 	mysql_query("UPDATE tutor SET  pnumber='$pnumber' WHERE email = '$email';");
 	mysql_query("UPDATE tutor SET  experience='$experience' WHERE email = '$email';");

 	mysql_query("DELETE from tutorteaches WHERE tutoremail='$email'");
 	$split = explode(PHP_EOL, $courses);
 	$elements = count($split);
 	for($i = 0; $i < $elements; $i++)
 	{
 		$split_2 = explode(' ', $split[$i]);
	    mysql_query("INSERT INTO tutorteaches (tutoremail, deptcode, coursenum)
	    VALUES ('$email', '$split_2[0]', '$split_2[1]')");
 	}

 	header('Location: professor-profile-success.php');

 	header('Location: tutor-profile-success.php');
}
?>
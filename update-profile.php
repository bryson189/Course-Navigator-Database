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
 	mysql_query("UPDATE professor SET  courses='$courses' WHERE email = '$email';");
 	mysql_query("UPDATE professor SET  pnumber='$pnumber' WHERE email = '$email';");
 	header('Location: professor-profile-success.php');
}
else{	
 	mysql_query("UPDATE tutor SET  information='$information' WHERE email = '$email';");
 	mysql_query("UPDATE tutor SET  courses='$courses' WHERE email = '$email';");
 	mysql_query("UPDATE tutor SET  pnumber='$pnumber' WHERE email = '$email';");
 	header('Location: tutor-profile-success.php');
}
?>
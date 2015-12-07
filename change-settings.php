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
$password = $_POST['new-password'];

if (isset($password) && trim($password) != '')
{
$oldpassword = mysql_result(mysql_query("SELECT password FROM `login` WHERE email='$email';"), 0);
 if ($_POST['current-password'] != $oldpassword){
	echo "Error! An incorrect password was entered";
	die(mysql_error());
 }

//CHECK IF CONFIRMATION WAS ENTERED CORRECTLY
 $password = $_POST['new-password'];
 if ($password != $_POST['new-password-confirm']){
	echo "Error! The confirmation password does not match!";
	die(mysql_error());
 }
 mysql_query("UPDATE login SET  password='$password' WHERE email = '$email';");
}

 $lname=$_POST['new-lname'];
 $fname=$_POST['new-fname'];
if (!empty ($lname) || !empty($fname))
{
	 mysql_query("UPDATE login SET  password='$password' WHERE email = '$email';");
	 if ( $_SESSION['usertype'] == 'Student')
	 {
			mysql_query("UPDATE student SET fname='$fname', lname='$lname' WHERE email = '$email';");
	 		header('Location: student-profile-success.php');
	 }
	 else if ( $_SESSION['usertype'] == 'Professor')
	 {
			mysql_query("UPDATE professor SET fname='$fname', lname='$lname' WHERE email = '$email';");
	 		header('Location: professor-profile-success.php');
	 }
	 else
	 {
			mysql_query("UPDATE tutor SET fname='$fname', lname='$lname' WHERE email = '$email';");
	 		header('Location: tutor-profile-success.php');
	 }
}
?>
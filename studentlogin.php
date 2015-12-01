<?php  //Start the Session

session_start();
require('connect.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['email']) AND isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$email = $_POST['email'];
$password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `login` WHERE email='$email' AND password='$password';";
 
$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
$_SESSION['email'] = $email;
$_SESSION['usertype'] = mysql_result($result, 0, 2); //set session user type
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
echo "Invalid Login Credentials.";
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['email'])){
 header('Location: logged-in-home.php');
}else{
	die(mysql_error());
}
?>
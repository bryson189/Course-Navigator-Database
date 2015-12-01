<?php

session_start();
require('connect.php');

if($_POST[fname] == ''){
  echo "empty first name";
  die(mysql_error());
}

if($_POST[lname] == ''){
  echo "empty last name";
  die(mysql_error());
}

if($_POST[password] == ''){
  echo "empty password";
  die(mysql_error());
}

if($_POST[email] == ''){
  echo "empty email";
  die(mysql_error());
}

if($_POST[pnumber] == ''){
  echo "empty phone number";
  die(mysql_error());
}

if($_POST[usertype] == 'Student'){
  $sql="INSERT INTO login (email, password, usertype)
  VALUES ('$_POST[email]', '$_POST[password]', '$_POST[usertype]')";
  if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error());
  }
  $sql = "INSERT INTO student (fname, lname, email, pnumber)
  VALUES
  ('$_POST[fname]','$_POST[lname]', '$_POST[email]', '$_POST[pnumber]')";
}
else if($_POST[usertype] == 'Tutor'){
  $sql="INSERT INTO login (email, password, usertype)
  VALUES ('$_POST[email]', '$_POST[password]', '$_POST[usertype]')";
  if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error());

  }
  $sql = "INSERT INTO tutor (fname, lname, email, pnumber)
  VALUES
  ('$_POST[fname]','$_POST[lname]', '$_POST[email]', '$_POST[pnumber]')";
}
else if($_POST[usertype] == 'Professor'){
  $sql="INSERT INTO login (email, password, usertype)
  VALUES ('$_POST[email]', '$_POST[password]', '$_POST[usertype]')";
  if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error());
  }
  $sql = "INSERT INTO professor (fname, lname, email, pnumber)
  VALUES
  ('$_POST[fname]','$_POST[lname]', '$_POST[email]', '$_POST[pnumber]')";
}
if (!mysql_query($sql))
{
  die('Error: ' . mysql_error());

}
$_SESSION['email'] = $_POST[email]; //log in
$_SESSION['usertype'] = $_POST[usertype]; //set session user type

?>
<meta http-equiv="refresh" content="0; url=/logged-in-home.php" />
</body>
</html>

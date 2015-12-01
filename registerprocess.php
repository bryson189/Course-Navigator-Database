<html>
<body>

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

if($_POST[email] == ''){
  echo "empty phone number";
  die(mysql_error());
}

if($_POST[usertype] == 'student'){
  mysql_query("INSERT INTO student (fname, lname, email, pnumber)
  VALUES
  ('$_POST[fname]','$_POST[lname]', '$_POST[email]', '$_POST[pnumber]')");

  $sql="INSERT INTO login (email, password, usertype)
  VALUES ('$_POST[email], $_POST[password], $_POST[usertype]')";
}
else if($_POST[usertype] == 'tutor'){
  mysql_query("INSERT INTO tutor (fname, lname, email, pnumber)
  VALUES
  ('$_POST[fname]','$_POST[lname]', '$_POST[email]', '$_POST[pnumber]')");
  $sql="INSERT INTO login (email, password, usertype)
  VALUES ('$_POST[email], $_POST[password], $_POST[usertype]')";
}
else if($_POST[usertype] == 'professor'){
  mysql_query("INSERT INTO professor (fname, lname, email, pnumber)
  VALUES
  ('$_POST[fname]','$_POST[lname]', '$_POST[email]', '$_POST[pnumber]')");
  $sql="INSERT INTO login (email, password, usertype)
  VALUES ('$_POST[email], $_POST[password], $_POST[usertype]')";
}
if (!mysql_query($sql))
{
  die('Error: ' . mysql_error());

}
mysql_close($connection);
?>
<meta http-equiv="refresh" content="0; url=/index.php" />
</body>
</html>

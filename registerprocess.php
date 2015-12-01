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
  $sql="INSERT INTO student (fname, lname, password, email, pnumber)
  VALUES
  ('$_POST[fname]','$_POST[lname]', '$_POST[password]', '$_POST[email]', '$_POST[pnumber]')";
}
else if($_POST[usertype] == 'tutor'){
  $sql="INSERT INTO tutor (fname, lname, password, email, pnumber)
  VALUES
  ('$_POST[fname]','$_POST[lname]', '$_POST[password]', '$_POST[email]', '$_POST[pnumber]')";
}
else if($_POST[usertype] == 'professor'){
  $sql="INSERT INTO professor (fname, lname, password, email, pnumber)
  VALUES
  ('$_POST[fname]','$_POST[lname]', '$_POST[password]', '$_POST[email]', '$_POST[pnumber]')";
}
mysql_close($connection);
?>
<meta http-equiv="refresh" content="0; url=/index.php" />
</body>
</html>

<?php

$con = mysql_connect("127.0.0.1","root","default");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("coursenavigator", $con);

$sql="INSERT INTO student (fname, lname, username, password, email)
VALUES
('$_POST[fname]','$_POST[lname]', '$_POST[username]', '$_POST[password]', '$_POST[email]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

mysql_close($con)
?>
<meta http-equiv="refresh" content="0; url=/index.html" />
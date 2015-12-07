<?php

  session_start();
  require('connect.php');
  include 'functions.php';
  if (!(endsWith($_POST[email], '@ucalgary.ca')))
  {
    echo "Please use a university of calgary email.";
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

  require('account-activation/send_activation.php');
?>
<!-- <meta http-equiv="refresh" content="0; url=/logged-in-home.php" />
</body>
</html>
 -->
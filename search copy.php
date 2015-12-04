<?php
//error_reporting(E_ALL & ~E_NOTICE);
session_start();
require('connect.php');

if(isset($_SESSION['email'])){
	header('Location: logged-in-home.php');
}
?>

<!DOCTYPE html>
<html>
	<head>
	  	<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
   		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="assets/stylesheets/main.css">
		<title>Course Navigator</title>
	</head>
	<body>
		<header>
			<h1> <b>Course Navigator </b></h1>
		</header>
		<nav class="navbar navbar-inverse">
		  <div class="container">
		    <div class="collapse navbar-collapse" id="myNavbar">
			    <ul class="nav navbar-nav navbar-right">
			      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			      <li><a href="register.php"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
			    </ul>
			    <a class="navbar-brand" href="#">Our Logo</a>
			           <!-- <img alt="Brand" src="assets/images/asd.jpg">-->
				<ul class="nav navbar-nav banner-home">
				    <li class="active"><a href="index.php">Home</a></li>
				      <!--<li><a href="#">About</a></li>-->
				</ul>
		    </div>
		  </div>
		</nav>

		<div class="container">
		  <div class="row content">
		    <div class="col-lg-2 sidenav ">
		    	<div class="btn-group-vertical" role="group">
					<a href = "courses.php"><button  class="btn btn-default">
						<span class="glyphicon glyphicon-education"></span> Courses</button></a>
					<a href = "professors.php"><button class="btn btn-default">
						<span class="glyphicon glyphicon-user" ></span> Professors</button></a>
					<a href = "textbooks.php"><button class="btn btn-default">
						<span class="glyphicon glyphicon-book" ></span> Textbooks</button></a>
					<a href = "tutors"><button class="btn btn-default">
						<span class="glyphicon glyphicon-blackboard" ></span> Tutors</button></a>
					<div class="side-search">
							<form action = "search.php" method = "post" class="form-horizontal">
						<input type="text" class="form-control" name="keyword" placeholder="Search">
						<button type="submit" class="btn btn-default glyphicon glyphicon-search"></button>
					</form>
					</div>
				</div>
		    </div>
		    <div class="col-lg-10 text-left">

					<div class="media">
				<div class="media-left">
					<a href="#">
						<span class="glyphicon glyphicon glyphicon-search">
					</a>
				</div>
				<div class="media-body">
					<h4 class="media-heading">Search Results</h4>

					<?php

				          echo("<font size = 4>Professors</font><br>");

				          $query = "SELECT fname, lname, email FROM professor WHERE email LIKE '%$_POST[keyword]%' OR fname='%$_POST[keyword]%' OR lname LIKE '%$_POST[keyword]%';";

				          $result = mysql_query($query) or die(mysql_error());
				          $count = mysql_num_rows($result);

				          while($row = mysql_fetch_array($result)){
				            echo ("<font size = 2><a href="."/professors.php?id=".$row[2].">".$row[0]." ".$row[1]."</a><br></font>");
				          }


				          echo("<font size = 4>Courses</font><br>");

				          $query = "SELECT deptcode, coursenum, name FROM course WHERE coursenum LIKE '%$_POST[keyword]%' OR deptcode LIKE '%$_POST[keyword]%' OR name LIKE '%$_POST[keyword]%';";

				          $result = mysql_query($query) or die(mysql_error());
				          $count = mysql_num_rows($result);

				          while($row = mysql_fetch_array($result)){
				              echo ("<font size = 2><a href="."/courses.php?id=".$row[0].">".$row[0]." ".$row[1]."</a><br></font>");
				          }

				          echo("<font size = 4>Tutors</font><br>");

				          $query = "SELECT fname, lname FROM tutor WHERE email LIKE '%$_POST[keyword]%' OR fname LIKE '%$_POST[keyword]%' OR lname LIKE '%$_POST[keyword]%';";

				          $result = mysql_query($query) or die(mysql_error());
				          $count = mysql_num_rows($result);

				          while($row = mysql_fetch_array($result)){
				            echo ("<font size = 2><a href="."/tutors.php?id=".$row[0].">".$row[0]." ".$row[1]."</a><br></font>");
				          }


				          echo("<font size = 4>Texbook</font><br>");

				          $query = "SELECT isbn, name, editionnum FROM textbook WHERE isbn LIKE '%$_POST[keyword]%' OR name LIKE '%$_POST[keyword]%' OR editionnum LIKE '%$_POST[keyword]%';";

				          $result = mysql_query($query) or die(mysql_error());
				          $count = mysql_num_rows($result);

				          while($row = mysql_fetch_array($result)){
				            echo ("<font size = 2><a href="."/textbooks?id=".$row[0].">".$row[0]." ".$row[1]."</a><br></font>");
				          }


				          ?>

				</div>
				</div>

          </body>
          </html>

				</div>
		    </div>
		  </div>
		</div>

		<footer class="container-fluid text-center">
			<small>&copy; 2015 Course Navigator</small>
			<nav>
				<a href="index">Home</a>
				<a href="aboutus">About Us</a>
				<a href="contactus">Contact Us</a>
			</nav>
		</footer>

	</body>


</html>

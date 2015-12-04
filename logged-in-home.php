<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
	if ($_SESSION['activation_status']==0)
	{
	header('Location: account-not-activated.php');
	session_destroy();
	}
} else{
	header('Location: index.php');
	die();
}
require('connect.php');

 if ( $_SESSION['usertype'] == 'Student')
 {
		$query = "SELECT fname, lname FROM `student` WHERE email='$email';";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$_SESSION['fname'] = $row[0];
		$_SESSION['lname'] = $row[1];
 }
 else if ( $_SESSION['usertype'] == 'Professor')
 {
		$query = "SELECT fname, lname FROM `professor` WHERE email='$email';";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$_SESSION['fname'] = $row[0];
		$_SESSION['lname'] = $row[1];
 }
 else
 {
		$query = "SELECT fname, lname FROM `tutor` WHERE email = '$email';";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$_SESSION['fname'] = $row[0];
		$_SESSION['lname'] = $row[1];
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
			      <li><a href="account-settings.php"><span class="glyphicon glyphicon-user"></span> Settings </a></li>
			      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			    </ul>
			    <a class="navbar-brand" href="#">Our Logo</a>
			           <!-- <img alt="Brand" src="assets/images/asd.jpg">-->
				<ul class="nav navbar-nav banner-home">
				    <li class="active"><a href="logged-in-home.php">Home</a></li>
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
					<a href = "tutor_home.php"><button class="btn btn-default">
						<span class="glyphicon glyphicon-blackboard" ></span> Tutors</button></a>
				</div>
				<div class="side-search">
				<form action = "search.php" method = "post" class="form-horizontal">
					<input type="text" class="form-control" name="keyword" placeholder="Search">
					<button type="submit" class="btn btn-default glyphicon glyphicon-search"></button>
				</form>					
				</div>
		    </div>
		    <div class="col-lg-10 text-left"> 
		    	<div class="jumbotron">
				</div>
			    <h1>Welcome, <?php echo $_SESSION['fname'];?> <?php echo $_SESSION['lname'];?></h1>
			    <p>This is where the main content should be.</p>
		    </div>
		  </div>
		</div>

		<footer class="container-fluid text-center">
			<small>&copy; 2015 Course Navigator </small>
			<nav>
				<a href="index.php">Home</a>
				<a href="aboutus.php">About Us</a>
				<a href="contactus.php">Contact Us</a>
			</nav>
		</footer>

	</body> 

	
</html> 

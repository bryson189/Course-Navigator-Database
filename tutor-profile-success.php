<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
	$usertype = $_SESSION['usertype'];
} else{
	header('Location: index.php');
	die();
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
			<h1><img src="/assets/images/title.jpg" style="width:345px;height:60px;"></</h1>
		</header>

		<nav class="navbar navbar-inverse">
		  <div class="container">
		    <div class="collapse navbar-collapse" id="myNavbar">
			    <ul class="nav navbar-nav navbar-right">
			      <li><a href="account-settings.php"><span class="glyphicon glyphicon-user"></span> Settings </a></li>
			      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			    </ul>
					<a class="navbar-brand" href="#"> <img src="/assets/images/logo.jpg" style="width:30px;height:30px;">  </a></a>

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
		    	<div class="change-settings">
		    	<h2> <b> My Account </b></h2>
 				<form action = "change-settings.php" method = "post" class="form-horizontal">
					<font size = "5"> <font color="green"><div class = "glyphicon glyphicon-ok"> </div> Your settings have been changed successfuly.</font> </font>
					<br><font size="3"><strong>Email Address: <?php echo $email;?> <br>
					User Type: <?php echo $usertype;?> <br>
					<br> </strong></font>
				  <div class="form-group">
				    <label for="inputname" class="col-sm-2 control-label">First Name</label>
				    <div class="col-sm-4">
				      <input type="text" name = "new-fname" class="form-control" value="<?php echo $_SESSION['fname'];?>" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputname" class="col-sm-2 control-label">Last Name</label>
				    <div class="col-sm-4">
				      <input type="text" name = "new-lname" class="form-control" value="<?php echo $_SESSION['lname'];?>" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputname" class="col-sm-2 control-label">Enter your current password</label>
				    <div class="col-sm-4">
				      <input type="password" name = "current-password" class="form-control" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">New Password</label>
				    <div class="col-sm-4">
				      <input type="password" name = "new-password" class="form-control"  required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Confirm your password</label>
				    <div class="col-sm-4">
				      <input type="password" name = "new-password-confirm" class="form-control"  required>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" value = "Submit" class="btn btn-default">Submit</button>
				    </div>
				  </div>
				</form>

		    	<div class="change-settings">
		    	<h2> <b> My Profile Settings</b></h2>
				<form action="upload-picture.php" method="post" enctype="multipart/form-data">
				  <div class="col-xs-6 col-md-3">
				    <a class="thumbnail">
				      <img src="
				      <?php require('connect.php');
				$oldpassword =@mysql_result(mysql_query("SELECT picture_location FROM `tutor` WHERE email='$email';"), 0);
				echo $oldpassword;?>" alt="profile picture" width="200" height="200" >
				    </a>
				  </div>
				    <br> Upload a profile picture: <br><br>
				    <input type="file" name="fileToUpload" id="fileToUpload"> <br>
				    <input type="submit" value="Upload Image" name="submit">
				</form>
				<br><br><br><br><br><br><br><br><br>
 				<form action = "update-profile.php" method = "post" class="form-horizontal">
					<br>
				  <div class="form-group">
				    <label for="inputname" class="col-sm-2 control-label">Profile Information</label>
				    <div class="col-sm-4">
					  <textarea class="form-control" name = "information" rows="5"><?php require('connect.php'); $info = mysql_result(mysql_query("SELECT information FROM `tutor` WHERE email='$email';"), 0);
				echo $info;?></textarea>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputname" class="col-sm-2 control-label">Experience</label>
				    <div class="col-sm-4">
					  <textarea class="form-control" name = "experience" rows="3"><?php require('connect.php');
				$course = mysql_result(mysql_query("SELECT experience FROM `tutor` WHERE email='$email';"), 0);
				echo $course;?></textarea></textarea>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputname" class="col-sm-2 control-label">Courses Teaching</label>
				    <div class="col-sm-4">
					  <textarea class="form-control" name = "courses" rows="3"><?php require('connect.php');
				$course = mysql_result(mysql_query("SELECT courses FROM `tutor` WHERE email='$email';"), 0);
				echo $course;?></textarea></textarea>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Contact Number</label>
				    <div class="col-sm-4">
				      <input type="tel" name = "pnumber" class="form-control" value = "<?php require('connect.php');
				$cnum = mysql_result(mysql_query("SELECT pnumber FROM `tutor` WHERE email='$email';"), 0);
				echo $cnum;?>">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" value = "Submit" class="btn btn-default">Submit</button>
				    </div>
				  </div>
				</form>
			</div>
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

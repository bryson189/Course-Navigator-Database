<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
	$usertype = $_SESSION['usertype'];
	if ($usertype == 'Professor')
	{
		header('Location: professor-profile.php');
	}
	else if ($usertype == 'Tutor')
	{
		header('Location: tutor-profile.php');
	}	
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
					<a href = "tutors.php"><button class="btn btn-default">
						<span class="glyphicon glyphicon-blackboard" ></span> Tutors</button></a>
				</div>
				<div class="side-search">
					<input type="text" class="form-control" placeholder="Search">
					<button type="submit" class="btn btn-default glyphicon glyphicon-search"></button>
				</div>
				</form>
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

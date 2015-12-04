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
		    		<h2> <b>Create An Account </b> </h2> <br>
 				<form action = "register-process.php" method = "post" class="form-horizontal">
				  <div class="form-group">
				    <label for="inputname" class="col-sm-2 control-label">First Name</label>
				    <div class="col-sm-4">
				      <input type="text" name = "fname" class="form-control" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputname" class="col-sm-2 control-label">Last Name</label>
				    <div class="col-sm-4">
				      <input type="text" name = "lname" class="form-control" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputname" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-4">
				      <input type="text" name = "email" class="form-control" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-4">
				      <input type="password" name = "password" pattern=".{6,}" required title="Minimum of 6 characters"class="form-control"  required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Contact Number</label>
				    <div class="col-sm-4">
				      <input type="tel" name = "pnumber" pattern=".{10,}" required title="Minimum of 10 characters" class="form-control" required>
				    </div>
				  </div>
				  <div class = "form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">User Type:</label>
						<div class="col-sm-4">
						<select name = "usertype">
  							<option value="Student">Student</option>
  							<option value="Professor">Professor</option>
  							<option value="Tutor">Tutor</option>
						</select>
						</div>
					</div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" value = "Submit" class="btn btn-default">Register</button>
				    </div>
				  </div>
				</form>  
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

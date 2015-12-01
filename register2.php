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
			<h1> Course Navigator </h1>
		</header>

		<nav class="navbar navbar-inverse">
		  <div class="container">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">Our Logo</a>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar">
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="index.html">Home</a></li>
		        <!--<li><a href="#">About</a></li>-->
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
		      </ul>
		    </div>
		  </div>
		</nav>

		<div class="container-fluid">
		  <div class="row content">
		    <div class="col-sm-2 sidenav">
		      <p><a href="courses.html">Courses</a></p>
		      <p><a href="professors.php">Professors</a></p>
		      <p><a href="textbooks.html">Textbooks</a></p>
		      <p><a href="tutors.html">Tutors</a></p>
		    </div>
		    <div class="col-sm-8 text-left">
				<div class="jumbotron">
					<div class = "searchbar">
						<div class="col-xs-4">
						<form class="searchbartext" role="search bar">
						  <div class="form-group">
						  	<input type="text" class="form-control" placeholder="Search our database..." id="inputsm">
						  </div>
						  <button type="submit" class="btn btn-default">Search</button>
						</form>
            <br><p><font color="white">REGISTER</font></p>

						  <div class="form-group">

                <form action="registerprocess.php" method="post">
										<font color = "white">First Name:</font> <input type="text" name="fname" /><br><br>
										<font color = "white">Last Name:</font> <input type="text" name="lname" /><br><br>
										<font color = "white">Email:</font> <input type="text" name="email" /><br><br>
                    					<font color = "white">Password:</font> <input type="password" name="password" /><br><br>
										<font color = "white">Phone:</font> <input type="text" name="pnumber" /><br><br>
										<font color = "white">User Type: <select name = "usertype">
  									<option value="student">Student</option>
  									<option value="professor">Professor</option>
  									<option value="tutor">Tutor</option>
										</select>
                    <br><br><button type="submit" class="btn btn-default">REGISTER</button>
                  </form>


						  </div>

						</div>
					</div>
				    </div>
			    <h1>Welcome</h1>
			    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		    </div>
		  </div>
		</div>

		<footer class="container-fluid text-center">
			<small>&copy; Course Navigator</small>

			<nav>
				<a href="index.html">Home</a>
				<a href="aboutus.html">About Us</a>
				<a href="contactus.html">Contact Us</a>
			</nav>
		</footer>

	</body>


</html>

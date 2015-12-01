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
			      <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			      <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
			    </ul>
			    <a class="navbar-brand" href="#">Our Logo</a>
			           <!-- <img alt="Brand" src="assets/images/asd.jpg">-->
				<ul class="nav navbar-nav banner-home">
				    <li class="active"><a href="index.html">Home</a></li>
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
					<a href = "textbook.php"><button class="btn btn-default">
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

		    	<?php 
					$db = @mysql_connect("localhost","root","default");
					if(!$db){
						die("MySQL connection error. " . mysql_error());
					}
					$db_select = mysql_select_db("course_navigator", $db);
					if(!$db_select){
						die("Something went wrong with the query. " . mysql_error());
					}


					$email = $_GET['email'];

					//echo $email;


					$result = mysql_query('SELECT fname, lname, information FROM professor WHERE email = "'.$email.'"', $db);
					$row = mysql_fetch_row($result);
					//echo $row[0]." ".$row[1];

					echo '<div class="prof_content">';
					echo '<img src="assets/images/'.$row[0].$row[1].'.jpg" alt = "'.$row[0].$row[1].'_pic" style = "width:270px;height:360px">';
					echo '<div class="prof_text">';
					echo '<h1>'.$row[0]." ".$row[1].'</h1>';
					echo '<h3>Information: </h3>';
					echo '<p>'.$row[2].'</p>';
					echo '<h3>Courses: </h3>';
					echo '<p><ul>';
					$courses_taught = mysql_query('SELECT deptcode, coursenum FROM teaches WHERE profemail = "'.$email.'"');
					while($courserow = mysql_fetch_array($courses_taught)){
						echo '<li>'.$courserow[0].$courserow[1];
					}
					echo '</ul></p>';
					//echo '<p>SWAG101</p>';
					echo '<h3>Hours: </h3>';
					echo '<p>24/7</p>';
					echo '</div>';
					echo '</div>';
					//echo ''

					/*

		    	<div class="prof_content">
			    <img src="assets/images/professor.jpg" alt="prof_pic" style="width:270px;height:360px">

			    <div class="prof_text">
			    <h1>Henry Tran</h1>
			    <h3>Information: </h3>
			    <p>Peek a boo!</p>
			    <h3>Courses: </h3>
			    <p>SWAG101</p>
			    <h3>Hours: </h3>
			    <p>24/7</p>
			</div>
			</div>
			*/
			?>

		    </div>
		  </div>
		</div>

		<footer class="container-fluid text-center">
			<small>&copy; 2015 Course Navigator </small>
			<nav>
				<a href="index.html">Home</a>
				<a href="aboutus.html">About Us</a>
				<a href="contactus.html">Contact Us</a>
			</nav>
		</footer>

	</body> 

	
</html> 

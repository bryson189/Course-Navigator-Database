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
					<a href = "tutors_home.php"><button class="btn btn-default">
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

					$result = mysql_query(sprintf("SELECT fname, lname, contactphonenum, contactemail, rating, experience 
					FROM tutor WHERE contactemail = '%s' ", mysql_real_escape_string($email)));
					$row = mysql_fetch_object($result);
				?>
				
						<div class = "col-md-9	 toppad">
							<div class="panel panel-default">
								<div class="panel-heading"> Profile </div>
					
								<div class="panel-body"> 
									<div class ="row">
										<div class = "col-md-5"> 
					
					<?php
					$picture_location = mysql_result(mysql_query(sprintf("SELECT picture_location FROM tutor 
					WHERE contactemail= '%s' ", mysql_real_escape_string($email))), 0);
					?>
					
						<img src = "<?php echo $picture_location; ?> " class = "img-thumbnail" width="350" height="350"></div>
							<div class = "col-md-6">
								<table class = "table table-user-information">
									<tbody>
										<tr>
											<td class = "data-head"> Name: </td>
											<td> <?php echo $row->fname . $row->lname; ?> </td>
										</tr>
										<tr>
											<td class = "data-head"> Experience: </td>
											<td> <?php echo $row->experience; ?></td>
										</tr>
										<tr>
											<td class = "data-head"> Courses: </td>
												<?php
													$courses_taught = mysql_query(sprintf("SELECT deptcode, coursenum 
													FROM tutorteaches WHERE tutoremail = '%s'", mysql_real_escape_string($email))); 
												?>
											<td>
												<?php 
													while($courserow = mysql_fetch_object($courses_taught)){
														echo $courserow->deptcode . $courserow->coursenum .'<br>';
													}
												?>
											</td>
										</tr>

										<tr>
											<td class = "data-head"> Rating: </td>
											<td><?php echo $row->rating; ?></td> 
										</tr>

										<tr>
											<td class = "data-head"> Phone No: </td>
											<td><?php echo $row->contactphonenum; ?></td> 
										</tr>

										<tr>
											<td class = "data-head"> Email: </td>
											<td> <?php echo $row->contactemail; ?></td> 
										</tr>

									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class = "panel-footer"> 
						<a href = "mailto:<?php echo $email; ?>" type = "button" class = "btn profile-button btn-sm"> 
							<span class = "glyphicon glyphicon-envelope footer-icon"></span>
						</a>
					</div>
					</div>
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

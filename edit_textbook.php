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
		    		$db = mysql_connect("localhost","root","default");
					if(!$db){
						die("MySQL connection error. " . mysql_error());
					}
					$db_select = mysql_select_db("course_navigator", $db);
					if(!$db_select){
						die("Something went wrong with the query. " . mysql_error());
					}


					$isbn = $_GET['isbn'];




					$result = mysql_query('SELECT * FROM textbook WHERE isbn = "'.$isbn.'"', $db);
					$row = mysql_fetch_row($result);

					$authors = mysql_query('SELECT name FROM authors WHERE isbn ="'.$isbn.'"', $db);

					$retailers=mysql_query('SELECT * FROM onlineretailers WHERE isbn="'.$isbn.'"', $db);

					$courses=mysql_query('SELECT * FROM requiredtextbooks WHERE isbn="'.$isbn.'"', $db);

					?>



						<div class="col-lg-10 text-left"> 
		    		<h2> <b>Edit Textbook </b> </h2>
		    		<p>ISBN: <?php echo $isbn?><br><br><br>
		    			<h3>General Information</h3>
 				<form action = "update_textbook.php?isbn=<?php echo $isbn ?>" method = "post" class="form-horizontal">
				  <div class="form-group">
				    <label for="inputname" class="col-sm-2 control-label">Textbook Name</label>
				    <div class="col-sm-4">
				      <input type="text" name = "textbookname" class="form-control" required value="<?php echo $row[0]?>">
				    </div>
				  </div>

				  <div class="form-group">
				    <label for="inputname" class="col-sm-2 control-label">Edition Number</label>
				    <div class="col-sm-1">
				      <input type="number" min="1" name = "ednum" class="form-control" required value="<?php echo $row[2]?>">
				    </div>
				  </div>

				  <div>
				  	<h3>Author(s)</h3>
				  	<a href="deleteauthor.php?isbn=<?php echo $isbn?>">
				  	<button type="button" value = "deleteauthor" class="btn btn-default">-</button>
				  </a>
				  <a href="addauthor.php?isbn=<?php echo $isbn?>">
				  	<button type="button" value = "addauthor" class="btn btn-default">+</button>
				  </a>
				  </div>


				  <?php

				  	$numofauthors=mysql_num_rows($authors);
				  	//echo $numofauthors;
				  	for($i=0;$i<$numofauthors;$i++){
				  		$author_row=mysql_fetch_array($authors);
				  		echo 
				  		'<div class="form-group">
				    		<label for="inputname" class="col-sm-2 control-label">Author '.($i+1).'</label>
				    		<div class="col-sm-4">
				      		<input type="text" name = "author['.$i.']" class="form-control" required value="'.$author_row[0].'">
				    		</div>
				  		</div>';
				  	}

				  	echo '<h3>Online Retailers</h3>';
				  	echo '<a href="deleteretailer.php?isbn='.$isbn.'">
				  	<button type="button" value = "deleteretailer" class="btn btn-default">-</button>
				  </a>
				  <a href="addretailer.php?isbn='.$isbn.'">
				  	<button type="button" value = "addretailer" class="btn btn-default">+</button>
				  </a>';

				  	$numofretailers=mysql_num_rows($retailers);
				  	for($i=0;$i<$numofretailers;$i++){
				  		$retailers_row=mysql_fetch_array($retailers);
				  		echo 
				  		'<div class="form-group">
				    		<label for="inputname" class="col-sm-2 control-label">url '.($i+1).'</label>
				    		<div class="col-sm-4">
				      		<input type="url" name = "url['.$i.']" class="form-control" required value="'.$retailers_row[0].'">

				    		</div>
				  		</div>';

				  		echo
				  		'<div class="form-group">
				    		<label for="inputname" class="col-sm-2 control-label">price '.($i+1).'</label>
				    		<div class="col-sm-2">
				      		<input type="text" name = "price['.$i.']" class="form-control" required value="'.$retailers_row[1].'">
				    		</div>
				  		</div>';
				  	}



				  	echo '<h3>Courses</h3>';
				  	echo '<a href="deletecourse.php?isbn='.$isbn.'">
				  	<button type="button" value = "deletecourse" class="btn btn-default">-</button>
				  </a>
				  <a href="addcourse.php?isbn='.$isbn.'">
				  	<button type="button" value = "addcourse" class="btn btn-default">+</button>
				  </a>';
				  	$numofcourses=mysql_num_rows($courses);
				  	//echo $numofauthors;
				  	for($i=0;$i<$numofcourses;$i++){
				  		$course_row=mysql_fetch_array($courses);
				  		echo 
				  		'<div class="form-group">
				    		<label for="inputname" class="col-sm-2 control-label">Course '.($i+1).'</label>
				    		<div class="col-sm-2">
				      		<input type="text" name = "course['.$i.']" class="form-control" required value="'.$course_row[2].' '.$course_row[1].'">
				    		</div>
				  		</div>';
				  	}
				  ?>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				    	<button type="reset" value = "Reset" class="btn btn-default">Reset</button>
				      <button type="submit" value = "Submit" class="btn btn-default">Save</button>
				    </div>
				  </div>
				</form>  
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

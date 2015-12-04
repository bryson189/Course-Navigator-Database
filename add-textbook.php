<!DOCTYPE html>
<html>
	<head>
	  	<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
   		<link rel="stylesheet" href="css/bootstrap.css">

  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   		<script src="js/bootstrap.js"></script>

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
			      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
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
				<form action = "search.php" method = "post" class="form-horizontal">
					<input type="text" class="form-control" name="keyword" placeholder="Search">
					<button type="submit" class="btn btn-default glyphicon glyphicon-search"></button>
				</form>					
				</div>
		    </div>
		    <div class="col-lg-10 text-left"> 
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Add Textbook
</button>
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
		
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <strong> Add a textbook </strong></h4>
      </div>
      <div class="modal-body">
 				<form action = "upload-textbook-profile.php" method = "post" class="form-horizontal" enctype="multipart/form-data">
				  <div class="col-xs-6 col-md-3">
				    <a class="thumbnail">
				      <img src="assets/images/default-book.png" alt="book picture" width="200" height="200" >
				    </a>
				  </div>
				    <br> Upload a textbook picture: <br><br>
				    <input type="file" name="fileToUpload" id="fileToUpload">
				    <br><br><br><br>
				  <div class="form-group">
				    <label for="inputname" class="col-sm-2 control-label">Book Name</label>
				    <div class="col-sm-10">
					  <textarea class="form-control" name = "name" rows="2" required></textarea>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputname" class="col-sm-2 control-label">Courses </label>
				    <div class="col-sm-10">
					  <textarea class="form-control" name = "courses" rows="3"></textarea></textarea>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputname" class="col-sm-2 control-label">ISBN</label>
				    <div class="col-sm-10">
				      <input type="number" name = "isbn" class="form-control" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputname" class="col-sm-2 control-label">Edition Number</label>
				    <div class="col-sm-10">
				      <input type="number" name = "editionnum" class="form-control" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" value = "Submit" class="btn btn-primary"><strong>Submit </strong></button>
				    </div>
				  </div>
				</form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

	</body> 

	
</html> 

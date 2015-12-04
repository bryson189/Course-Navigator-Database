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
	header('Location: textbook_template.php');
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
				<form action = "search.php" method = "post" class="form-horizontal">
					<input type="text" class="form-control" name="keyword" placeholder="Search">
					<button type="submit" class="btn btn-default glyphicon glyphicon-search"></button>
				</form>					
				</div>
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




					$result = mysql_query('SELECT name, picture_location, editionnum FROM textbook WHERE isbn = "'.$isbn.'"', $db);
					$row = mysql_fetch_row($result);

					echo '<div class = "col-md-9	 toppad">
							<div class="panel panel-default">
								<div class="panel-heading"> Textbook Info </div>
					
								<div class="panel-body"> 
									<div class ="row">
										<div class = "col-md-5"> ';
					echo '<img src = "'.$row[1].'" class = "img-thumbnail" width="350" height="350"></div>';
					echo '<div class = "col-md-6">
								<table class = "table table-user-information">
									<tbody>
										<tr>
											<td class = "data-head"> Name: <td>';
					echo '<td>'.$row[0].', '.$row[2].'th edition</td>';
					echo '</tr>
										<tr>
											<td class = "data-head"> Author(s): <td>';

					$authors = mysql_query('SELECT name FROM authors WHERE isbn = "'.$isbn.'"', $db);
					echo '<td>';
					while($author_rows = mysql_fetch_array($authors)){
						echo $author_rows[0].'<br>';
					}
					echo '</td></tr>';

					echo '<tr>
							<td class = "data-head"> ISBN: <td>';

					echo '<td>'.$isbn.'</td></tr>';


					$onlineretailers = mysql_query('SELECT url, price FROM onlineretailers WHERE isbn = "'.$isbn.'"', $db);
					echo '<tr>
							<td class = "data-head"> Online Retailers: <td>';
					echo '<td>';
					$count=1;
					while($retailer_rows = mysql_fetch_array($onlineretailers)){
			
						echo '<a href="'.$retailer_rows[0].'">Link '.$count.': $'.$retailer_rows[1].'</a><br>';
						$count++;
					}
					//echo 'test';
					echo'</td> </tr>';


					echo '<tr>
							<td class = "data-head"> Course(s): <td>';
					echo '<td>';
					$courses = mysql_query('SELECT deptcode, coursenum FROM requiredtextbooks WHERE isbn = "'.$isbn.'"', $db);
					while($course_rows = mysql_fetch_array($courses)){
						echo $course_rows[0].' '.$course_rows[1].'<br>';
					}
					//echo 'test';
					echo'</td> </tr>';


					echo '</tbody></table></div></div></div>';
					echo '<div class = "panel-footer" id="textbook-template-bottom"> 
			
						<div class = "pull-right">
							<a href = "edit_textbook.php?isbn='.$isbn.'" type = "button" class = "btn profile-button btn-sm">
								<span class = "glyphicon glyphicon-edit footer-icon"> </span>
							</a>
							<a href = "delete_textbook.php?isbn='.$isbn.'" type = "button" class = "btn profile-button btn-sm">
								<span class = "glyphicon glyphicon-remove footer-icon"> </span>
							</a>
						</div>
					</div>
				</div>
			</div>';


				mysql_close();

		    	?>


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

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
			      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
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
					<input type="text" class="form-control" placeholder="Search">
					<button type="submit" class="btn btn-default glyphicon glyphicon-search"></button>
				</div>
				</form>
		    </div>
		    <div class="col-lg-10 text-left"> 

			    <h1>Tutors</h1>
				
			    <?php 
					$db = @mysql_connect("localhost","root","default");
					if(!$db){
						die("MySQL connection error. " . mysql_error());
					}
					$db_select = mysql_select_db("course_navigator", $db);
					if(!$db_select){
						die("Error connecting to database. " . mysql_error());
					}

					$result = mysql_query("SELECT fname, lname, contactemail FROM tutor ORDER BY lname", $db);
					if(!$result){
						die("Something went wrong with the query. " . mysql_error());
					}
	
					$starts_a = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'A%'");
					$starts_b = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'B%'");
					$starts_c = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'C%'");
					$starts_d = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'D%'");
					$starts_e = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'E%'");
					$starts_f = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'F%'");
					$starts_g = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'G%'");
					$starts_h = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'H%'");
					$starts_i = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'I%'");
					$starts_j = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'J%'");
					$starts_k = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'K%'");
					$starts_l = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'L%'");
					$starts_m = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'M%'");
					$starts_n = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'N%'");
					$starts_o = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'O%'");
					$starts_p = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'P%'");
					$starts_q = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'Q%'");
					$starts_r = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'R%'");
					$starts_s = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'S%'");
					$starts_t = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'T%'");
					$starts_u = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'U%'");
					$starts_v = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'V%'");
					$starts_w = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'W%'");
					$starts_x = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'X%'");
					$starts_y = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'Y%'");
					$starts_z = mysql_query("SELECT fname, lname, contactemail FROM tutor WHERE lname LIKE 'Z%'");
					
					function generateEntries($letter)
				{
					while($row = mysql_fetch_array($letter)) {
						echo '<li><a href = "tutor_profile.php?email='.$row[2].'">'.$row[1].", ".$row[0]."</a></li>";
					}
				}
				
				?>
				&nbsp&nbsp<a href="#B_anchor">B</a>&nbsp&nbsp
				&nbsp&nbsp<a href="#B_anchor">B</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#C_anchor">C</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#D_anchor">D</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#E_anchor">E</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#F_anchor">F</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#G_anchor">G</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#H_anchor">H</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#I_anchor">I</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#J_anchor">J</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#K_anchor">K</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#L_anchor">L</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#M_anchor">M</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#N_anchor">N</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#O_anchor">O</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#P_anchor">P</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#Q_anchor">Q</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#R_anchor">R</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#S_anchor">S</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#T_anchor">T</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#U_anchor">U</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#V_anchor">V</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#W_anchor">W</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#X_anchor">X</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#Y_anchor">Y</a>&nbsp&nbsp
			    &nbsp&nbsp<a href="#Z_anchor">Z</a>&nbsp&nbsp
				
				
			    <div class="tutor_list">
			    	<a name="A_anchor"></a>
					<h3> A </h3>
					<ul>
					<?php generateEntries($starts_a); ?>
					</ul>
					
					<a name="B_anchor"></a>
					<h3> B </h3>
					<ul>
					<?php generateEntries($starts_b); ?>
					</ul>
					
					<a name="C_anchor"></a>
					<h3> C </h3>
					<ul>
					<?php generateEntries($starts_c); ?>
					</ul>
					
					<a name="D_anchor"></a>
					<h3> D </h3>
					<ul>
					<?php generateEntries($starts_d); ?>
					</ul>
					
					<a name="E_anchor"></a>
					<h3> E </h3>
					<ul>
					<?php generateEntries($starts_e); ?>
					</ul>
					
					<a name="F_anchor"></a>
					<h3> F </h3>
					<ul>
					<?php generateEntries($starts_f); ?>
					</ul>
					
					<a name="G_anchor"></a>
					<h3> G </h3>
					<ul>
					<?php generateEntries($starts_g); ?>
					</ul>
					
					<a name="H_anchor"></a>
					<h3> H </h3>
					<ul>
					<?php generateEntries($starts_h); ?>
					</ul>
					
					<a name="I_anchor"></a>
					<h3> I </h3>
					<ul>
					<?php generateEntries($starts_i); ?>
					</ul>
					
					<a name="J_anchor"></a>
					<h3> J </h3>
					<ul>
					<?php generateEntries($starts_j); ?>
					</ul>
					
					<a name="K_anchor"></a>
					<h3> K </h3>
					<ul>
					<?php generateEntries($starts_k); ?>
					</ul>
					
					<a name="L_anchor"></a>
					<h3> L </h3>
					<ul>
					<?php generateEntries($starts_l); ?>
					</ul>
					
					<a name="M_anchor"></a>
					<h3> M </h3>
					<ul>
					<?php generateEntries($starts_m); ?>
					</ul>

					<a name="N_anchor"></a>
					<h3> N </h3>
					<ul>
					<?php generateEntries($starts_n); ?>
					</ul>
					
					<a name="O_anchor"></a>
					<h3> O </h3>
					<ul>
					<?php generateEntries($starts_o); ?>
					</ul>
					
					<a name="P_anchor"></a>
					<h3> P </h3>
					<ul>
					<?php generateEntries($starts_p); ?>
					</ul>
					
					<a name="Q_anchor"></a>
					<h3> Q </h3>
					<ul>
					<?php generateEntries($starts_q); ?>
					</ul>
					
					<a name="R_anchor"></a>
					<h3> R </h3>
					<ul>
					<?php generateEntries($starts_r); ?>
					</ul>
					
					<a name="S_anchor"></a>
					<h3> S </h3>
					<ul>
					<?php generateEntries($starts_s); ?>
					</ul>
					
					<a name="T_anchor"></a>
					<h3> T </h3>
					<ul>
					<?php generateEntries($starts_t); ?>
					</ul>
					
					<a name="U_anchor"></a>
					<h3> U </h3>
					<ul>
					<?php generateEntries($starts_u); ?>
					</ul>
					
					<a name="V_anchor"></a>
					<h3> V </h3>
					<ul>
					<?php generateEntries($starts_v); ?>
					</ul>
					
					<a name="W_anchor"></a>
					<h3> W </h3>
					<ul>
					<?php generateEntries($starts_w); ?>
					</ul>
					
					<a name="X_anchor"></a>
					<h3> X </h3>
					<ul>
					<?php generateEntries($starts_x); ?>
					</ul>
					
					<a name="Y_anchor"></a>
					<h3> Y </h3>
					<ul>
					<?php generateEntries($starts_y); ?>
					</ul>
					
					<a name="Z_anchor"></a>
					<h3> Z </h3>
					<ul>
					<?php generateEntries($starts_z); ?>
					</ul>
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

<?php
	
?>


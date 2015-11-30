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
					<a href = "courses.html"><button  class="btn btn-default">
						<span class="glyphicon glyphicon-education"></span> Courses</button></a>
					<a href = "professors.php"><button class="btn btn-default">
						<span class="glyphicon glyphicon-user" ></span> Professors</button></a>
					<a href = "textbook.php"><button class="btn btn-default">
						<span class="glyphicon glyphicon-book" ></span> Textbooks</button></a>
					<a href = "tutors.html"><button class="btn btn-default">
						<span class="glyphicon glyphicon-blackboard" ></span> Tutors</button></a>
				</div>
				<div class="side-search">
					<input type="text" class="form-control" placeholder="Search">
					<button type="submit" class="btn btn-default glyphicon glyphicon-search"></button>
				</div>
				</form>
		    </div>
		    <div class="col-lg-10 text-left"> 

			    <h1>Professors</h1>
			    
			    <!--
			    <a href="#A_anchor">A</a>
			    <a href="#B_anchor">B</a>
			    <a href="#C_anchor">C</a>
			    <a href="#D_anchor">D</a>
			    <a href="#E_anchor">E</a>
			    <a href="#F_anchor">F</a>
			    <a href="#G_anchor">G</a>
			    <a href="#H_anchor">H</a>
			    <a href="#I_anchor">I</a>
			    <a href="#J_anchor">J</a>
			    <a href="#K_anchor">K</a>
			    <a href="#L_anchor">L</a>
			    <a href="#M_anchor">M</a>
			    <a href="#N_anchor">N</a>
			    <a href="#O_anchor">O</a>
			    <a href="#P_anchor">P</a>
			    <a href="#Q_anchor">Q</a>
			    <a href="#R_anchor">R</a>
			    <a href="#S_anchor">S</a>
			    <a href="#T_anchor">T</a>
			    <a href="#U_anchor">U</a>
			    <a href="#V_anchor">V</a>
			    <a href="#W_anchor">W</a>
			    <a href="#X_anchor">X</a>
			    <a href="#Y_anchor">Y</a>
			    <a href="#Z_anchor">Z</a>
			    //-->
			

			    <?php 
					$db = mysql_connect("localhost","root","default");
					if(!$db){
						die("MySQL connection error. " . mysql_error());
					}
					$db_select = mysql_select_db("course_navigator", $db);
					if(!$db_select){
						die("Error connecting to database. " . mysql_error());
					}

					$result = mysql_query("SELECT fname, lname, email FROM professor ORDER BY lname", $db);
					if(!$result){
						die("Something went wrong with the query. " . mysql_error());
					}

					echo "<ul>";
					while($row = mysql_fetch_array($result)){
						echo '<li><a href="professor_template.php?email='.$row[2].'">'.$row[1].", ".$row[0]."</a></li>";
					}
					echo "</ul>";
			    ?>

			    
			    <!--
			    <div class="prof_list">
			    	<a name="A_anchor"></a>
			    	<h3>A</h3>
			    	<ul>
			    		<li>test</li>
			    		
			    		<li>test</li>
			    	</ul>

			    	<a name="B_anchor"></a>
			    	<h3>B</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="C_anchor"></a>
			    	<h3>C</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="D_anchor"></a>
			    	<h3>D</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="E_anchor"></a>
			    	<h3>E</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="F_anchor"></a>
			    	<h3>F</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="G_anchor"></a>
			    	<h3>G</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="H_anchor"></a>
			    	<h3>H</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="I_anchor"></a>
			    	<h3>I</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="J_anchor"></a>
			    	<h3>J</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="K_anchor"></a>
			    	<h3>K</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="L_anchor"></a>
			    	<h3>L</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="M_anchor"></a>
			    	<h3>M</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="N_anchor"></a>
			    	<h3>N</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="O_anchor"></a>
			    	<h3>O</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="P_anchor"></a>
			    	<h3>P</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="Q_anchor"></a>
			    	<h3>Q</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="R_anchor"></a>
			    	<h3>R</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="S_anchor"></a>
			    	<h3>S</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="T_anchor"></a>
			    	<h3>T</h3>
			    	<ul>
			    		<li><a href="professor_template.html">Tran, Henry</a></li>
			    		<li>test</li>
			    	</ul>

			    	<a name="U_anchor"></a>
			    	<h3>U</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="V_anchor"></a>
			    	<h3>V</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="W_anchor"></a>
			    	<h3>W</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="X_anchor"></a>
			    	<h3>X</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name="Y_anchor"></a>
			    	<h3>Y</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    	<a name ="Z_anchor"></a>
			    	<h3>Z</h3>
			    	<ul>
			    		<li>test</li>
			    		<li>test</li>
			    	</ul>

			    



			    </div>

			    //-->
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

<?php
	
?>


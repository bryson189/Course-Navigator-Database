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
			    <h1>Textbooks</h1>

			    <?php 
					$db = mysql_connect("localhost","root","default");
					if(!$db){
						die("MySQL connection error. " . mysql_error());
					}
					$db_select = mysql_select_db("course_navigator", $db);
					if(!$db_select){
						die("Error connecting to database. " . mysql_error());
					}

					$result = mysql_query("SELECT name, editionnum FROM textbook ORDER BY name", $db);
					if(!$result){
						die("Something went wrong with the query. " . mysql_error());
					}

					/*

					echo "<ul>";
					while($row = mysql_fetch_array($result)){
						echo '<li><a href="textbook_template.php">'.$row[0].", ".$row[1]."th ed</a></li>";
					}
					echo "</ul>";
					*/

					$starts_a = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'A%'");
					$starts_b = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'B%'");
					$starts_c = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'C%'");
					$starts_d = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'D%'");
					$starts_e = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'E%'");
					$starts_f = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'F%'");
					$starts_g = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'G%'");
					$starts_h = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'H%'");
					$starts_i = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'I%'");
					$starts_j = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'J%'");
					$starts_k = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'K%'");
					$starts_l = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'L%'");
					$starts_m = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'M%'");
					$starts_n = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'N%'");
					$starts_o = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'O%'");
					$starts_p = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'P%'");
					$starts_q = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'Q%'");
					$starts_r = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'R%'");
					$starts_s = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'S%'");
					$starts_t = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'T%'");
					$starts_u = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'U%'");
					$starts_v = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'V%'");
					$starts_w = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'W%'");
					$starts_x = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'X%'");
					$starts_y = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'Y%'");
					$starts_z = mysql_query("SELECT name, editionnum, isbn FROM textbook WHERE name LIKE 'Z%'");

					echo '&nbsp&nbsp<a href="#A_anchor">A</a>&nbsp&nbsp
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
			    			&nbsp&nbsp<a href="#Z_anchor">Z</a>&nbsp&nbsp';






			    echo "<br><br>
			    <button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#myModal'> 
			    Add Textbook </button>";

			    	echo '<div class="prof_list">
			    			<a name="A_anchor"></a>
			    			<h3>A</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_a)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';



			    	echo '<a name="B_anchor"></a>
			    			<h3>B</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_b)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';

			    	echo '<a name="C_anchor"></a>
			    			<h3>C</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_c)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';

			    	echo '<a name="D_anchor"></a>
			    			<h3>D</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_d)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';

			    	echo '<a name="E_anchor"></a>
			    			<h3>E</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_e)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';

					echo '<a name="F_anchor"></a>
			    			<h3>F</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_f)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';

			    	echo '<a name="G_anchor"></a>
			    			<h3>G</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_g)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';

			    	echo '<a name="H_anchor"></a>
			    			<h3>H</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_h)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';

			    	echo '<a name="I_anchor"></a>
			    			<h3>I</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_i)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';


			    	echo '<a name="J_anchor"></a>
			    			<h3>J</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_j)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';


			    	echo '<a name="K_anchor"></a>
			    			<h3>K</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_k)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';

			    	echo '<a name="L_anchor"></a>
			    			<h3>L</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_l)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';

			    	echo '<a name="M_anchor"></a>
			    			<h3>M</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_m)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';

			    	echo '<a name="N_anchor"></a>
			    			<h3>N</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_n)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';


			    	echo '<a name="O_anchor"></a>
			    			<h3>O</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_o)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';


			    	echo '<a name="P_anchor"></a>
			    			<h3>P</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_p)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';


			    	echo '<a name="Q_anchor"></a>
			    			<h3>Q</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_q)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';


			    	echo '<a name="R_anchor"></a>
			    			<h3>R</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_r)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';


			    	echo '<a name="S_anchor"></a>
			    			<h3>S</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_s)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';


			    	echo '<a name="T_anchor"></a>
			    			<h3>T</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_t)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';


			    	echo '<a name="U_anchor"></a>
			    			<h3>U</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_u)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';

			    	echo '<a name="V_anchor"></a>
			    			<h3>V</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_v)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';


			    	echo '<a name="W_anchor"></a>
			    			<h3>W</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_w)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';

			    	echo '<a name="X_anchor"></a>
			    			<h3>X</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_x)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';

			    	echo '<a name="Y_anchor"></a>
			    			<h3>Y</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_y)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul>';

			    	echo '<a name="Z_anchor"></a>
			    			<h3>Z</h3>
			    			<ul>';
			    	while($row = mysql_fetch_array($starts_z)){
						echo '<li><a href="textbook_template.php?isbn='.$row[2].'">'.$row[0].", ".$row[1]."th ed"."</a></li>";
					}
			    	echo '</ul></div>';


			    ?>
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
	      			<input type="tel" name = "isbn" pattern=".{14,}" required title="This should be 14 characters long (Separated by '-')" class="form-control" required>
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

<?php
	mysql_close();
?>


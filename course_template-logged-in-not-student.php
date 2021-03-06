
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
            <h1><img src="/assets/images/title.jpg" style="width:345px;height:60px;"></</h1>
        </header>

    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="account-settings.php"><span class="glyphicon glyphicon-user"></span> Settings </a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
          <a class="navbar-brand" href="#"> <img src="/assets/images/logo.jpg" style="width:30px;height:30px;">  </a></a>
                 <!-- <img alt="Brand" src="assets/images/asd.jpg">-->
        <ul class="nav navbar-nav banner-home">
            <li class="active"><a href="logged-in-home.php">Home</a></li>
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

                <?php
                    $db = mysql_connect("localhost","root","default");
                    if(!$db){
                        die("MySQL connection error. " . mysql_error());
                    }
                    $db_select = mysql_select_db("course_navigator", $db);
                    if(!$db_select){
                        die("Something went wrong with the query. " . mysql_error());
                    }


                    $course = $_GET['course'];
                    $split=explode('-',$course);
                    $deptcode=$split[0];
                    $coursenum=$split[1];



                    $result = mysql_query("SELECT name, description  FROM course WHERE deptcode='$deptcode' AND coursenum = '$coursenum'", $db);
                    $row = mysql_fetch_row($result);
                    //echo $row[0];


                    echo '<div class = "col-md-9     toppad">
                            <div class="panel panel-default">
                                <div class="panel-heading"> Course Information</div>

                                <div class="panel-body">
                                    <div class ="row">
                                        <div class = "col-md-5"> ';


                    echo '<img src = "assets/images/course.jpg" class = "img-thumbnail" width="350" height="350"></div>';
                    echo '<div class = "col-md-6">
                                <table class = "table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td class = "data-head"> Course Code: <td>';
                    echo '<td>'.$deptcode.' '.$coursenum.'</td>';
                    echo '</tr>
                                        <tr>
                                            <td class = "data-head"> Course Name: <td>';
                    echo '<td>'.$row[0].'</td></tr>';
                    echo '<tr>
                                            <td class = "data-head"> Description: <td>';

                    echo '<td>'.$row[1].'</td>';


                    echo '</td></tr>';


                    $rating_avg=mysql_query("SELECT AVG(rating) FROM courserating WHERE deptcode='$deptcode' AND coursenum='$coursenum'");
                    $avg=mysql_result($rating_avg,0);
                    echo '<tr>
                            <td class = "data-head"> Rating: <td>
                            <td>'.$avg.'/5</td>





                        </tr>';

                    $textbooks=mysql_query("SELECT textbookname, isbn FROM requiredtextbooks WHERE coursenum='$coursenum' AND deptcode='$deptcode'",$db);

                    echo '<tr>
                        <td class = "data-head"> Required Textbooks: <td>
                      <td>';


                      while($textbook_row=mysql_fetch_array($textbooks)){
                        $string .= $textbook_row[0].' ISBN: '.$textbook_row[1];
                        echo $string."<br>";
                      }


                    echo    '</td>
                        </tr>';

                        $profemails=mysql_query("SELECT profemail FROM teaches WHERE coursenum='$coursenum' AND deptcode='$deptcode'", $db);




                    echo '<tr>
                            <td class = "data-head"> Taught By: <td>
                            <td>';

                            while($prof_row=mysql_fetch_row($profemails)){
                              $profname=mysql_query("SELECT fname, lname FROM professor WHERE email='$prof_row[0]'");
                              $fandlname=mysql_fetch_row($profname);
                              echo $fandlname[0].' '.$fandlname[1].'<br>';
                            }

                       $profnames=mysql_query("SELECT fname,lname FROM professor WHERE email='$prof_row[0]'");
                       $prof_name=mysql_fetch_row($profnames);


                            echo '</td>
                        </tr>';

                    echo '</tbody></table></div></div></div>';




          echo '<div class = "panel-footer" id="textbook-template-bottom">


          </div>
        </div>
      </div>';
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

    </body>


</html>

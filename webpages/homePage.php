<?php session_start(); ?> 
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="UTF-8">
    <title>Home Page</title>
      <link rel="stylesheet" type="text/css" href="homePage.css">
  </head>
  <script type="text/javascript">
  	function a(){
        alert("Ask Megan If We Need To Get Rid Of This");
    }
  </script>
  <body>
    <div id = "header">
        <form action="/~sg8/447/about.html">       	
        	<center><input id = "about" type="submit" value="About"></input></center>
        </form>
        <form action="/~sg8/447/tutorial.html">       	
        	<center><input id = "tutorial" type="submit" value="Tutorial"></input></center>
        </form>
        <button id = "watch" onclick="a()">Watch-Button Being Removed?</button>
        <!--
        <form action="/~sg8/447/login.html">       	
        	<center><input id = "logIn" type="submit" value="LogIn"></input></center>	
        	-->
        </form>
        <div id = "login">
        <?php
          $username = $_SESSION['email'];
          echo(" <p id = 'watch'> Welcome: " . $username . "</p>");
        ?>
          
        </div>
    </div>
    <div id = "middle">
        <ul>
            <center><li><p id = "arduino">Arduino Academy</p></li></center>
            <form action="/~sg8/447/startNow.php">       	
	        	<center><input id = "about" type="submit" value="Start Now!"></input></center>
	        </form>
	        <br>
            <form action="/~sg8/447/reservation.php">       	
	        	<center><input id = "about" type="submit" value="Schedule A Timeslot"></input></center>
	        </form>
        </ul>
    </div>
  </body>
</html>
<?php session_start(); ?> 
<!DOCTYPE html>
<html>
<head> 
	<meta charset="UTF-8">
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="common.css">
	<link rel="stylesheet" type="text/css" href="homePage.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<script type="text/javascript">
function watch(){
	//alert("Get Megan to give you new stream link");
	window.location = "https://www.youtube.com/c/MeganZimmerman1/live";
}
function about(){
	window.location = "https://github.com/teamjuan/447-Public-Arduino/blob/master/README.md";
}
function tutorial(){
	window.location = "https://www.arduino.cc/en/Tutorial/HomePage";
}
function homepage(){
	window.location = "http://userpages.umbc.edu/~sg8/447/homePage.php";
}
function start(){
	window.location = "http://userpages.umbc.edu/~sg8/447/ide.php";
}
function reservation(){
	window.location = "http://userpages.umbc.edu/~sg8/447/reservation.php";
}
</script>
<body>
	<div id = "header">
		<i id = "icon" onclick="homepage()" class="material-icons" style="font-size:32px; color:#ff751a;">home</i>
		<button id = "about" onclick="about()">About</button>
		<button id = "tutorial" onclick="tutorial()">Tutorials</button>
		<button id = "watch" onclick="watch()">Watch</button>
		<?php
		$username = $_SESSION['email'];
		echo(" <button id = 'logIn'> Welcome: " . $username . "</button>");
		?>
	</div>
	<div id = "middle">
	    <ul>
	        <li><p id = "arduino">Arduino Academy</p></li>
	        <li><button id = "start" onclick="start()">Start Now!</button></li>
	        <br><br>
	        <li><button id = "timeSlot" onclick="reservation()">Schedule a timeslot</button></li>
	    </ul>
	</div>
</body>
</html>
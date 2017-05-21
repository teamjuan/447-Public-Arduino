<?php session_start(); ?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Reserve Code</title>
	<link rel="stylesheet" type="text/css" href="homePage.css">
</head>
<body>
<!--
<div id = "header">
	<button id = "about">About</button>
	<button id = "tutorial">Tutorials</button>
	<button id = "watch">Watch</button>
	<button id = "logIn">Log In</button>
</div>
-->
<?php
	//echo var_dump($_POST);  echo "<br><br>";

	$keys = array_keys($_POST);
	$first = $keys[0];
	$format = explode("#", $first);
	$time = $format[0];
	$day = $format[1];
	$date = $format[2];
	//$date = trim($date, ",");
	$date = str_replace("_", " ", $date);
	$dt_for_db = gmdate("Y-m-d H:i:s", strtotime($date));
	//$date = explode("_", $date);
	//$dt_obj = new DateTime($date);
	//echo("Date: " . $dt_for_db);  echo "<br><br>";
	/*
	
	$time = $_POST[$first];
	$time = substr($time, 0, 2);
	$time = trim($time, ":");

	echo("Date: " . $date);  echo "<br><br>";
	echo("Time: " . $time);  echo "<br><br>";

	$datetime = $date . "#" . $time;
	echo("Datetime: " . $datetime);  echo "<br><br>";
	//*/
	$username = $_SESSION['email'];
	///*
	include ('CommonMethods.php');
	$debug = false;
    $COMMON = new Common($debug);

    $sql = "UPDATE  `jalfano1`.`Users` 
    		SET `time` = '" . $dt_for_db . "' 
    		WHERE `Users`.`email` = '" . $username . "';";

    $rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

    echo '<script language="javascript">';
    echo 'alert("Thank you for reserving your time slot on ' . $dt_for_db . '")';
    echo '</script>';
	//*/
    echo( "<meta http-equiv='refresh' content='0; url=http://userpages.umbc.edu/~sg8/447/homePage.php'> " );
	
	/*
	echo( "<form action='/~sg8/447/homePage.php'>       	
		<input id = 'about' type='submit' value='Click me to go back to homePage'></input>	
	</form> ");
	*/
	?>
</body>
</html>




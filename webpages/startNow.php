<?php session_start(); ?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Start Now</title>
	<link rel="stylesheet" type="text/css" href="homePage.css">
</head>
<body>
	<div id = "header">
		<button id = "about">About</button>
		<button id = "tutorial">Tutorials</button>
		<button id = "watch">Watch</button>	
		<?php
		$username = $_SESSION['email'];

	    echo("<meta http-equiv='refresh' content='0; url=http://userpages.umbc.edu/~sg8/447/ide.php'> ");

	    /*

	    include ('CommonMethods.php');
		$debug = true;
	    $COMMON = new Common($debug);

	    $sql = "SELECT * FROM `jalfano1`.`Users` 
	    		WHERE `Users`.`email` = 'MUTEX';";

	    $rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
	    $row = mysql_fetch_row($rs);

	    if( is_null($time) ){
	    	"UPDATE  `jalfano1`.`Users` 
	    		SET `time` = '" . $time . "' 
	    		WHERE `Users`.`email` = 'MUTEX';";

	    	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

	    	echo("<meta http-equiv='refresh' content='0; url=http://userpages.umbc.edu/~sg8/447/ide.php'> ");
	    	echo("you can never get me la la la");  echo("<br><br>");
	    }
		*/
		echo(" <button id = 'watch'> Welcome: " . $username . "</button>");
		?>

	<center><iframe src="http://free.timeanddate.com/clock/i5opsk13/n419/fs28/tt0/td2/th2/tb4" frameborder="0" width="417" height="66"></iframe></center>
	<center><h1> This is a simulation of the Countdown.
		I'll have to add functionaility once reservation system is in place</h1></center>

		<form action="/~sg8/447/homePage.php">       	
			<input id = "about" type="submit" value="Click me to go back to homePage"></input>	
		</form>
</body>
</html>
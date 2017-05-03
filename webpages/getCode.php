<?php session_start(); ?>  

<?php
	$username = $_SESSION['email'];
	include ('CommonMethods.php');
	$debug = false;
	$COMMON = new Common($debug);
	
	
	$sql = "SELECT * FROM `jalfano1`.`Users` WHERE `email` = 'MUTEX'  ";

	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

	$row = mysql_fetch_row($rs);

	echo $row[3];

	#echo("<meta http-equiv='refresh' content='0; url=http://userpages.umbc.edu/~sg8/447/ide.php'> " );

?> 

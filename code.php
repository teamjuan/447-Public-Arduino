<?php session_start(); ?>  

<?php

	$username = $_SESSION['email'];

	include ('CommonMethods.php');
	$debug = false;
	$COMMON = new Common($debug);
	
 
	$code = $_POST["codeHolder"]; 
	//echo $code; echo("<br><br>"); 
	
	$sql = "UPDATE  `jalfano1`.`Users` 
    		SET `code` = '" . $code . "' 
    		WHERE `Users`.`email` = '" . $username . "';";
	
	//echo $sql;
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);



	$sql = "UPDATE  `jalfano1`.`Users` 
    		SET `code` = '" . $code . "' 
    		WHERE `Users`.`email` = 'MUTEX';";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

	echo("<meta http-equiv='refresh' content='0; url=http://userpages.umbc.edu/~sg8/447/ide.php'> " );

	/*
	echo( " <br><br> <form action='/~sg8/447/homePage.html'>       	
    	<input id = 'about' type='submit' value='Click me to go back to homePage'></input>	
    </form> ");
    */
?>
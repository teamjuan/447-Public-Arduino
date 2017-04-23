<?php session_start(); ?> 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Reserve Code</title>
      <link rel="stylesheet" type="text/css" href="homePage.css">
  </head>
  <body>
    <div id = "header">
        <button id = "about">About</button>
        <button id = "tutorial">Tutorials</button>
        <button id = "watch">Watch</button>
        <button id = "logIn">Log In</button>
    </div>
  	<?php
  		echo var_dump($_POST);
  		echo "<br>";
  		
  		/*
		foreach( $_POST as $stuff ) {
		    if( is_array( $stuff ) ) {
		        foreach( $stuff as $thing ) {
		            echo $thing;
		        }
		    } else {
		        echo $stuff;
		    }
		}//*/
		$keys = array_keys($_POST);
  		$first = $keys[0];
  		echo("Key: " . $first);
  		echo "<br>";
		echo("Value: " . $_POST[$first]);
		echo "<br>";

		echo( "<form action='/~sg8/447/homePage.html'>       	
	    	<input id = 'about' type='submit' value='Click me to go back to homePage'></input>	
	    </form> ");
	?>
  </body>
</html>




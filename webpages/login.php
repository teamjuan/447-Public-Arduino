<?php session_start(); ?> 
<html>
  <head>
    <meta charset="UTF-8">
    <title>Arduino</title>
      <link rel="stylesheet" type="text/css" href="homePage.css">
  </head>
  <body>
    <div id = "header">
        <button id = "about">About</button>
        <button id = "tutorial">Tutorials</button>
        <button id = "watch">Watch-Button Being Removed?</button>
    </div>
    <?php
    /*
    foreach($_POST as $key=>$post_data){
        echo "You posted:" . $key . " = " . $post_data . "<br>";
    }
    */
	$username = $_POST['email'];   // was name tfFname on HTML FORM!!!
	$password = $_POST['psw'];   // was name tfLname on HTML FORM!!!

	$_SESSION['email'] = $username;
	$_SESSION['psw'] = $password;
    $specialLogin = false;
    #$funLogin = array("SAHSA", "JUAN");
    $funLogin = array(
        "SASHA" => "//2.bp.blogspot.com/-aZdbCEiRZFQ/UZ4O3uN1ssI/AAAAAAAAO0E/YAXbewrqN1w/s1600/1920x1080-red-rose-desktop-wallpaper-55623759244.jpg",
        "JUAN" => "//www.nyan.cat"
        );
    
	echo("<font size = '20'><span class='rainbow'> thank you for logging in: " . $username . "<br></span></font>");

    $username = strtoupper($username);
    if( array_key_exists($username, $funLogin) ){
        $url = $funLogin[$username];
        $specialLogin = true;
    }
    if( $specialLogin == true){
        echo( "Success!!!!!!!1!<br>");
        for( $i = 3; $i >= 1; $i--){
            echo("Redirection in: " . $i . "...<br>");
            sleep(1);
        }
        echo( "<meta http-equiv='refresh' content='0; url=" . $url . "' /> "); 
    }

    /*
    include ('CommonMethods.php');

    $debug = true;
    $COMMON = new Common($debug);

    //Get the list of days of the weak and print them 
    $sql = "SELECT * FROM `Users`  ";

    $rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

    while( $row = mysql_fetch_row($rs) ){

        if( $row[1] == $username && $row[2] == $password){
            echo( "Success!!!!!!!1!");
            for( $i = 3; $i >= 1; $i++){
                echo("Redirection in: " . $i . "...");
            }
            sleep(1);
        }
        echo( "<option value=". $row[1] ." >". $row[1] ." </option>" );
        
    }
    */
	session_write_close();
	?>
    <form action="/~sg8/447/homePage.html">         
        <input id = "about" type="submit" value="Click me to go back to homePage"></input> 
    </form>
     <form action="/~sg8/447/login.html">         
        <input id = "about" type="submit" value="Click me to Log In Again (TEST)"></input> 
    </form>
    <!--
    <div id = "middle">
        <ul>
            <form action="/~sg8/447/homePage.html">         
                <input id = "return" type="submit" value="Click me to go back to homePage"></input> 
            </form>
            <li><p id = "arduino">Arduino Academy</p></li>
            <li><button id = "start">Start Now!</button></li>
            <li><button id = "timeSlot">Schedule a timeslot</button></li>
        </ul>
    </div>
    -->
  </body>
</html>
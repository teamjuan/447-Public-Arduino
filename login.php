<?php session_start(); ?> 
<html>
  <head>
    <meta charset="UTF-8">
    <title>Arduino</title>
      <link rel="stylesheet" type="text/css" href="homePage.css">
  </head>
  <body>
    <?php
    /*
    foreach($_POST as $key=>$post_data){
        echo "You posted:" . $key . " = " . $post_data . "<br>";
    }
    */
	$username = $_POST['email'];   // was name tfFname on HTML FORM!!!
	$password = $_POST['pass'];   // was name tfLname on HTML FORM!!!

	$_SESSION['email'] = strtoupper($username);
	$_SESSION['pass'] = $password;
    $specialLogin = false;
    $funLogin = array(
        "SASHA" => "//2.bp.blogspot.com/-aZdbCEiRZFQ/UZ4O3uN1ssI/AAAAAAAAO0E/YAXbewrqN1w/s1600/1920x1080-red-rose-desktop-wallpaper-55623759244.jpg",
        "JUAN" => "//www.nyan.cat"
        );
     
	//echo("<font size = '20'><span class='rainbow'> thank you for logging in: " . $username . "<br></span></font>");

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
        //sleep(3);
    }

    include ('CommonMethods.php');

    $debug = false;
    $COMMON = new Common($debug);
    // and `password` = '" . $password . "'
    $sql = "SELECT * FROM `jalfano1`.`Users` WHERE 
        `email` = '" . $username . "';"  ;

    $rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
    $row = mysql_fetch_row($rs);

    // Account doesn't exist
    if( mysql_num_rows($rs) == 0){
        $sql = "INSERT INTO  `jalfano1`.`Users` (
            `email` ,
            `password`
            )
            VALUES (
            '" . $username . "', '" . $password . "');" ;

        $rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

        echo '<script language="javascript">';
        echo 'alert("Welcome New User")';
        echo '</script>';
        echo( " <meta http-equiv='refresh' content='0; url=http://userpages.umbc.edu/~sg8/447/homePage.php'> " );
    }
    // Wrong password
    else if( mysql_num_rows($rs) != 0 and $row[1] != $password){
        echo '<script language="javascript">';
        echo 'alert("Wrong password. Please try again")';
        echo '</script>';
        echo(" <meta http-equiv='refresh' content='0; url=http://userpages.umbc.edu/~sg8/447/login.html'> " );
    }
    // Account exists
    else{
        echo '<script language="javascript">';
        echo 'alert("Thank you logging in. Please procede")';
        echo '</script>';
        echo( " <meta http-equiv='refresh' content='0; url=http://userpages.umbc.edu/~sg8/447/homePage.php'> " );
        //echo("nada");
    }

	?>
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
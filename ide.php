<?php session_start(); ?> 

<!-- NEED TO HAVE https://ace.c9.io/ MASTER BUILD IN SAME FOLDER-->

<html lang="en">
<head>
    <title>IDE</title>
    <link rel="stylesheet" type="text/css" href="common.css">
    <link rel="stylesheet" type="text/css" href="start.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style type="text/css" media="screen">
    #editor { 
        height: 100%;
        width: 100%;
    }
</style>
<script type="text/javascript">
    function setCode(){
        elem = editor.getValue();
        //alert(elem.textContent);
    }
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
    function error(){
        window.location = "http://userpages.umbc.edu/~zimmer1/errors1.html";
    }
    function sample(){
        window.location = "http://userpages.umbc.edu/~zimmer1/samples.html";
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

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
        <p id = "arduino">Arduino Academy</p> 
    </div>

    <div id = "codeArea">
        <div id = "code">
<div id="editor"><?php
                $username = $_SESSION['email'];
                include ('CommonMethods.php');
                $debug = false;
                $COMMON = new Common($debug);
                
                
                $sql = "SELECT * FROM `jalfano1`.`Users` WHERE `email` = '" . $username . "'  ";

                $rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

                $row = mysql_fetch_row($rs);
                $code = $row[3];

    if( is_null($code)){
    echo('void main(){

    printf("hello world");
    
}');
    }
                else{
echo $code;
                }

                ?>
            </div>
        </div>
        <div id = "codeButtons">
            <form action="/~sg8/447/code.php" method="post" name="SaveAndSend">
                <input type="hidden" name="codeHolder" id="codeHolder" value="">
                <input id = "build" type="submit" value="Build">
            </form>
        </div>
    </div>

    <div id = "camAndHints">

        <div id = "cam">
        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/arlvIsjbGko" frameborder="0" allowfullscreen></iframe> 

        </div>
         <!--
        <button id = "reset">Reset</button>
        -->
        <div id = "hints">
            <br>
            Red LED on port 3, blue LED on port 13, Servo on port 2, digital display ports on 4,5,6,7,8,9,10,11
            <br><br>
            <button id = "about" onclick="sample()">Sample Code</button>
            <button id = "about" onclick="error()">Errors</button>
        </div>
        
    </div>  
<script src="./ace-builds-master/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/eclipse");
    editor.getSession().setMode("ace/mode/c_cpp");
</script>

<script type="text/javascript">
$(document).ready(function(){
    $("#build").click(function(){
        var code = editor.getValue();
        var ele = document.getElementById("codeHolder");
        ele.value = code;
        //alert(code);
    });
});
</script>

</body>
</html>
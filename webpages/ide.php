<?php session_start(); ?> 

<!-- NEED TO HAVE https://ace.c9.io/ MASTER BUILD IN SAME FOLDER-->

<!DOCTYPE html>
<html lang="en">
<head>
<title>ACE in Action</title>
<style type="text/css" media="screen">
    #editor { 
        position: absolute;
        margin-left: auto;
        margin-right: 0;        
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 49%;
    }
</style>
<script type="text/javascript">
	function setCode(){
		//alert("isnide here");
		elem = editor.getValue();
		alert(elem.textContent);
	}
    function clearBox()
    {
        //document.getElementById("editor").innerHTML = "";
        editor.setValue(".");
    }
    //window.onload = clearBox;
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

</head>
<body>

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
        /*
        echo(" <script type='text/javascript'>
                editor.setValue('void main()
            {
                printf('hello world');
            }')
            </script> ");
            */
    echo('void main(){

    printf("hello world");
    
}');
    }
    else{
        echo $code;
    }

    ?>
</div>


<iframe width=50% height="360" src="https://www.youtube.com/embed/_9pavMzUY-c" frameborder="0" allowfullscreen></iframe> 
<br>

<form action="/~sg8/447/code.php" method="post" name="SaveAndSend">
	<input type="hidden" name="code" id="code" value="">
	<input id = "sendCode" type="submit" value="Click to submit">
</form>

<script src="./ace-builds-master/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/c_cpp");
</script>

<script type="text/javascript">
$(document).ready(function(){
    $("#sendCode").click(function(){
    	var code = editor.getValue();
    	var ele = document.getElementById("code");
    	ele.value = code;
        //alert(code);
    });
});
</script>

</body>
</html>
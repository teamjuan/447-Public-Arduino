<?php session_start(); ?> 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Reservation Page</title>
      <link rel="stylesheet" type="text/css" href="reservation.css">
    <style type="text/css">
    	table, th, td {
    		border: 1px solid black;
    		border-collapse: collapse;
    	}
    </style>
    <script type="text/javascript">
        function a(){
            alert("I think Sasha Is Great");
        }
        function newDate(direction){
            if( direction == "left"){
                var curr = new Date;
                var lastWeek = new Date(curr.getFullYear(), curr.getMonth(), curr.getDate() - 7);
                var elem = document.getElementById("DayOfWeek");
                var firstday = new Date(lastWeek.setDate(lastWeek.getDate() - lastWeek.getDay())).toLocaleDateString().substr(0,4);
                var lastday = new Date(lastWeek.setDate(lastWeek.getDate() - lastWeek.getDay()+6)).toLocaleDateString().substr(0,4);
                //document.write("Week of " + firstday + "-" + lastday + "<br>");
                elem.innerHTML = "Week of " + firstday + "-" + lastday;
            }
            else if( direction == "right"){
                var curr = new Date;
                var lastWeek = new Date(curr.getFullYear(), curr.getMonth(), curr.getDate() + 7);
                var elem = document.getElementById("DayOfWeek");
                var firstday = new Date(lastWeek.setDate(lastWeek.getDate() - lastWeek.getDay())).toLocaleDateString().substr(0,4);
                var lastday = new Date(lastWeek.setDate(lastWeek.getDate() - lastWeek.getDay()+6)).toLocaleDateString().substr(0,4);
                //document.write("Week of " + firstday + "-" + lastday + "<br>");
                elem.innerHTML = "Week of " + firstday + "-" + lastday;
            }
            else if( direction == "now"){
                var curr = new Date;
                var elem = document.getElementById("DayOfWeek");
                var firstday = new Date(curr.setDate(curr.getDate() - curr.getDay())).toLocaleDateString().substr(0,4);
                var lastday = new Date(curr.setDate(curr.getDate() - curr.getDay()+6)).toLocaleDateString().substr(0,4);
                document.write("Week of " + firstday + "-" + lastday + "<br>");
                elem.innerHTML = "Week of " + firstday + "-" + lastday;
            }
            
        }
    </script>
  </head>
  <body>
    <div id = "header">
        <button id = "about" onclick="a()">About</button>
        <button id = "tutorial">Tutorials</button>
        <button id = "watch">Watch</button>
        <!-- Huge Bug If You Resize The Screen to center this stupid text-->
		<ti><text id = "arduino">Arduino Academy</text></ti>        
        <button id = "logIn">Log In</button>
    </div>

    <div align = "center" id = "timeSlot">
    	<label>Slot Type:</label>
    	<select name = "type">
    		<option selected = "selected">--Choose--</option>
    		<option value = "High">High</option>
    		<option value = "Low">Low</option>
    		<option value = "Sasha">Sasha</option>
    	</select>
    	<br><br>
        <div id = "Arrow"><t onclick="newDate('left')"> << </t></div>
        <div id = "DayOfWeek" value = "A"> Something   
            <script>
                newDate("now");
                /*
                var curr = new Date;
                var firstday = new Date(curr.setDate(curr.getDate() - curr.getDay())).toLocaleDateString().substr(0,4);
                var lastday = new Date(curr.setDate(curr.getDate() - curr.getDay()+6)).toLocaleDateString().substr(0,4);
                document.write("Week of " + firstday + "-" + lastday + "<br>");
                */
            </script>
            
        </div>
         <div id = "Arrow"><t onclick="newDate('right')"> >> </t></div>
        <div class = "table">
            <div class = "DaysOfWeek">
                <div class = "Sunday"></div>
            </div>
            <div class = "DaysOfWeek">
                <div class = "Monday"></div>
            </div>
            <div class = "DaysOfWeek">
                <div class = "Tuesday"></div>
            </div>
            <div class = "DaysOfWeek">
                <div class = "Wednesday"></div>
            </div>
            <div class = "DaysOfWeek">
                <div class = "Thursday"></div>
            </div>
            <div class = "DaysOfWeek">
                <div class = "Friday"></div>
            </div>
            <div class = "DaysOfWeek">
                <div class = "Saturday"></div>
            </div>

        </div>
    	<table align = "center" style = "width:90%">
            <script type="text/javascript">
                /*
                var d = new Date();
                var test = new Date().toISOString().substr(5,5);
                document.write("Week of " + (d.getMonth()+1) + "/" + d.getDay(0) + "-" + (d.getMonth()+1) + "/" + d.getDay(6) + "<br>");
                //*/

                var curr = new Date;
                var firstday = new Date(curr.setDate(curr.getDate() - curr.getDay())).toLocaleDateString().substr(0,4);
                var lastday = new Date(curr.setDate(curr.getDate() - curr.getDay()+6)).toLocaleDateString().substr(0,4);
                document.write("Week of " + firstday + "-" + lastday + "<br>");

                var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                var arrayLength = days.length;
                document.write("<tr>");
                for (var i = 0; i < arrayLength; i++) {
                    //alert(days[i]);
                    document.write("<th>" + days[i] + "</th>");
                }
                document.write("</tr>");
            </script>    	
    	</table>
    </div>
  </body>
</html>
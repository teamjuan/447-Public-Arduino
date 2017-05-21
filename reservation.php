<?php session_start(); ?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Reservation Page</title>
	<link rel="stylesheet" type="text/css" href="reservation.css">
    <link rel="stylesheet" type="text/css" href="common.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<style type="text/css">
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>
	<script type="text/javascript" >
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
        function addTimeButton(type, id, time, day) {
            //Create an input type dynamically.   
            var element = document.createElement("input");

            //element.id = "watch";

            id = parseInt(id); 

            var d = new Date();
            var day = d.getDay();
            var diff = d.getDate() - day;  // adjust when day is sunday
            var firstday = new Date(d.setDate(diff));
            //console.log(firstday);
            var x = firstday.getDate() + id;
            var dayOfWeek = new Date(firstday.setDate(x));
            dayOfWeek.setHours(time, 0,0,0);
            console.log(dayOfWeek);
            var today = new Date();
            //console.log(today);
            if( dayOfWeek < today){
            	element.type = "hidden";
            	var foo = document.getElementById(id);
            	foo.appendChild(element);
            	document.write("<br>");
            	return;
            }

            
            dayOfWeek.setHours(time-4, 0,0,0);
            var blah = dayOfWeek.toUTCString().toString();
            blah = blah.split(",").join("");
            //console.log(blah);
            
            //Assign different attributes to the element. 
            element.type = type;

            if( time < 12){
            	time = time;
            	element.value = time + ":00 am";
            }
            else{
            	time = ((time + 11) % 12 + 1);
            	element.value = time + ":00 pm";
            }
            //element.value = time + ":00"; // Really? You want the default value to be the type string?
            //element.name = String(time)+day+month+dayOfWeek; // And the name too?
            element.name = time + '#' + id + "#" + blah;

            element.onclick = function(){
            	document.timeSubmit.submit();
            };

            var foo = document.getElementById(id);
            //Append the element in page (in span).  
            foo.appendChild(element);
            document.write("<br>");
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
    </script>
</head>
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
	
	<br>
	<div align = "center" id = "timeSlot">

    <!--
		<div id = "Arrow"><t onclick="newDate('left')"> << </t></div>
        -->
		<div id = "DayOfWeek" value = "A"> Something   
			<script>
				newDate("now");
                /*
                var curr = new Date;
                var firstday = new Date(curr.setDate(curr.getDate() - curr.getDay())).toLocaleDateString().substr(0,4);
                var lastday = new Date(curr.setDate(curr.getDate() - curr.getDay()+6)).toLocaleDateString().substr(0,4);
                document.write("Week of " + firstday + "-" + lastday + "<br>");
                <input type="hidden" name="choice" id="choice" value="wassup">
                */
            </script>
            
        </div>
        <!--
        <div id = "Arrow"><t onclick="newDate('right')"> >> </t></div>
        -->
        <br><br>
        <table align = "center" style = "width:90%">
        	<script type="text/javascript">
                /*
                var d = new Date();
                var test = new Date().toISOString().substr(5,5);
                document.write("Week of " + (d.getMonth()+1) + "/" + d.getDay(0) + "-" + (d.getMonth()+1) + "/" + d.getDay(6) + "<br>");
                //*/
                /*
                var curr = new Date;
                var firstday = new Date(curr.setDate(curr.getDate() - curr.getDay())).toLocaleDateString().substr(0,4);
                var lastday = new Date(curr.setDate(curr.getDate() - curr.getDay()+6)).toLocaleDateString().substr(0,4);
                document.write("Week of " + firstday + "-" + lastday + "<br>");
                */
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
        <div class = "table">
        	<div class = "DaysOfWeek">
        		<form name="timeSubmit" method="post" action="reserve.php">
        			<div class = "Sunday" id = "0">
        				<script type="text/javascript">
        					for (var i = 8; i <= 18; i++) {
        						addTimeButton("submit", "0", i, "Sunday"  );
        					}
        				</script>
        				
        			</div>
        		</form>
        	</div>
        	<div class = "DaysOfWeek">
        		<form name="timeSubmit" method="post" action="reserve.php">
        			<div class = "Monday" id = "1">
        				<script type="text/javascript">
        					for (var i = 8; i <= 18; i++) {
        						addTimeButton("submit", "1", i, "Monday" );
        					}
        				</script>
        			</div>
        		</form>
        	</div>
        	<div class = "DaysOfWeek">
        		<form name="timeSubmit" method="post" action="reserve.php">
        			<div class = "Tuesday" id = "2">
        				<script type="text/javascript">
        					for (var i = 8; i <= 18; i++) {
        						addTimeButton("submit", "2", i, "Tuesday" );
        					}
        				</script>
        			</div>
        		</form>
        	</div>
        	<div class = "DaysOfWeek">
        		<form name="timeSubmit" method="post" action="reserve.php">
        			<div class = "Wednesday" id = "3">
        				<script type="text/javascript">
        					for (var i = 8; i <= 18; i++) {
        						addTimeButton("submit", "3", i, "Wednesday" );
        					}
        				</script>
        			</div>
        		</form>
        	</div>
        	<div class = "DaysOfWeek">
        		<form name="timeSubmit" method="post" action="reserve.php">
        			<div class = "Thursday" id = "4">
        				<script type="text/javascript">
        					for (var i = 8; i <= 18; i++) {
        						addTimeButton("submit", "4", i, "Thursday" );
        					}
        				</script>
        			</div>
        		</form>
        	</div>
        	<div class = "DaysOfWeek">
        		<form name="timeSubmit" method="post" action="reserve.php">
        			<div class = "Friday" id = "5">
        				<script type="text/javascript">
        					for (var i = 8; i <= 18; i++) {
        						addTimeButton("submit", "5", i, "Friday" );
        					}
        				</script>
        			</div>
        		</form>
        	</div>
        	<div class = "DaysOfWeek">
        		<form name="timeSubmit" method="post" action="reserve.php">
        			<div class = "Saturday" id = "6">
        				<script type="text/javascript">
        					for (var i = 8; i <= 18; i++) {
        						addTimeButton("submit", "6", i, "Saturday" );
        					}
        				</script>          
        			</div>
        			<form name="timeSubmit" method="post" action="reserve.php">
        			</div>
        		</div>
        	</div>
        </body>
        </html>
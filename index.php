<!DOCTYPE html>
<html> 

<head>
<link rel="stylesheet" href="style.css">
<title> Robot Arm Controller </title>
</head>

<body>

<!-- PHP Code -->

<?php

/* Save button */
if(isset($_POST['save'])){ 
	
	$base_ = $_POST['base'];
	$shoulder_ = $_POST['shoulder'];
	$elbow_ = $_POST['elbow'];
	$wrist_ = $_POST['wrist'];
	$gripper_ = $_POST['gripper'];


	$conn = new mysqli('localhost' , 'root' , '' , 'robot_controller');

if($conn->connect_error)
{
	die('Connection faild : '.$conn->connect_error);
}
else
{
	
	$stmt = $conn->prepare("UPDATE robot_arm SET base='$base_', shoulder='$shoulder_', elbow='$elbow_ ', wrist='$wrist_' ,gripper='$gripper_' ");
	$stmt->execute();
	$stmt->close();
    $conn->close();
	
}
 
}

/* Run button */
if(isset($_POST['run'])){
	
	$run_ = "on";

	$conn = new mysqli('localhost' , 'root' , '' , 'robot_controller');
	$stmt = $conn->prepare("UPDATE robot_arm SET on_off='$run_'");
	$stmt->execute();
	$stmt->close();
    $conn->close();


}

/* Stop button */
elseif(isset($_POST['stop'])){
	
	$stop_="off";
	
	$conn = new mysqli('localhost' , 'root' , '' , 'robot_controller');
	$stmt = $conn->prepare("UPDATE robot_arm SET on_off='$stop_'");
	$stmt->execute();
	$stmt->close();
    $conn->close();
}

elseif(isset($_POST['stop'])){
	
	$stop_="off";
	
	$conn = new mysqli('localhost' , 'root' , '' , 'robot_controller');
	$stmt = $conn->prepare("UPDATE robot_arm SET on_off='$stop_'");
	$stmt->execute();
	$stmt->close();
    $conn->close();
}

elseif(isset($_POST['backward'])){
	
	$back ="B";
	
	$conn = new mysqli('localhost' , 'root' , '' , 'robot_controller');
	$stmt = $conn->prepare("UPDATE robot_arm SET directions='$back'");
	$stmt->execute();
	$stmt->close();
    $conn->close();
}
elseif(isset($_POST['forw'])){
	
	$forward ="F";
	
	$conn = new mysqli('localhost' , 'root' , '' , 'robot_controller');
	$stmt = $conn->prepare("UPDATE robot_arm SET directions='$forward'");
	$stmt->execute();
	$stmt->close();
    $conn->close();
}
elseif(isset($_POST['left'])){
	
	$left ="L";
	
	$conn = new mysqli('localhost' , 'root' , '' , 'robot_controller');
	$stmt = $conn->prepare("UPDATE robot_arm SET directions='$left'");
	$stmt->execute();
	$stmt->close();
    $conn->close();
}
elseif(isset($_POST['right'])){
	
	$right ="R";
	
	$conn = new mysqli('localhost' , 'root' , '' , 'robot_controller');
	$stmt = $conn->prepare("UPDATE robot_arm SET directions='$right'");
	$stmt->execute();
	$stmt->close();
    $conn->close();
}

else
{
	$stp ="S";
	
	$conn = new mysqli('localhost' , 'root' , '' , 'robot_controller');
	$stmt = $conn->prepare("UPDATE robot_arm SET directions='$stp'");
	$stmt->execute();
	$stmt->close();
    $conn->close();
}


?>

<!-- End of php Code -->

<!-- HTML Code -->

<div class="Border" > 
<div class="allincenter"> <!-- Put all items on the border in center -->

<div class ="center"> <!-- To Put an image in the center -->

 <img src="https://s-m.com.sa/images/logo.png"/> 
 
</div>

<!-- Sliders --> 
<form action ="index.php" method ="post">

<div id="margin">
<label><b> Base:</label> <span id="demo"></span> 
<div class="slidecontainer"> <input type="range" min="0" max="180" value="90" class="slider" id="myRange" name="base"></div> <br />
<label><b> Shoulder:</label> <span id="demo1"></span> 
<div class="slidecontainer"><input type="range" min="0" max="180" value="90" class="slider" id="myRange1" name="shoulder"></div> <br />
<label><b> Elbow:</label> <span id="demo2"></span>  
<div class="slidecontainer"><input type="range" min="0" max="180" value="90" class="slider" id="myRange2" name="elbow"></div> <br />
<label><b> Wrist:</label> <span id="demo3"></span> 
<div class="slidecontainer"><input type="range" min="0" max="180" value="90" class="slider" id="myRange3" name="wrist"></div> <br />
<label><b> Gripper:</label> <span id="demo4"></span> 
<div class="slidecontainer"><input type="range" min="0" max="180" value="90" class="slider" id="myRange4" name="gripper"> </div> 

</div>

<!--End of Sliders -->

<!-- Buttons SAVE , RUN , STOP-->

<div class ="center" id="buttonmarrunstop" >
<pre>
<p>
<button  id="btn" type="submit" value="Submit" name="save"  class="button" ><b>SAVE</button> <button id="btn" type="submit" value="Submit" name="run" class="button" ><b>RUN</button> <button id="btn" type="submit" value="Submit" name="stop" class="button" ><b>STOP</button>
</p>
</pre>
</div>


<!-- Table of buttuns  -->

<table>
<tr style =" text-align: center">
<td > </td>  <td > <button  type="submit" value="Submit" name= "forw" class="buttTable" ><b>For<br/>ward</button></td> <td > </td>
</tr>

<tr style =" text-align: center">
<td > <button  type="submit" value="Submit" name="left" class="buttTable" ><b>Left</button>&nbsp;</td> <td ><button type="submit" value="Submit" name="stp" class="buttTable" id="stoptable"><b>STOP</button>&nbsp;</td> <td ><button  type="submit" value="Submit" name="right" class="buttTable" ><b>Right</button></td>
</tr>

<tr style =" text-align: center">
<td > </td>   <td > <button  type="submit" value="Submit" name="backward" class="buttTable"><b>Back<br/>ward</button></td> <td > </td> 
</tr>

</table>

<!-- END Table of buttuns  -->

</div>
</div>


</form> <!-- END of Form  -->

<!-- Java Script of sliders -->
<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
output.innerHTML = this.value;
}
</script>

<script>
var slider1 = document.getElementById("myRange1");
var output1 = document.getElementById("demo1");
output1.innerHTML = slider1.value;

slider1.oninput = function() {
output1.innerHTML = this.value;
}
</script>

<script>
var slider2 = document.getElementById("myRange2");
var output2 = document.getElementById("demo2");
output2.innerHTML = slider2.value;

slider2.oninput = function() {
output2.innerHTML = this.value;
}
</script>

<script>
var slider3 = document.getElementById("myRange3");
var output3 = document.getElementById("demo3");
output3.innerHTML = slider3.value;

slider3.oninput = function() {
output3.innerHTML = this.value;
}
</script>

<script>
var slider4 = document.getElementById("myRange4");
var output4 = document.getElementById("demo4");
output4.innerHTML = slider4.value;

slider4.oninput = function() {
output4.innerHTML = this.value;
}
</script>

<!-- End of Script -->

</body>
</html> 

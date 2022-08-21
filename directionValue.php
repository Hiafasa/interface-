<?php

$conn = new mysqli('localhost' , 'root' , '' , 'robot_controller');
$sql = mysqli_query($conn, "SELECT * FROM robot_arm");
$print_data = mysqli_fetch_row($sql);

echo $print_data[6];


?>

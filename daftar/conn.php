<?php
$servername = "localhost";
$username = "root";
$password = "";
$db ="anakbem";

//create connections
$conn = new mysqli($servername,$username,$password,$db);

//check connection
if ($conn->connect_error) {
  die ("connection failed: " . $conn->connect_error);
}
// echo "connected succesfully";

 ?>

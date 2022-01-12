<?php
ob_start();
@session_start();
$con = mysqli_connect("localhost","root","","ims");
$connect = new PDO("mysql:host=localhost;dbname=ims","root","");
//local host - server
//root - mysql user name
//mahinda123- mysql password
//library - database
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

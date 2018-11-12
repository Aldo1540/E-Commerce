<?php
/* file used to handle database capabilites*/

/* sets up variables needed for connection with a database on a server with login credentials */
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginsys";

/* sets up a variable for the connection using given credentials */
$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

/* checks if connection failed, if it did, display error message */
if(!$conn){
  die("Connection failed: ".mysqli_connect_error());
}


 ?>

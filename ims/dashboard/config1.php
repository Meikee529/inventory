<?php
function getdb(){
$servername = "localhost";
$username = "root";
$password = "";
$db = "attendance_system";

try {
   
	$conn=mysqli_connect("localhost","root","","attendance_system");
     //echo "Connected successfully"; 
    }
catch(exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}
?>
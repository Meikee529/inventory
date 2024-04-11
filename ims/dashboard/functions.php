<?php
include ('config1.php');
$id=$_GET['sub_id'];
$con = getdb();

	
 if(isset($_POST["Export"])){
		 
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=attendance.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID','Name','Date','Time','Status'));  
      $query = "SELECT * from attendance_record WHERE sub_id = '$id'";  
      $result = mysqli_query($con, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  

 ?>

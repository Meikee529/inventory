<?php  
 //retrievecat.php  
 $connect = mysqli_connect("localhost", "root", "", "attendance_system");  
 $output = '';  
 if(isset($_POST["c_id"]))  
 {  
      if($_POST["c_id"] != '')  
      {  
           $sql = "SELECT * FROM subject WHERE course = '".$_POST["c_id"]."'";  
      }  
      else  
      {  
           $sql = "SELECT * FROM subject";  
      }  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_assoc($result))  
      {  
            $output .= '<option value="'.$row["subject"].'">'.$row["subject"].'</option>';  
      }  
      echo $output;  
 }  
 ?>  
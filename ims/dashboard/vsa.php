<?php
session_start();

ini_set('display_errors', 1); 
/// allows a script to temporarily override a setting in PHP's configuration file. In this example, you'll turn the display_errors setting to on, which is represented by the number 1.
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	///strlen is a function used to count number of character
	///check whether has log in or not
{   
header('location:index.php');
}
else{
 
$ddate=date('Y-m-d G:i:s ', strtotime("now"));


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Students Attendance System | Students Attendance </title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.css"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> 
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" /> 
    
        <!-- Theme Styles -->
        <link href="../assets/css/alpha.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
<style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
</style>

	<body style="background-color:#d3d9de;">
        <?php include('includes/viewstudentattendanceheader.php');?>
            
        <?php include('includes/lecturersidebar.php');?>
            <main class="mn-inner">
                <div class="row" style="margin-left:53px">
                    <div class="col s12">
                        <div class="page-title" style="font-size:16px">Students Attendance Record</div>
                    </div>
                   
                    <div class="col s12 m12 l12">
		      <div class="card">
				<div class="card-content">
					<div class="row">
						<div>
							<?php
									
							$id=$_GET['sub_id'];
							
							$con=mysqli_connect("localhost","root","","attendance_system");
							// Check connection
							if (mysqli_connect_errno())
							{
							echo "Failed to connect to phpmyadmin: " . mysqli_connect_error();
							}

							$result = mysqli_query($con,"SELECT * FROM timetable where sub_id = $id");

							while($row = mysqli_fetch_array($result))
							{                                
							echo "<p style='font-size:25px; text-align: left'>" . $row['sub_name'] . "</td>";
							
							echo "<p style='font-size:18px; text-align: left'>" . $row['sub_course'] . "</td><br>";
							echo "<p style='font-size:15px; text-align: left'>" . $row['day'] ." &nbsp; ". $row['starttime'] ." - ". $row['endtime'] . "<br>";
							echo "<p style='font-size:15px; text-align: left'>" .  $row['sub_class'] ."<br>";
							}
							
							?>
						
						</div>
						<div>	    
							<?php
							$id=$_GET['sub_id'];
							$con=mysqli_connect("localhost","root","","attendance_system");
							
							$result = mysqli_query($con,"SELECT subject FROM subject WHERE subject_id = $id");
							$subject = mysqli_fetch_row($result);
							
							
							$sql = mysqli_query($con,"SELECT * FROM student WHERE s_subject LIKE '%$subject[0]%'");
							$rowCount = mysqli_num_rows ($sql);
							
							
							echo "<p style='font-size:15px; text-align: left'>" . "Total Students : " . $rowCount ;
							?>
						</div>
						
						<div class = "attendance-count">
							<p style="font-size:15px;"><br>Total Present: <span id="presentCount"></span></p>
							<p style="font-size:15px;">Total Late: <span id="lateCount"></span></p>
							<p style="font-size:15px;">Total Absent(Late): <span id="absentLateCount"></span></p>
						</div>
						
						<div>
						<div class="input-field col s3">
						  <div style="font-size:16px ; margin-top:20px">Start Date:</div>
							<input type=date id="start_date" name="start_date" class="form-control" required></input>
						</div>
						<div class="input-field col s3">
						  <div style="font-size:16px ; margin-top:20px">End Date:</div>
							<input type=date id="end_date" name="end_date" class="form-control"  required></input>
						</div>
						<div class="input-field col s3" style="margin-top:60px">
						  <input type="button" name="search" id="search" value="Search" class="btn btn-info" />
						   </div>     
						  
						</div>
					
						
											      
								
							   <table id="example" class="display responsive-table " style =" width = 100%; table-layout:fixed;">
									<thead>
										<tr>
						
											<th width="10%">ID</th>
											<th width="20%">Name</th>
											<th width="20%">Date</th>
											<th width="20%">Time</th>
											<th width="15%">Status</th>
										</tr>
									</thead>
						
									<?php 
									$id=$_GET['sub_id'];
									$sql = "SELECT * from attendance_record WHERE sub_id = '$id'";
									$query = $dbh -> prepare($sql);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									$cnt=1;
									if($query->rowCount() > 0)
									{
									foreach($results as $result)
									{         
									  ?>  

									<tr>
										
										<td><?php echo htmlentities($result->id);?></td>
										<td><?php echo htmlentities($result->Name);?></td>
										<td><?php echo htmlentities($result->Date);?></td>
										<td><?php echo htmlentities($result->Time);?></td>
										<td><?php echo htmlentities($result->status);?></td>	
					 
									</tr>
									  <?php $cnt++; }}?>
								
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
         
        </div>
        <div class="left-sidebar-hover"></div>
        
                <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>	
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>

	<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
	
	
		
	<script type="text/javascript" language="javascript" > 			//activate bootstrap-datepicker on start date and end date
	$(document).ready(function(){
	 
	 $('.input-daterange').datepicker({ 					//activate datepicker plugin
	  todayBtn:'linked',  							///LINK BOTH DATE
	  format: "yyyy-mm-dd", 						//format for date
	  autoclose: true
	 });

	 fetch_data('no');

	 function fetch_data(is_date_search, start_date='', end_date='') 	//function to fetch data , search features
	 {
	  var dataTable = $('#example').DataTable({  				//activate table plugin
	    //below all are options
	    retrieve: true,
	   "processing" : true,  						//display processing indicator when the date is being processed
	   "serverSide" : true,							//switch client-side processing to server-side processing
	   "order" : [],							//enable table column ordering
	   "ajax" : { 								//send Ajax request to server
		url:"fetch.php", 						//send the request to this page
		type:"POST", 							//post data to server
		data:{								//define which date to send to the server
		 is_date_search:is_date_search, start_date:start_date, end_date:end_date
		}
	   }
	  });
	 }

	 $('#search').click(function(){
	  var start_date = $('#start_date').val();
	  var end_date = $('#end_date').val();
	  
	  
	  if(start_date != '' && end_date !='')
	  {
	   $('#example').DataTable().destroy();
	   fetch_data('yes', start_date, end_date);
	   
	   $.ajax({
	      url:'updateAttendanceCount.php',
	      method:'POST',
	      data:{
		  start_date:start_date, end_date:end_date
	      },
		  dataType: "JSON",
	      success:function(data){
			if(data.status == 'ok'){
				$('#presentCount').text(data.presentCount);
				$('#lateCount').text(data.lateCount);
				$('#absentLateCount').text(data.absentLateCount);
				
			}else{
				$('#presentCount').text(0);
				$('#lateCount').text(0);
				$('#absentLateCount').text(0);
				alert("No attendance record between these dates.");
			} 
			

	      }
	  });
	  }
	  else
	  {
	   alert("Both Date is Required");
	  }
	  
	  
	  
	  
	 }); 
	 
	});
	</script>
		

    </body>
</html>
<?php } ?> 
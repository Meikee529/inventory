<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
$name=$_SESSION['name']; 


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Students Attendance System | Pie Chart </title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

            
        <!-- Theme Styles -->
        <link href="../assets/css/alpha.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>


 
    <body style="background-color:#d3d9de;">
        <?php include('includes/lecturersubjectheader.php');?>
            
        <?php include('includes/lecturersidebar.php');?>
		
		<main class="mn-inner">
                <div class="row" style="margin-left:53px">
                    <div class="col s12">
                        <div class="page-title" style="font-size:16px">Students Attendance Rate</div>
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
									
									<div style = "margin-top:130px" id="piechart"></div>
	
								</div>              
							</div>
						</div>
					</div>
                             
                </div>           
            </main>
    
	
        <div class="left-sidebar-hover"></div>
                <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        
		
		
		
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
		<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);
		
		$('#search').click(function(){
		 var start_date = $('#start_date').val();
		 var end_date = $('#end_date').val();
		 var sub_id = <?php echo $id?>;
		  
		 if(start_date != '' && end_date !='')
		 {
			$.ajax({
				  url:'updateAttendanceCount.php',
				  method:'POST',
				  data:{
				  start_date:start_date, end_date:end_date, sub_id:sub_id
				  },
				  dataType: "JSON",
				  success:function(data){
					if(data.status == 'ok'){
						
						var data = google.visualization.arrayToDataTable([
						  ['Status', 'Number of Student'],
						  ['Present', data.presentCount],
						  ['Late', data.lateCount],
						  ['Absent(Late)', data.absentLateCount],
						  ['Absent', data.absentCount]
						  
						]);
						
						var options = {'title':'Students Attendance Rate','titleFontSize':16, 'width':800, 'height':500};

						// Display the chart inside the <div> element with id="piechart"
						var chart = new google.visualization.PieChart(document.getElementById('piechart'));
						chart.draw(data, options);
						
					}else{
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
		
		
		// Load google charts
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		// Draw the chart and set the chart values
		function drawChart() {
		  var data = google.visualization.arrayToDataTable([
		  ['status', 'Number'],  
		  <?php  
			$id=$_GET['sub_id'];
			$connect=mysqli_connect("localhost","root","","attendance_system");
			$query="SELECT status,count(*) as number FROM attendance_record WHERE sub_id = '$id' GROUP BY status";
			$result=mysqli_query($connect,$query);

			while($row = mysqli_fetch_array($result))  
			{  
				echo "['".$row["status"]."', ".$row["number"]."],";  
			}  
		  ?>
		]);

		  // Optional; add a title and set the width and height of the chart
		  var options = {'title':'Students Attendance Rate','titleFontSize':16, 'width':800, 'height':500};

		  // Display the chart inside the <div> element with id="piechart"
		  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
		  chart.draw(data, options);
		}
		</script>
		
		
    </body>
</html>
<?php } ?>

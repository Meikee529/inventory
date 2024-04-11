<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
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

    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
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
                        <div class="page-title" style="font-size:16px">Students Attendance</div>
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
							echo "<p style='font-size:23px; text-align: left'>" . $row['sub_name'] . "</td>";
							}
							
							?>

						<?php 
										echo "<p style='font-size:27px; text-align: left'> ".date("h:i a");
									?>
									
						<div>	    
							<?php
							$id=$_GET['sub_id'];
							$con=mysqli_connect("localhost","root","","attendance_system");
							
							$result = mysqli_query($con,"SELECT subject FROM subject WHERE subject_id = $id");
							$subject = mysqli_fetch_row($result);
							
							
							$sql = mysqli_query($con,"SELECT * FROM student WHERE s_subject LIKE '%$subject[0]%'");
							$rowCount = mysqli_num_rows ($sql);
							
							echo "<p style='font-size:18px; text-align: left'>" . "Date: " . date("Y-m-d") . "<br>";
							echo "<p style='font-size:18px; text-align: left'>" . "Total Students : " . $rowCount ;
							
							?>
						</div>
						<div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                            
                                <span class="card-title">Total Student Present</span>
                                <span class="stats-counter">
<?php
$id=$_GET['sub_id'];
$today = date("Y-m-d");
$sql = "SELECT * from attendance_record where sub_id = $id AND (status = 'Present' OR status = 'Late' OR status = 'Absent(Late)') and Date=CURRENT_DATE()";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$empcount=$query->rowCount();
?>

                                    <span class="counter"><?php echo htmlentities($empcount);?></span></span>
                            </div>
                            <div id="sparkline-bar"></div>
							<div class="progress stats-card-progress">
                                <div class="determinate" style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
                        <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                            
                                <span class="card-title">Total Student Absent</span>
<?php
$dptcount=$rowCount-$empcount;
?>                            
                                <span class="stats-counter"><span class="counter"><?php echo htmlentities($dptcount);?></span></span>
                            </div>
                            <div id="sparkline-line"></div>
							<div class="progress stats-card-progress">
                            
                            </div>
                        </div>
                    </div>
                        </div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div>
<?php				
echo "<p style='font-size:17px; text-align: left'>" . "Present Student  : ";
?>
</div>
								<table id="t01">
                                    <thead>
                                        <tr>
                                            <th width="10%"><center>Student ID</center></th>
                                            <th width="50%"><center>Name</center></th>
											
											<th width="20%">Status</th>

                                        </tr>
                                    </thead> 
                                    <tbody>
<?php 
$sql = "SELECT * from attendance_record where sub_id = $id AND (status = 'Present' OR status = 'Late' OR status = 'Absent(Late)') and Date=CURRENT_DATE()";
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
											<td><center><?php echo htmlentities($result->id);?></center></td>
											<td><center><?php echo htmlentities($result->Name);?></center></td>
											
											<td><?php echo htmlentities($result->status);?></td>
										<?php $cnt++; }}?>
                                    </tbody>
                                </table>

<div>
<?php				
echo "<br>"."<p style='font-size:17px; text-align: left'>" . "Absent Student  : ";
?>
</div>

								<table id="t01">
                                    <thead>
                                        <tr>
                                            <th width="10%"><center>Student ID</center></th>
                                            <th width="50%"><center>Name</center></th>
											
											<th width="20%">Status</th>

                                        </tr>
                                    </thead> 
                                    <tbody>
<?php 
$sql = "SELECT * from attendance_record where sub_id = $id AND status = 'Absent' and Date=CURRENT_DATE()";
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
											<td><center><?php echo htmlentities($result->id);?></center></td>
											<td><center><?php echo htmlentities($result->Name);?></center></td>
											
											<td><?php echo htmlentities($result->status);?></td>
										<?php $cnt++; }}?>
                                    </tbody>
                                </table>

                    </div>	
								 
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
	
	
		

		

    </body>
</html>
<?php } ?> 

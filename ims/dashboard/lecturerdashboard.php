<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
$eid=$_SESSION['eid'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Lecturer | Dashboard</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
        <link href="../assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet">
        <link href="../assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet">

        	
        <!-- Theme Styles -->
        <link href="../assets/css/alpha.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
    </head>
	
        <body style="background-color:#d3d9de;">
    <?php include('includes/lecturerdashboardheader.php');?>
            
    <?php include('includes/lecturersidebar.php');?>
 

	<main class="mn-inner">
		<div class="row" style="margin-left:40px">
			<div class="col s12">
				<div class="page-title" style= "padding-left:10px; font-size:16px"> </div>
			</div>
			<div class="col s12 m12 l12">
				<div class="card">
					<div class="card-content">	
						<form autocomplete="off" id="example-form" method="post" name="addemp" >
							<div>
									<?php 
										echo "<p style='font-size:27px; text-align: left'> ". date("h:i a");
										echo "<p style='font-size:20px; text-align: left'> ". date("l") ;
										echo "<p style='font-size:20px; text-align: left'> ". date("Y-m-d");
										echo "<p style='font-size:17px; text-align: left'>  Today's class : " ;
									?> 

							<table id="t01">
                                    <thead>
                                        <tr>
                                            <th width="250"><center>Subject</center></th>
                                            <th width="300"><center>Classroom</center></th>
											<th width="150"><center>Start Time</center></th>
											<th width="150"><center>End Time</center></th>
											<th width="100"><center>Attendance</center></th>

                                        </tr>
                                    </thead>
                                 
                                    <tbody>

<?php 
$lid=$_SESSION['aid'];
$day=date("l") ;
$sql = "SELECT * from timetable WHERE l_id ='$lid' and day='$day' " ;
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
											<td><center><?php echo htmlentities($result->sub_name);?></center></td>
											<td><center><?php echo htmlentities($result->sub_class);?></center></td>
											<td><center><?php echo htmlentities($result->starttime);?></center></td>
											<td><center><?php echo htmlentities($result->endtime);?></center></td>
											<td><center><a href="viewstudentattendancenow.php?sub_id=<?php echo htmlentities($result->sub_id);?>"><i class="material-icons" title="Click">search</i></center></td>
											
						
											
										
								
                                        
                                                 
										</tr>
										<?php $cnt++; }}?>
                                    </tbody>
                                </table>			
								<section>
									<!--div class="wizard-content">
										<div class="row">
											<div class="col s4 m7 ">
												<div class="row">
												<div class="card stats-card">
													<div class="card-content">
													<span class="card-title">Total Class Today</span>
														<span class="stats-counter">
																</*?php 
																$lid=$_SESSION['aid'];
																$today = date("l");
																$sql = "SELECT * from timetable WHERE l_id ='$lid' and day='$today'";
																$query = $dbh -> prepare($sql);
																$query->execute();
																$results=$query->fetchAll(PDO::FETCH_OBJ);
																$empcount=$query->rowCount();
																
																?*/> 

																<span class="counter"><!--?php echo htmlentities($empcount);?></span></span>
													</div>
													<div id="sparkline-bar"></div>
													<div class="progress stats-card-progress">
														<div class="determinate" style="width: 100%"></div>
													</div>
													
												</div>
												</div>
											</div>
										</div>
									</div-->
								</section>            
							</div>
						</form>
    
					</div>
				</div>
			</div>
		</div>
    </main>

														
        <!-- Javascripts -->
	
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../assets/plugins/counter-up-master/jquery.counterup.min.js"></script>
        <script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="../assets/plugins/chart.js/chart.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="../assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="../assets/plugins/peity/jquery.peity.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/dashboard2.js"></script>  <!--prompt smile face-->
        
    </body>
</html>
<?php } ?>

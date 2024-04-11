<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Students Attendance System | Lecturer</title>
        
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

<style>



table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color: #fff;
}
table#t01 th {
    background-color:#000000;
    color:#FFFFFF;
}

</style>

    </head>
    <body style="background-color:#d3d9de;">
        <?php include('includes/lecturertimetableheader.php');?>
            
        <?php include('includes/lecturersidebar.php');?>
		
		<main class="mn-inner">
             
                 
                    <div class="row" style="margin-left:53px">
                    <div class="col s12">
                         <div class="row no-m-t no-m-b" style="margin-left:53px">
					<!--center><img src="../logo.png" style="width:350px; height:110px;"></center><br-->
					<br>
					<br>
					<center><span class="card-title" style="font-weight:bold;font-size:25px"><b>Lecturer Timetable</b></span></center><br>  
                    </div>
                    </div>
                           
                                   
                             <table id="t01">
                                    <thead>
                                        <tr>
											<th width="180"><center>Day</center></th>
                                            <th width="350"><center>Subject</center></th>
											<th width="100"><center>Students Attendance</center></th>
                                            <th width="300"><center>Classroom</center></th>
											<th width="150"><center>Start Time</center></th>
											<th width="150"><center>End Time</center></th>
											<th width="200"><center>Course</center></th>
										
                                        </tr>
                                    </thead>
                                 
                                    <tbody>

<?php 
$id=$_GET['l_id'];
$sql = "SELECT * from timetable WHERE l_id ='$id'";
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
											<td><center><?php echo htmlentities($result->day);?></center></td>
											<td><center><?php echo htmlentities($result->sub_name);?></center></td>
											<td><center><a href="viewstudentattendance.php?sub_id=<?php echo htmlentities($result->sub_id);?>"><i class="material-icons" title="Click">search</i></center></td>
											<td><center><?php echo htmlentities($result->sub_class);?></center></td>
											<td><center><?php echo htmlentities($result->starttime);?></center></td>
											<td><center><?php echo htmlentities($result->endtime);?></center></td>
											<td><center><?php echo htmlentities($result->sub_course);?></center></td>

										</tr>
										<?php $cnt++; }}?>
                                    </tbody>
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
    </body>
</html>
<?php } ?>

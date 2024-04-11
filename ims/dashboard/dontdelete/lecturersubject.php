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
        <title>Students Attendance System | Lecturer Subject </title>
        
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
    </head>
    <body style="background-color:#d3d9de;">
        <?php include('includes/lecturersubjectheader.php');?>
            
        <?php include('includes/lecturersidebar.php');?>
            <main class="mn-inner">
                <div class="row" style="margin-left:53px">
                    <div class="col s12">
                        <div class="page-title">Lecturer Subject</div>
                    </div>
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Subject</span>                                
                                <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr>
											<th width="50"><center>#</center></th>
                                            <!--th width="10%">Course</th-->
                                            <th width="300"><center>Subject</center></th>										
											<!--th width="10%">Classroom</th>
											<th width="10%">Start Time</th>
											<th width="10%">End Time</th>
                                            <th width="10%">Day</th-->
											<th width="200"><center>Attendance</center></th>
											<th width="200"><center>Chart</center></th>
											<th width="100"><center>Student Info</center></th>
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
											<td><center><b><?php echo htmlentities($cnt);?></b></center></td>
											<!--td><!--?php echo htmlentities($result->sub_course);?--></td-->
                                            <td><center><?php echo htmlentities($result->sub_name);?></center></td>
											<!--td><!--?php echo htmlentities($result->sub_class);?></td-->
                                            <!--td><!--?php echo htmlentities($result->starttime);?></td>
                                            <td><!--?php echo htmlentities($result->endtime);?></td>
                                            <td><!--?php echo htmlentities($result->day);?></td-->
											<td><center><a href="viewstudentattendance.php?sub_id=<?php echo htmlentities($result->sub_id);?>"><i class="material-icons" title="Edit">search</i></a></center></td>
											<td><center><a href="piechart.php?sub_id=<?php echo htmlentities($result->sub_id);?>"><i class="material-icons" title="Edit">donut_small</i></a></center></td>
                                            <td><center><a href="viewstudentinfo.php?sub_id=<?php echo htmlentities($result->sub_id);?>"><i class="material-icons" title="Edit">contacts</i></a></center></td>
											
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
        <!--script src="../assets/js/pages/table-data.js"></script-->
    </body>
</html>
<?php } ?>

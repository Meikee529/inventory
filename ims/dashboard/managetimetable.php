<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}

else
{

if(isset($_GET['mpid']))
{

$name=$_SESSION['name']; 
$ddate=date('Y-m-d G:i:s ', strtotime("now"));
$id=$_GET['mpid'];
$sql = "delete from student WHERE s_id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
}
    ?>

<!DOCTYPE html>
<html lang="en">

	<head>
        
        <!-- Title -->
        <title>Students Attendance System | Manage Timetable </title>
        
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
<script type="text/javascript">
function valid()
{
if(document.addemp.password.value!= document.addemp.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.addemp.confirmpassword.focus();
return false;
}
return true;
}
</script>

<script>
function checkAvailabilityEmp_initial() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'empcode='+$("#empcode").val(),
type: "POST",
success:function(data){
$("#empid-availability").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

</script>

	
<!--script>
function checkAvailabilityEmailid() {	
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#emailid-availability").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script-->
	<body style="background-color:#d3d9de;">
        <?php include('includes/managetimetableheader.php');?>
            
        <?php include('includes/schedulersidebar.php');?>
            <main class="mn-inner">
                <div class="row" style="margin-left:53px">
                    <div class="col s12">
                        <div class="page-title" style="font-size:16px">Available Timetable</div>
                    </div>
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                                               
                                <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr>
                                            <th width="9%">Course</th>
                                            <th width="18%">Subject</th>										
											<th width="12%">Lecturer</th>
											<th width="10%">Classroom</th>
											<th width="10%">Start Time</th>
											<th width="10%">End Time</th>
                                            <th width="10%">Day</th>
											<th width="5%">Action</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
<?php $sql = "SELECT * from timetable ";
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
                                            <td><?php echo htmlentities($result->sub_course);?></td>
                                            <td><?php echo htmlentities($result->sub_name);?></td>
											<td><?php echo htmlentities($result->sub_lecturer);?></td>
											<td><?php echo htmlentities($result->sub_class);?></td>
                                            <td><?php echo htmlentities($result->starttime);?></td>
                                            <td><?php echo htmlentities($result->endtime);?></td>
                                            <td><?php echo htmlentities($result->day);?></td>
                                            <td><a href="edittimetable.php?sub_id=<?php echo htmlentities($result->sub_id);?>"><i class="material-icons" title="Edit">mode_edit</i></a>
                                            <a href="managetimetable.php?sub_id=<?php echo htmlentities($result->sub_id);?>" onclick="return confirm('Are you sure want to delete? The data is irreversible once you delete it!');"><i class="material-icons" title="Delete">delete</i></td>
                                                 
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
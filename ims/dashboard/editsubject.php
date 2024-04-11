<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
$pid=intval($_GET['projectid']);
if(isset($_POST['update']))
{
$project_name=$_POST['project_name'];
$project_description=$_POST['project_description'];


$sql="update project1 set project_name=:project_name,project_description=:project_description where project_id=:pid";

$query = $dbh->prepare($sql);

$query->bindParam(':project_name',$project_name,PDO::PARAM_STR);
$query->bindParam(':project_description',$project_description,PDO::PARAM_STR);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->execute();

$lastInsertId = $dbh->lastInsertId();
$msg="Project record updated successfully";
}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Students Attendance System | Add Students </title>
        
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
function checkAvailabilityprojectid() {
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


    </head>
    <body style="background-color:#d3d9de;">
    <?php include('includes/addsubjectheader.php');?>
            
    <?php include('includes/schedulersidebar.php');?>
    <main class="mn-inner">
                <div class="row" style="margin-left:53px">
                    <div class="col s12">
                        <div class="page-title" style= "padding-left:10px; font-size:16px">Edit Subject</div>
                    </div>
						<div class="col s12 m12 l12">
							<div class="card">
								<div class="card-content">
									<form id="example-form" method="post" name="addemp">
										<div>
											<h3 style= "padding-left:20px">Subject Name</h3>
											<section>
													<div class="wizard-content">
														<div class="row">
															<div class="col m6">
																<div class="row">
<?php 
$pid=intval($_GET['projectid']);
$sql = "SELECT * from project1 where project_id=:pid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':pid',$pid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 

<div class="input-field col s12">
<label for="project_name">Project name</label>
<input id="project_name" name="project_name" type="text" value="<?php echo htmlentities($result->project_name);?>" required>
</div>

<div class="input-field col s12">
<label for="project_description">Project Description</label>
<input id="project_description" name="project_description" type="text" value="<?php echo htmlentities($result->project_description);?>" autocomplete="off" required>
</div>

                  
<?php } }?>

<div class="input-field col s12">
<button type="submit" name="update"  id="update" class="waves-effect waves-light btn indigo m-b-xs">UPDATE</button>
<a href="managesubject.php" class="waves-effect waves-light btn indigo m-b-xs" >Back</a>
</div>

																</div>
															</div>
														</div>
													</div>
											</section>

										</div>
									</form>
								</div>
							</div>
						</div>
				</div>
    </main>
        </div>
        <div class="left-sidebar-hover"></div>
        
           <!-- Javascripts -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>  
    </body>
</html>
<?php  ?> 
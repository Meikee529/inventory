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
$ddate=date('Y-m-d G:i:s ', strtotime("now"));

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

<script type = "text/javascript">
function run()
{
    
$.ajax({url:"run.php",success:function(result)
{
alert(result);
}
})
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
    <?php include('includes/enrollheader.php');
		  include('includes/adminsidebar.php'); ?>
    	   
    <main class="mn-inner">
		<div class="row" style="margin-left:40px">
			<div class="col s12">
				<div class="page-title" style= "padding-left:10px; font-size:16px">Add New Student</div>
			</div>
			<div class="col s12 m12 l12">
				<div class="card">
					<div class="card-content">
						<form autocomplete="off" id="example-form" method="post" name="addemp" >
							<div>
								<h3 style= "padding-left:20px">Student Info</h3>
								<section>
									<div class="wizard-content">
										<div class="row">
											<div class="col m6">
												<div class="row">
			    <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
			    else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
												
												<div
												<?php
												
												$query = $dbh->prepare("SELECT * FROM student");
												$query->execute();
												while($row = $query->fetch(PDO::FETCH_ASSOC)) 
												{ echo $row['s_name']."</br>";
												 }
												?>											
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
        
    <div class="left-sidebar-hover"></div>
        
	   <!-- Javascripts -->
	<script type = "text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
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

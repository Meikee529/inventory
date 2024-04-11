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
if(isset($_POST['add']))  //make sure all the infos are filled in  
{
$query = $dbh->prepare("SELECT finger_template1, finger_template2, finger_template3 FROM register_finger");
$query->execute();
while($row = $query->fetch(PDO::FETCH_ASSOC)) 
{
 $fingertemplate1 = $row['finger_template1'];
 $fingertemplate2 = $row['finger_template2'];
 $fingertemplate3 = $row['finger_template3'];
}

$pic;
$studentcourse=$_POST['studentcourse'];
$studentname=$_POST['studentname']; 
$gender=$_POST['gender']; 
$birth=$_POST['birth']; 
$studentemail=$_POST['studentemail'];
$registerdate=$_POST['registerdate'];
$phonenumber=$_POST['phonenumber'];


if ($startdate > $duedate){
	echo "<script>
	alert('Start Date must not bigger than Due Date!');
	window.location.href='addtask.php';
	</script>";
}
else {
foreach ($_POST['pic'] as $selectedOption){
    $pic = $pic.$selectedOption." ";
}

$sql="INSERT INTO student(s_course,s_name,s_gender,s_birth,s_phone,s_email,s_register,finger_template1,finger_template2,finger_template3) VALUES('$studentcourse','$studentname','$gender','$birth','$phonenumber','$studentemail','$registerdate','$fingertemplate1','$fingertemplate2','$fingertemplate3')";
$query = $dbh->prepare($sql);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Student added Successfully";
$sql="DELETE FROM register_finger WHERE id = 1";
$query = $dbh->prepare($sql);
$query->execute();

}
else 
{
$error="Something went wrong. Please try again";
}
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
$.ajax({url:"run.php",type:'POST',success:function(result)
{
alert(result);
}
})
}
</script>

<script type = "text/javascript">
function deletefinger()
{
if (confirm("Delete fingerprint?")) {
$.ajax({url:"deletefinger.php",success:function(result)
{
alert(result);
}
})
} else {
  
}
}
</script>

<script type = "text/javascript">
function verifyfinger()
{
    
$.ajax({url:"verifyfingerprint.php",success:function(result)
{
alert(result);
}
})
}
</script>


<script type = "text/javascript">
function canceladd()
{
if (confirm("Are you sure you want to cancel?")) {
$.ajax({url:"cancel.php",success:function(result)
{
alert(result);
}
})
} else {
  
}
}
</script>


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
	   
													
	   
	   
													<div class="input-field col s12">
													<label for="studentcourse" style = "font-size">Course</label></br></br>
													<select id="studentcourse" name="studentcourse" required >
														<?php 
															$query = $dbh->prepare("SELECT course FROM course");
															$query->execute();
															while($row = $query->fetch(PDO::FETCH_ASSOC)) 
															{?>
															<option value = "<?php echo $row['course'];?>"><?php echo $row['course'];?></option>		
															<?php    
															 }
														?>
													</select>
													</div>
													
													

													<div class="input-field col s12">
													<label for="studentname">Student Name</label>
													<input autocomplete="off" id="studentname" name="studentname" type="text"  required >   
													</div>
													
													<div class="input-field col s6">
													<label for="gender">Gender</label><br><br>
													<select name="gender" required>
														<option value="Female">Female</option>
														<option value="Male">Male</option>
													</select>
													</div>
																
													<div class="input-field col s12">
													<label for="birth">Date of Birth</label><br><br>
													<input id="birth" name="birth" type="date" required>   
													</div>

													<div class="input-field col s12">
													<label for="phonenumber">Phone Number</label>
													<input id="phonenumber" name="phonenumber" autocomplete="off" type="text" required>   
													</div>

													<div class="input-field col s12">
													<label for="studentemail">Email</label>
													<input id="studentemail" name="studentemail" autocomplete="off" type="text" required>
													</div>        

													<div class="input-field col s6">
													<label for="registerdate">Registration Date</label><br><br>
													<input id="registerdate" name="registerdate" type="date" required>   
													</div>

													
													<div class="input-field col s12">
													<label for="pic" style = "font-size">Person-In-Charge</label></br></br>
													<select id="pic" name="pic" required >
														<?php 
															$query = $dbh->prepare("SELECT * FROM admin");
															$query->execute();
															while($row = $query->fetch(PDO::FETCH_ASSOC)) 
															{?>
															<option value = "<?php echo $row['UserName'];?>"><?php echo $row['UserName'];?></option>		
															<?php    
															 }
														?>
													</select>
													</div>
													
													
													<div class="input-field col s12">
													    <h5 style = "font-size:16px; color:#9e9e9e; margin-top:20px;margin-bottom:20px;font-weight:500;" >Fingerprint</h5>	
														
														<div>
														<button type="button" class="waves-effect waves-light btn indigo m-b-xs" name="fingerprint" onclick="run();">Add Fingerprint
														<i class="material-icons right">fingerprint</i>
														</button>
				
	    
														<button type="button" style = "margin-left:40px;"class="waves-effect waves-light btn indigo m-b-xs" name="cancel" onclick="canceladd();">Cancel
														<i class="material-icons right">cancel</i>
														</button>
														</div>
														
														<div>
														<button type="button" class="waves-effect waves-light btn indigo m-b-xs" name="verify" onclick="verifyfinger();">Verify Fingerprint
														<i class="material-icons right">check_circle</i>
														</button>
														</div>	
														
														<div>
														<button type="button" class="waves-effect waves-light btn indigo m-b-xs" name="delete" onclick="deletefinger();">Delete Fingerprint
														<i class="material-icons right">delete</i>
														</button>
														</div>
																																								
													</div>
													
													<div class="input-field col s12">
													<button class="waves-effect waves-light btn indigo m-b-xs" style = "margin-top:30px;" type="submit" name="add" onclick="return valid();" id="add" >SUBMIT
													<i class="material-icons right">send</i>
													</button>
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

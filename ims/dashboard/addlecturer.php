<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
$ddate=date('Y-m-d G:i:s ', strtotime("now"));
if(isset($_POST['add']))
{

$empna=$_POST['username'];
$fname=$_POST['firstName'];
$lname=$_POST['lastName'];
$email=$_POST['email']; 
$password=md5($_POST['password']); 
$gender=$_POST['gender']; 


$sql="INSERT INTO lecturer(Username,firstname,lastname,Password,l_email,gender) VALUES(:empna,:fname,:lname,:password,:email,:gender)";
$query = $dbh->prepare($sql);
//PDO object
//$query->bindParam(':checked',$checked,PDO::PARAM_STR);
//$query->bindParam(':ddate',$ddate,PDO::PARAM_STR);

$query->bindParam(':empna',$empna,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Lecturer added Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}

    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Students Attendance System | Add Lecturer </title>
        
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
function checkAvailabilityEmpid() {
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

function checkAvailabilityName() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'username='+$("#username").val(),
type: "POST",
success:function(data){
$("#username-availability").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

    </head>
    <body style="background-color:#d3d9de;">
    <?php include('includes/addlecturerheader.php');?>
            
    <?php include('includes/itsidebar.php');?>
    <main class="mn-inner">
                <div class="row" style="margin-left:53px">
                    <div class="col s12">
                        <div class="page-title">Add lecturer</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="addemp">
                                    <div>
                                        <h3 style="margin-left:18px;">Lecturer Info</h3>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m6">
                                                        <div class="row">
     <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>


															<div class="input-field col s12">
															<label for="username">Username</label>
															<input name="username" id="username" onBlur="checkAvailabilityName()" type="text" autocomplete="off" required>
															<span id="username-availability" style="font-size:12px;"></span> 
															</div>

															<div class="input-field col m6 s12">
															<label for="firstName">First name</label>
															<input id="firstName" name="firstName" type="text" required>
															</div>

															<div class="input-field col m6 s12">
															<label for="lastName">Last name</label>
															<input id="lastName" name="lastName" type="text" autocomplete="off" required>
															</div>


															<div class="input-field col  s12">
															<label for="email">Email</label>
															<input  name="email" type="email" id="email" onBlur="checkAvailabilityEmailid()" autocomplete="off" required>
															<span id="emailid-availability" style="font-size:12px;"></span> 
															</div>

															<div class="input-field col s12">
															<label for="password">Password</label>
															<input id="password" name="password" type="password" autocomplete="off" required>
															</div>

															<div class="input-field col s12">
															<label for="confirm">Confirm password</label>
															<input id="confirm" name="confirmpassword" type="password" autocomplete="off" required>
															</div>
															
															<div class="input-field col s6" style="margin-top:-8px;">
															<label for="gender" style="font-size:12px;">Gender</label></br>
															<select  name="gender" autocomplete="off">
															<option value="">Gender...</option>                                          
															<option value="Male">Male</option>
															<option value="Female">Female</option>
															<option value="Other">Other</option>
															</select>
															</div>
															
															<div class="input-field col s12">
															<button type="submit" name="add" onclick="return valid();" id="add" class="waves-effect waves-light btn indigo m-b-xs">ADD</button>
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
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/form_elements.js"></script>
        
    </body>
</html>
<?php } ?> 
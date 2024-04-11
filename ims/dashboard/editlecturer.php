<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
$pid=intval($_GET['lecturerid']);
if(isset($_POST['update']))
{
	
$name=$_POST['name'];
$email=$_POST['email'];
$firstname =$_POST['firstname'];
$lastname =$_POST['lastname'];
$password=md5($_POST['password']); 
$gender=$_POST['gender']; 

$sql="UPDATE lecturer SET UserName= '$name', l_email = '$email', firstname= '$firstname', lastname= '$lastname', Password= '$password', gender= '$gender' WHERE l_id= '$pid'";
$query = $dbh->prepare($sql);
$query->execute();

$lastInsertId = $dbh->lastInsertId();
$msg="Lecturer Info Updated Successfully";
}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Students Attendance System | Edit Lecturer</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">

		
            
        <!-- Theme Styles -->
        <link href="../assets/css/alpha.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
		
		
		
<script type="text/javascript">
function valid()
{
if(document.updatemp.password.value!= document.updatemp.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.updatemp.confirmpassword.focus();
return false;
}
return true;
}
</script>

<style>
.errorWrap{
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
    <?php include('includes/editlecturerheader.php');?>
            
       <?php include('includes/itsidebar.php');?>
    <main class="mn-inner">
                <div class="row" style="margin-left:53px">
                    <div class="col s12">
                        <div class="page-title">Edit lecturer</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="updatemp">
                                    <div>
                                        <h3 style="margin-left:18px;">Edit Lecturer Details</h3>
                                           <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
											else if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m6">
                                                        <div class="row">
															<?php 
															$pid=intval($_GET['lecturerid']);
															$sql = "SELECT * from lecturer where l_id=:pid";
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
															<label for="name">Username</label>
															<input id="name" name="name" type="text" value="<?php echo htmlentities($result->UserName);?>" required>
															</div>
															
															<div class="input-field col s12">
															<label for="name">Firstname</label>
															<input id="firstname" name="firstname" type="text" value="<?php echo htmlentities($result->firstname);?>" required>
															</div>
															
															<div class="input-field col s12">
															<label for="name">Lastname</label>
															<input id="lastname" name="lastname" type="text" value="<?php echo htmlentities($result->lastname);?>" required>
															</div>
															

															<div class="input-field col s12">
															<label for="email">Email</label>
															<input id="email" name="email" type="text" value="<?php echo htmlentities($result->l_email);?>" autocomplete="off" required>
															</div>
															
															<div class="input-field col s12">
															<label for="gender">Gender</label><br><br>
															<select name="gender" required>
																<option value="Male" <?php if($result->gender == 'Male'){echo $row['Male'];} ?>>Male</option>
																<option value="Female" <?php if($result->gender == 'Female'){echo $row['Female'];} ?>>Female</option>
																
															</select>
															</div>
															
															
															<div class="input-field col s12">
															<label for="password">Password</label>
															<input id="password" name="password" type="password"  autocomplete="off" required>
															</div>

															<div class="input-field col s12">
															<label for="confirm">Confirm password</label>
															<input id="confirm" name="confirmpassword" type="password"  autocomplete="off" required>
															</div>
															
																			  
															<?php } }?>
																													
															<div class="input-field col s12">
															<button type="submit" name="update" onclick="return valid();"  id="update" class="waves-effect waves-light btn indigo m-b-xs">UPDATE</button>
															<a href="managelecturer.php" class="waves-effect waves-light btn indigo m-b-xs" >Back</a>
															</div>

                                                        </div>
                                                </div>
                                            </div>
                                        </section>
                                     
                                    
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
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


if(isset($_POST['add']))
{

		
$name=$_POST['name'];
$sub=$_POST['sub'];
$lecturer=$_POST['lecturer'];
$classroom=$_POST['classroom'];

$sql="INSERT INTO timetable(sub_course,sub_name,sub_lecturer,sub_class) VALUES('$name','$sub','$lecturer','$classroom')";
$query = $dbh->prepare($sql);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
    $msg="Timetable Added Successfully";		
}
else 
{
    $error="Something went wrong. Please try again";
}
	

}




 $connect = mysqli_connect("localhost", "root", "", "attendance_system");  
 function fill_category($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM course";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["course"].'">'.$row["course"].'</option>';  
      }  
      return $output;  
 }  
 
 function fill_part($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM subject";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_assoc($result))  
      {  
        $output .= '<option value="'.$row["subject"].'">'.$row["subject"].'</option>';  
	  }
      return $output; 	  
 }

    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Students Attendance System | Timetable </title>
        
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



    </head>
    <body style="background-color:#d3d9de;">
    <?php include('includes/addtimetableheader.php');?>
            
    <?php include('includes/schedulersidebar.php');?>
    <main class="mn-inner">
                <div class="row" style="margin-left:53px">
                    <div class="col s12">
                        <div class="page-title" style= "padding-left:10px; font-size:16px">Timetable</div>
                    </div>
						<div class="col s12 m12 l12">
							<div class="card">
								<div class="card-content">
									<form id="example-form" method="post" name="addemp">
										<div>
											<h3 style= "padding-left:20px">Timetable Matching</h3>
											<section>
													<div class="wizard-content">
														<div class="row">
															<div class="col m6">
																<div class="row">
     <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
																	
																	<div class="input-field col s12">
																	<label for="name" style = "font-size">Course</label></br></br>
																	<select name="name" id="name">  
																		<option value="">Show All Course</option>  
																		<?php echo fill_category($connect); ?>  
																	</select> 
																	</div>
																	
																	<div class="input-field col  s12">
																	<label for="sub" style = "font-size">Subject</label></br></br>
																	<select id="show_sub" name="sub" required>
																		<option value="">Show Subject</option>  
																		<?php echo fill_part($connect);?>  
																	</select>
																	</div>
																
																	
																	<div class="input-field col s12">
																	<label for="lecturer" style = "font-size">Lecturer</label></br></br>
																	<select id="lecturer" name="lecturer" required >
																		<?php 
																			$query = $dbh->prepare("SELECT UserName FROM lecturer");
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
																	<label for="classroom" style = "font-size">Classroom</label></br></br>
																	<select id="classroom" name="classroom" required >
																		<?php 
																			$query = $dbh->prepare("SELECT classroom FROM classroom");
																			$query->execute();
																			while($row = $query->fetch(PDO::FETCH_ASSOC)) 
																			{?>
																			<option value = "<?php echo $row['classroom'];?>"><?php echo $row['classroom'];?></option>		
																			<?php    
																			 }
																		?>
																	</select>
																	</div>

																	<!--div class="input-field col s12">
																	<label for="sub">Subject</label>
																	<input autocomplete="off" id="sub" name="sub" type="text"  required >   
																	</div-->

                                                        
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>
		<script>  
		$(document).ready(function(){  
		$('#name').change(function(){  
            var c_id = $(this).val();  
            $.ajax({  
                url:"retrievecat1.php",  
                method:"POST",  
                data:{c_id:c_id},  
                success:function(data){  
					$('#show_sub').find('option').remove();
					$('#show_sub').append(data);
                    $("#show_sub").material_select();
                }  
           });  
		});  
		});  
		</script> 
    </body>
</html>
<?php } ?> 

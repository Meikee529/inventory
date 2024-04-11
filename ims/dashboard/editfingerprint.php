<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
$pid=intval($_GET['studentid']);
if(isset($_POST['update']))
{
    
$query = $dbh->prepare("SELECT finger_template1, finger_template2, finger_template3 FROM edit_finger WHERE id =1");
$query->execute();
while($row = $query->fetch(PDO::FETCH_ASSOC)) 
{
 $fingertemplate1 = $row['finger_template1'];
 $fingertemplate2 = $row['finger_template2'];
 $fingertemplate3 = $row['finger_template3'];
}


$sql="UPDATE student SET finger_template1= '$fingertemplate1', finger_template2= '$fingertemplate2', finger_template3= '$fingertemplate3' WHERE s_id= '$pid'";
$query = $dbh->prepare($sql);
$query->execute();

$lastInsertId = $dbh->lastInsertId();
$msg="Student Fingerprint Updated Successfully";

}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Students Attendance System | Manage Student</title>
        
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



<script type = "text/javascript">
function edit()
{
$.ajax({url:"runedit.php",success:function(result) //java language run python code using php
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
$.ajax({url:"cancel.php",success:function(result) //java language
{
alert(result);
}
})
} else {
  
}
}
</script>

    </head>
    <body style="background-color:#d3d9de;">
    <?php include('includes/editfingerprintheader.php');?>
       
       <?php include('includes/adminsidebar.php');?>
    <main class="mn-inner">
                <div class="row" style="margin-left:40px">
                    <div class="col s12">
                        <div class="page-title" style= "padding-left:10px; font-size:16px">Edit Student</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="updatemp">
                                    <div>
                                        <h3 style= "padding-left:20px">Edit Student Fingerprint</h3>
                                           <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
											else if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m6">
                                                        <div class="row">
<?php 
$pid=intval($_GET['studentid']);
$sql = "SELECT * from student where s_id=:pid";
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
<label for="studentcourse">Course</label>
<input style = "color:darkgrey;" autocomplete="off" id="studentcourse" name="studentcourse" type="text" value="<?php echo htmlentities($result->s_course);?>" autocomplete="off" required readonly>   
</div>

<div class="input-field col s12">
<label for="studentname">Student Name</label>
<input style = "color:darkgrey;" autocomplete="off" id="studentname" name="studentname" type="text" value="<?php echo htmlentities($result->s_name);?>" autocomplete="off" required readonly>   
</div>

<div class="input-field col s12">			
<table id="example" class="display responsive-table ">
                    <thead>
                        <tr>

                            <th width="400">Fingerprint Template 1</th>
                            <th width="400">Fingerprint Template 2</th>
                            <th width="400">Fingerprint Template 3</th>

                        </tr>
                    </thead>
                 
                    <tbody>
                <?php $sql = "SELECT finger_template1,finger_template2,finger_template3 from student WHERE s_id = '$pid' ";
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
                            <td><?php echo htmlentities($result->finger_template1);?></td>
                            <td><?php echo htmlentities($result->finger_template2);?></td>
                            <td><?php echo htmlentities($result->finger_template3);?></td>
        
                        </tr>
                        <?php $cnt++; }}?>
                    </tbody>
                </table>
                
                  
<?php } }?>

<div class="input-field col s12">
<button type="button" class="waves-effect waves-light btn indigo m-b-xs" name="editfinger" onclick="edit();">Change Fingerprint
<i class="material-icons right">fingerprint</i>
</button>

<button type="button" style = "margin-left:40px;"class="waves-effect waves-light btn indigo m-b-xs" name="cancel" onclick="canceladd();">Cancel
<i class="material-icons right">cancel</i>
</button>
</div>


                                                        
<div class="input-field col s12">
<button type="submit" name="update"  id="update" class="waves-effect waves-light btn indigo m-b-xs">UPDATE</button>
<a href="managefingerprint.php" class="waves-effect waves-light btn indigo m-b-xs" >Back</a>
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

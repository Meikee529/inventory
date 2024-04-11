<aside id="slide-out" class="side-nav white fixed" style="width: 275px;">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile" style="background-image: url('../homepage.jpg'); background-repeat:no-repeat; background-size:276px 145px;">
                        <div class="sidebar-profile-image">
                            <img src="../2.jpg" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
                    <?php
$aid=$_SESSION['aid'];
$sql = "SELECT * from it where it_id=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
                                <p><?php echo htmlentities($result->UserName);?></p>
                                
<?php }} ?>
                        </div>
                    </div>

                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">

  <!--li class="no-padding"><a class="waves-effect waves-grey" href="dashboardtn.php"><i class="material-icons" style="font-size:21px;"><b>🏡</b></i><b>Dashboard</b></a></li>
  <li class="no-padding"><a class="waves-effect waves-grey" href="changepassword1.php"><i class="material-icons" style="font-size:21px;"><b>🔐</b></i><b>Change Password</b></a></li-->
                    <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons" style="font-size:21px;"><b>add</b></i><b>Add</b><i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
					<div class="collapsible-body">
                        <ul>
                                <li><a href="addadmin.php"><i class="material-icons" style="font-size:21px;"><b>add_circle</b></i>Add Admin</a></li>
                                <li><a href="addlecturer.php"><i class="material-icons" style="font-size:21px;"><b>add_circle_outline</b></i>Add Lecturer</a></li>
                                <li><a href="addscheduler.php"><i class="material-icons" style="font-size:21px;"><b>add_circle</b></i>Add Scheduler</a></li>
                        </ul>
                    </div>
                </li>
					
					<li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons" style="font-size:21px;"><b>build</b></i><b>Manage</b><i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="manageadmin.php"><i class="material-icons" style="font-size:21px;"><b>edit</b></i>Manage Admin</a></li>
								<li><a href="managelecturer.php"><i class="material-icons" style="font-size:21px;"><b>edit</b></i>Manage Lecturer</a></li>
								<li><a href="managescheduler.php"><i class="material-icons" style="font-size:21px;"><b>edit</b></i>Manage Scheduler</a></li>
                            </ul>
                        </div>
                    </li>
					
                  <li class="no-padding">
                                <a class="waves-effect waves-grey" href="logout.php"><i class="material-icons" style="font-size:21px; margin-left:5px;"><b>close</b></i><b><font style="margin-left:0px;">Sign Out</font></b></a>
                            </li> 


                </ul>
                <div class="footer" style="background-color:#000000; height:45px;">
                    <center><p class="copyright"><a href="https://newinti.edu.my/explore/academic-programmes/?utm_source=google_ug_brand&utm_medium=search&utm_campaign=2019c2google&kwclass=b&ds_rl=1146602&ds_rl=1152379&ds_rl=1156752&gclid=CjwKCAjw7_rlBRBaEiwAc23rhha0edHCAM3hLn0XgShGd66dmnImu7NVvsGj9aMqW-zTFQTghMThAhoCJFwQAvD_BwE"><font color="white" style="vertical-align:baseline;">@ Inti International College</font></a></p></center>
				</div>
                </div>
            </aside>


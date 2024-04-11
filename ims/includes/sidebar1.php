     <aside id="slide-out" class="side-nav white fixed" style="width: 275px;">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile" style="background-image: url('employee/3.jpg'); background-repeat:no-repeat; background-size:276px 145px;">
                        <div class="sidebar-profile-image">
                            <img src="assets/images/profile-image.png" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
                    <?php
$eid=$_SESSION['eid'];
$sql = "SELECT FirstName,LastName,EmpId from  tblemployees where id=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
                                <p><?php echo htmlentities($result->FirstName." ".$result->LastName);?></p>
                         <?php }} ?>
                        </div>
                    </div>

                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">

  <li class="no-padding"><a class="waves-effect waves-grey" href="myprofile1.php"><i class="material-icons" style="font-size:21px;"><b>👨</b></i><b>My Profiles</b></a></li>
  <li class="no-padding"><a class="waves-effect waves-grey" href="emp-changepassword1.php"><i class="material-icons" style="font-size:21px;"><b>🔐</b></i><b>Change Password</b></a></li>
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons" style="font-size:21px;"><b>📜</b></i><b>Change Request</b><i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="apply-cr.php">Apply Change Request</a></li>
                                <li><a href="crhistory.php">My Change Request History</a></li>
								<li><a href="allhis.php">All Change Requests</a></li>
                            </ul>
                        </div>
                    </li>


                  <li class="no-padding">
                                <a class="waves-effect waves-grey" href="logout.php"><i class="material-icons" style="font-size:21px; margin-left:5px;"><b>🚪</b></i><b><font style="margin-left:5px;">Sign Out</font></b></a>
                            </li> 


                </ul>
                <div class="footer" style="background-color:#000066; height:50px;">
                    <center><p class="copyright"><a href="http://www.idealvision-int.com/"><font color="white" style="vertical-align:baseline;">@ Ideal Vision Integration Sdn Bhd</font></a></p></center>
				</div>
                </div>
            </aside>

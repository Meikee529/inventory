<!DOCTYPE html>
<html lang="en">
<style>
.hello{
	width: 275px;
}
</style>	
</html>
     <aside id="slide-out" class="side-nav white fixed hello">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile" style="background-image: url('employee/3.jpg'); background-repeat:no-repeat; background-size:276px 145px;">
                        <div class="sidebar-profile-image">
                            <img src="assets/images/profile-image.png" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
                    <?php
$eid=$_SESSION['eid'];
$sql = "SELECT FirstName,LastName,EmpId from tblemployees where id=:eid";
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

				<li class="no-padding"><a class="waves-effect waves-grey" href="myprofile.php"><i class="material-icons" style="font-size:21px;"><b>👨</b></i><b>My Profiles</b></a></li>
				<li class="no-padding"><a class="waves-effect waves-grey" href="emp_changepass.php"><i class="material-icons" style="font-size:21px;"><b>🔐</b></i><b>Change Password</b></a></li>
                    
					<li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons" style="font-size:21px;"><b>😄</b></i><b>Supplier</b><i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="emanagesup.php">View Supplier</a></li>
                            </ul>
                        </div>
                    </li>
					
					<li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons" style="font-size:21px;"><b>😀</b></i><b>Customer</b><i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
								<li><a href="viewcompany.php">View Company</a></li>
                                <li><a href="ecust_table.php">View Customer</a></li>
                            </ul>
                        </div>
                    </li>
					
					<li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons" style="font-size:21px;"><b>💼</b></i><b>Project</b><i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="epro_table.php">View Project</a></li>
                            </ul>
                        </div>
                    </li>
					
					<li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons" style="font-size:21px;"><b>🔧</b></i><b>Part</b><i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="emanpart.php">View Part</a></li>
                            </ul>
                        </div>
                    </li>

					<li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons" style="font-size:21px;"><b>🎒</b></i><b>Stock</b><i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
								<li><a href="emanstockin.php">View Stock In</a></li>
								<li><a href="emanstockout.php">View Stock Out</a></li>
								<li><a href="ettotal.php">Total Quantity of Stock</a></li>
                            </ul>
                        </div>
                    </li> 
					
					<li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons" style="font-size:21px;"><b>💻</b></i><b>On Loan</b><i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="emanloan.php">View On Loan</a></li>
                            </ul>
                        </div>
                    </li> 
					
					<li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons" style="font-size:21px;"><b>📔</b></i><b>Sample</b><i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="esamtable.php">View Sample</a></li>
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

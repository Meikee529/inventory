        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <nav style="background-color:#000066;">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s3">      
                            <span class="chapter-title">CR | Employee</span>
                        </div>
                       <ul class="right col s9 m3 nav-right-menu">
                       <li class="hide-on-small-and-down"><a href="javascript:void(0)" data-activates="dropdown1" class="dropdown-button dropdown-right show-on-large"><i class="material-icons">notifications_none</i>
<?php 
$employeeid=$_SESSION['empid'];
$vreceiver=$_SESSION['vreceiver'];
$isread=0;

$sql = "SELECT tblcr.id from tblcr join tblemployees on tblcr.empid=tblemployees.EmpId where tblcr.IsRead=:isread and (tblcr.receiver=1 or tblcr.receiver='$employeeid')";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$ut=$query->rowCount();

$sql6 = "SELECT tblcr.id from tblcr join admin on tblcr.empid=admin.adminid where tblcr.IsRead=:isread and (tblcr.receiver=1 or tblcr.receiver='$employeeid')";
$query6 = $dbh -> prepare($sql6);
$query6->bindParam(':isread',$isread,PDO::PARAM_STR);
$query6->execute();
$results6=$query6->fetchAll(PDO::FETCH_OBJ);
$wc=$query6->rowCount();

$sql = "SELECT tblcr.id from tblcr join admin on tblcr.receiver=admin.adminid where tblcr.empid='$employeeid' and (tblcr.Status=2 or tblcr.Status=1) and tblcr.IsRead NOT IN (3)";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$unreadcount=$query->rowCount();

$sql = "SELECT tblcr.id from tblcr join tblemployees on tblcr.receiver=tblemployees.EmpId where tblcr.empid='$employeeid' and (tblcr.Status=2 or tblcr.Status=1) and tblcr.IsRead NOT IN (3)";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$w=$query->rowCount();

$sql5 = "SELECT tblcr.id from tblcr join tblemployees on tblcr.assignver=tblemployees.EmpId where tblcr.vStatus=1 and tblcr.admin_name IS NOT NULL and tblcr.vreceiver='$vreceiver' and tblcr.vIsRead=0";
$query5 = $dbh -> prepare($sql5);
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$uw=$query5->rowCount();

$sqla = "SELECT tblcr.id from tblcr join admin on tblcr.assignver=admin.adminid where tblcr.vStatus=1 and tblcr.admin_name IS NOT NULL and tblcr.vreceiver='$vreceiver' and tblcr.vIsRead=0";
$querya = $dbh -> prepare($sqla);
$querya->execute();
$resultsa=$querya->fetchAll(PDO::FETCH_OBJ);
$u=$querya->rowCount();

$sqql = "SELECT tblcr.id from tblcr join tblemployees on tblcr.empid=tblemployees.EmpId where tblcr.vStatus=2 and tblcr.empid='$vreceiver' and tblcr.empid=tblemployees.EmpId and tblcr.vIsRead NOT IN (3)";
$qquery = $dbh -> prepare($sqql);
$qquery->execute();
$rresults=$qquery->fetchAll(PDO::FETCH_OBJ);
$unreadcountu=$qquery->rowCount();

$ssql = "SELECT tblcr.id from tblcr join tblemployees on tblcr.receiver=tblemployees.EmpId where tblcr.vStatus=2 and tblcr.receiver='$vreceiver' and tblcr.receiver=tblemployees.EmpId and tblcr.veisread NOT IN (1)";
$quuery = $dbh -> prepare($ssql);
$quuery->execute();
$reesults=$quuery->fetchAll(PDO::FETCH_OBJ);
$unreadcount5=$quuery->rowCount();

$sqli = "SELECT tblcr.id from tblcr join tblemployees on tblcr.assignver=tblemployees.EmpId where tblcr.vStatus=2 and tblcr.assignver='$vreceiver' and tblcr.assignver NOT IN (tblcr.receiver) and tblcr.assignver=tblemployees.EmpId and tblcr.asread NOT IN (1)";
$queryi = $dbh -> prepare($sqli);
$queryi->execute();
$resultsi=$queryi->fetchAll(PDO::FETCH_OBJ);
$i=$queryi->rowCount();

?>

  <span class="badge"><?php echo htmlentities($unreadcount+$unreadcount5+$unreadcountu+$w+$uw+$u+$ut+$wc+$i);?></span></a></li>
                            <li class="hide-on-med-and-up"><a href="javascript:void(0)" class="search-toggle"><i class="material-icons">search</i></a></li>
                        </ul>
                        
                        <ul id="dropdown1" class="dropdown-content notifications-dropdown">
                            <li class="notificatoins-dropdown-container">
                                <ul>
                                    <li class="notification-drop-title">Notifications</li>
<?php 
$empid=$_SESSION['empid'];
$isread=0;
$sql = "SELECT tblcr.id as lid,tblcr.year,tblcr.crtype,tblemployees.FirstName,tblemployees.LastName,tblemployees.EmpId,tblcr.PostingDate from tblcr join tblemployees on tblcr.empid=tblemployees.EmpId where tblcr.IsRead=:isread and (tblcr.receiver=1 or tblcr.receiver='$empid')";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ); 
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
                                    <li>
                                        <a href="cr_details.php?pid=<?php echo htmlentities($result->lid);?>">
                                        <div class="notification">
                                            <div class="notification-text"><p><b><?php echo htmlentities($result->FirstName." ".$result->LastName);?> (<?php echo htmlentities($result->EmpId);?>)</b><br> applied for CR <?php echo htmlentities("(".$result->year."-".$result->lid."-".$result->crtype.")"); ?></p><span>at <?php echo htmlentities($result->PostingDate);?></span></div>
                                        </div>
                                        </a>
                                    </li>
                                   <?php }} ?>
<?php 
$empid=$_SESSION['empid'];
$isread=0;
$sql = "SELECT tblcr.id as lid,tblcr.year,tblcr.crtype,admin.firstname,admin.lastname,admin.adminid,tblcr.PostingDate from tblcr join admin on tblcr.empid=admin.adminid where tblcr.IsRead=:isread and (tblcr.receiver=1 or tblcr.receiver='$empid')";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ); 
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
                                    <li>
                                        <a href="cr_details.php?pid=<?php echo htmlentities($result->lid);?>">
                                        <div class="notification">
                                            <div class="notification-text"><p><b><?php echo htmlentities($result->firstname." ".$result->lastname);?> (<?php echo htmlentities($result->adminid);?>)</b><br> applied for CR <?php echo htmlentities("(".$result->year."-".$result->lid."-".$result->crtype.")"); ?></p><span>at <?php echo htmlentities($result->PostingDate);?></span></div>
                                        </div>
                                        </a>
                                    </li>
                                   <?php }} ?>                                   
<?php 
$employeeid=$_SESSION['empid'];
$isread=0;
$sql = "SELECT tblcr.id as lid,tblcr.year,tblcr.crtype,admin.firstname,admin.lastname,admin.adminid,tblcr.AdminRemarkDate,tblcr.Status from tblcr join admin on tblcr.receiver=admin.adminid where tblcr.empid='$employeeid' and (tblcr.Status=2 or tblcr.Status=1) and tblcr.IsRead NOT IN (3)";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ); 
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

									<li>
                                        <a href="cr_details.php?pid=<?php echo htmlentities($result->lid);?>">
                                        <div class="notification">
                                        <div class="notification-text"><p><b><?php echo htmlentities($result->firstname." ".$result->lastname);?> (<?php echo htmlentities($result->adminid);?>)</b><br><?php if($result->Status==1){ ?> have approved on change request <br/>applied <?php echo htmlentities("(".$result->year."-".$result->lid."-".$result->crtype.")"); ?><?php }else if($result->Status==2){ ?> not approved on change request <br/>applied <?php echo htmlentities("(".$result->year."-".$result->lid."-".$result->crtype.")"); ?><?php } ?></p><span>at <?php echo htmlentities($result->AdminRemarkDate);?></span></div>
                                        </div>
                                        </a>
                                    </li>
<?php }} ?>
<?php 
$employeeid=$_SESSION['empid'];
$isread=0;
$sql = "SELECT tblcr.id as lid,tblcr.crtype,tblcr.year,tblemployees.FirstName,tblemployees.LastName,tblemployees.EmpId,tblcr.AdminRemarkDate,tblcr.Status from tblcr join tblemployees on tblcr.receiver=tblemployees.EmpId where tblcr.empid='$employeeid' and (tblcr.Status=2 or tblcr.Status=1) and tblcr.IsRead NOT IN (3)";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ); 
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

									<li>
                                        <a href="cr_details.php?pid=<?php echo htmlentities($result->lid);?>">
                                        <div class="notification">
                                        <div class="notification-text"><p><b><?php echo htmlentities($result->FirstName." ".$result->LastName);?> (<?php echo htmlentities($result->EmpId);?>)</b><br><?php if($result->Status==1){ ?> have approved on change request <br/>applied <?php echo htmlentities("(".$result->year."-".$result->lid."-".$result->crtype.")"); ?><?php }else if($result->Status==2){ ?> not approved on change request <br/>applied <?php echo htmlentities("(".$result->year."-".$result->lid."-".$result->crtype.")"); ?><?php } ?></p><span>at <?php echo htmlentities($result->AdminRemarkDate);?></span></div>
                                        </div>
                                        </a>
                                    </li>
<?php }} ?>								   
<?php 
$adminid=$_SESSION['adminid'];
$vreceiver=$_SESSION['vreceiver'];

$isread=0;
$sql = "SELECT tblcr.id as lid,tblcr.year,tblcr.crtype,tblemployees.FirstName,tblemployees.LastName,tblemployees.EmpId,tblcr.PostingDate,tblcr.admin_name,tblcr.vreceiver,tblcr.assignver,tblcr.asverdate from tblcr join tblemployees on tblcr.assignver=tblemployees.EmpId where tblcr.vStatus=1 and tblcr.admin_name IS NOT NULL and tblcr.vreceiver='$vreceiver' and tblcr.vIsRead=0";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ); 
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
                                    <li>
                                        <a href="cr_details.php?pid=<?php echo htmlentities($result->lid);?>">
                                        <div class="notification">
                                        <?php $id=$result->assignver;
										$sqll= "SELECT * FROM tblemployees where EmpId='$id'";
										$queryy = $dbh -> prepare($sqll);	
										$queryy->execute();
										$resultss=$queryy->fetchAll(PDO::FETCH_OBJ); 
										if($queryy->rowCount() > 0){
											foreach($resultss as $resultt){  ?>
                                        <div class="notification-text"><p><b><?php echo htmlentities($resultt->FirstName.' '.$resultt->LastName);?> (<?php echo htmlentities($resultt->EmpId);?>)</b><br> applied for verification request <?php echo htmlentities("(".$result->year."-".$result->lid."-".$result->crtype.")"); ?></p><span>at <?php echo htmlentities($result->asverdate);?></span></div>
									<?php 	}
										} ?>
                                        </div>
                                        </a>
                                    </li>
<?php }} ?>

<?php 
$adminid=$_SESSION['adminid'];
$vreceiver=$_SESSION['vreceiver'];

$isread=0;
$sql = "SELECT tblcr.id as lid,tblcr.year,tblcr.crtype,admin.firstname,admin.lastname,admin.adminid,tblcr.PostingDate,tblcr.admin_name,tblcr.vreceiver,tblcr.assignver,tblcr.asverdate from tblcr join admin on tblcr.assignver=admin.adminid where tblcr.vStatus=1 and tblcr.admin_name IS NOT NULL and tblcr.vreceiver='$vreceiver' and tblcr.vIsRead=0";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ); 
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
                                    <li>
                                        <a href="cr_details.php?pid=<?php echo htmlentities($result->lid);?>">
                                        <div class="notification">
                                        <?php $id=$result->assignver;
										$sqll= "SELECT * FROM admin where adminid='$id'";
										$queryy = $dbh -> prepare($sqll);	
										$queryy->execute();
										$resultss=$queryy->fetchAll(PDO::FETCH_OBJ); 
										if($queryy->rowCount() > 0){
											foreach($resultss as $resultt){  ?>
                                        <div class="notification-text"><p><b><?php echo htmlentities($resultt->firstname.' '.$resultt->lastname);?> (<?php echo htmlentities($resultt->adminid);?>)</b><br> applied for verification request <?php echo htmlentities("(".$result->year."-".$result->lid."-".$result->crtype.")"); ?></p><span>at <?php echo htmlentities($result->asverdate);?></span></div>
									<?php 	}
										} ?>
                                        </div>
                                        </a>
                                    </li>
<?php }} ?>
<?php 
$vreceiver=$_SESSION['vreceiver'];
$sql = "SELECT tblcr.id as lid,tblcr.year,tblcr.crtype,tblemployees.FirstName,tblemployees.LastName,tblcr.empid,tblcr.vreceiver,tblcr.verdate from tblcr join tblemployees on tblcr.empid=tblemployees.EmpId where tblcr.vStatus=2 and tblcr.empid='$vreceiver' and tblcr.empid=tblemployees.EmpId and tblcr.vIsRead NOT IN (3)";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ); 
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
									<li>
                                        <a href="cr_details.php?pid=<?php echo htmlentities($result->lid);?>">
                                        <div class="notification">
                                        <?php $id=$result->vreceiver;
										$sqll= "SELECT * FROM admin where adminid='$id'";
										$queryy = $dbh -> prepare($sqll);	
										$queryy->execute();
										$resultss=$queryy->fetchAll(PDO::FETCH_OBJ); 
										if($queryy->rowCount() > 0){
											foreach($resultss as $resultt){  ?>
                                        <div class="notification-text"><p><b><?php echo htmlentities($resultt->firstname.' '.$resultt->lastname);?> (<?php echo htmlentities($result->vreceiver);?>)</b><br> have verified for change request <?php echo htmlentities("(".$result->year."-".$result->lid."-".$result->crtype.")"); ?></p><span>at <?php echo htmlentities($result->verdate);?></span></div>
									<?php 	}
										}else{	
										$sqlw= "SELECT * FROM tblemployees where EmpId='$id'";
										$queryw = $dbh -> prepare($sqlw);	
										$queryw->execute();
										$resultsw=$queryw->fetchAll(PDO::FETCH_OBJ); 
										if($queryw->rowCount() > 0){
											foreach($resultsw as $resultw){  ?>
                                        <div class="notification-text"><p><b><?php echo htmlentities($resultw->FirstName.' '.$resultw->LastName);?> (<?php echo htmlentities($result->vreceiver);?>)</b><br> have verified for change request <?php echo htmlentities("(".$result->year."-".$result->lid."-".$result->crtype.")"); ?></p><span>at <?php echo htmlentities($result->verdate);?></span></div>
										<?php 	} } 
									 } ?>
                                        </div>
                                        </a>
                                    </li>
                                   <?php }} ?>      
<?php 
$sql = "SELECT tblcr.id as lid,tblcr.year,tblcr.crtype,tblemployees.FirstName,tblemployees.LastName,tblcr.receiver,tblcr.vreceiver,tblcr.verdate from tblcr join tblemployees on tblcr.receiver=tblemployees.EmpId where tblcr.vStatus=2 and tblcr.receiver='$vreceiver' and tblcr.receiver=tblemployees.EmpId and tblcr.veisread NOT IN (1)";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ); 
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
                                    <li>
                                        <a href="cr_details.php?pid=<?php echo htmlentities($result->lid);?>">
                                        <div class="notification">
                                        <?php $id=$result->vreceiver;
										$sqll= "SELECT * FROM admin where adminid='$id'";
										$queryy = $dbh -> prepare($sqll);	
										$queryy->execute();
										$resultss=$queryy->fetchAll(PDO::FETCH_OBJ); 
										if($queryy->rowCount() > 0){
											foreach($resultss as $resultt){  ?>
                                        <div class="notification-text"><p><b><?php echo htmlentities($resultt->firstname.' '.$resultt->lastname);?> (<?php echo htmlentities($result->vreceiver);?>)</b><br> have verified for change request <?php echo htmlentities("(".$result->year."-".$result->lid."-".$result->crtype.")"); ?></p><span>at <?php echo htmlentities($result->verdate);?></span></div>
									<?php 	}
										}else{	
										$sqlw= "SELECT * FROM tblemployees where EmpId='$id'";
										$queryw = $dbh -> prepare($sqlw);	
										$queryw->execute();
										$resultsw=$queryw->fetchAll(PDO::FETCH_OBJ); 
										if($queryw->rowCount() > 0){
											foreach($resultsw as $resultw){  ?>
                                        <div class="notification-text"><p><b><?php echo htmlentities($resultw->FirstName.' '.$resultw->LastName);?> (<?php echo htmlentities($result->vreceiver);?>)</b><br> have verified for change request <?php echo htmlentities("(".$result->year."-".$result->lid."-".$result->crtype.")"); ?></p><span>at <?php echo htmlentities($result->verdate);?></span></div>
										<?php 	} } 
									 } ?>
                                        </div>
                                        </a>
                                    </li>
                                   <?php }} ?>  		
<?php 
$sql = "SELECT tblcr.id as lid,tblcr.year,tblcr.crtype,tblemployees.firstname,tblemployees.lastname,tblcr.vreceiver,tblcr.verdate from tblcr join tblemployees on tblcr.assignver=tblemployees.EmpId where tblcr.vStatus=2 and tblcr.assignver='$vreceiver' and tblcr.assignver NOT IN (tblcr.receiver) and tblcr.assignver=tblemployees.EmpId and tblcr.asread NOT IN (1)";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ); 
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
									<li>
                                        <a href="cr_details.php?pid=<?php echo htmlentities($result->lid);?>">
                                        <div class="notification">
                                        <?php $id=$result->vreceiver;
										$sqll= "SELECT * FROM admin where adminid='$id'";
										$queryy = $dbh -> prepare($sqll);	
										$queryy->execute();
										$resultss=$queryy->fetchAll(PDO::FETCH_OBJ); 
										if($queryy->rowCount() > 0){
											foreach($resultss as $resultt){  ?>
                                        <div class="notification-text"><p><b><?php echo htmlentities($resultt->firstname.' '.$resultt->lastname);?> (<?php echo htmlentities($result->vreceiver);?>)</b><br> have verified for change request <?php echo htmlentities("(".$result->year."-".$result->lid."-".$result->crtype.")"); ?></p><span>at <?php echo htmlentities($result->verdate);?></span></div>
									<?php 	}
										}else{	
										$sqlw= "SELECT * FROM tblemployees where EmpId='$id'";
										$queryw = $dbh -> prepare($sqlw);	
										$queryw->execute();
										$resultsw=$queryw->fetchAll(PDO::FETCH_OBJ); 
										if($queryw->rowCount() > 0){
											foreach($resultsw as $resultw){  ?>
                                        <div class="notification-text"><p><b><?php echo htmlentities($resultw->FirstName.' '.$resultw->LastName);?> (<?php echo htmlentities($result->vreceiver);?>)</b><br> have verified for change request <?php echo htmlentities("(".$result->year."-".$result->lid."-".$result->crtype.")"); ?></p><span>at <?php echo htmlentities($result->verdate);?></span></div>
										<?php 	} } 
									 } ?>
                                        </div>
                                        </a>
                                    </li>
<?php }} ?>  
</ul>
                
                    </div>
                </nav>
            </header>
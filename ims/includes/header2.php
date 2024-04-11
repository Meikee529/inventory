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
                            <span class="chapter-title">TNM | Employee</span>
                        </div>
                       <ul class="right col s9 m3 nav-right-menu">
                       <li class="hide-on-small-and-down"><!--a href="javascript:void(0)" data-activates="dropdown1" class="dropdown-button dropdown-right show-on-large"><i class="material-icons">notifications_none</i-->
<?php 
$empid=$_SESSION['empid'];
$today = date("Y-m-d");
$sql = "SELECT * from task where t_duedate >= '$today' and t_pic LIKE '%$empid%' order by t_duedate desc";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$unreadcount=$query->rowCount();
?>					   
    <span class="badge"><!--?php echo htmlentities($unreadcount);?--></span></a></li>
                            <li class="hide-on-med-and-up"><a href="javascript:void(0)" class="search-toggle"><i class="material-icons">search</i></a></li>
                        </ul>
                        
                        <ul id="dropdown1" class="dropdown-content notifications-dropdown">
                            <li class="notificatoins-dropdown-container">
                                <ul>
                                    <li class="notification-drop-title">Notifications</li>

<?php 
$sql = "SELECT * from task where t_duedate >= '$today' and t_pic LIKE '%$empid%' order by t_duedate asc";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ); 
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
	<li>
		<a href="mytaskhis.php">
			<div class="notification">
            <div class="notification-text"><p><b>Task : <?php echo htmlentities($result->t_title);?><br>Due Date : <?php echo htmlentities($result->t_duedate); ?>
			<?php $due = $result->t_duedate;
			$e = strtotime ( '-1 week' , strtotime ( $due ) ) ;  
			$e = date ( 'Y-m-d' , $e ); 
			$w = date("Y-m-d"); 
			if ($w < $due && $w >= $e) { ?>
				<i class="material-icons" style="font-size:30px;color:orange">warning</i> <?php }
			elseif ($due == $w) { ?>
				<i class="material-icons" style="font-size:30px;color:red">warning</i><?php } ?></p></b></div>
            </div>
        </a>
    </li>
 <?php }} ?>        
</ul>
                
                    </div>
                </nav>
            </header>
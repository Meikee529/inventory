<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>IT | Dashboard</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
        <link href="../assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet">
        <link href="../assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet">

        	
        <!-- Theme Styles -->
        <link href="../assets/css/alpha.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
    </head>
	
    <body style="background-color:#d3d9de;">
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
                <nav style="background-color:#000000;">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s12">      
                            <span class="chapter-title">Students Attendance System | IT</span>
                        </div>
						<ul class="right col s9 m3 nav-right-menu">
						<li class="hide-on-small-and-down"><!--a href="javascript:void(0)" data-activates="dropdown1" class="dropdown-button dropdown-right show-on-large"><i class="material-icons">notifications_none</i-->
						</ul>
                
                    </div>
                </nav>
            </header>
        
		
			<aside id="slide-out" class="side-nav white fixed" style="width: 275px;">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile" style="background-image: url('../homepage.jpg'); background-repeat:no-repeat; background-size:276px 145px;">
                        <div class="sidebar-profile-image">
                            <img src="../2.jpg" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
							<?php
								$aid=$_SESSION['aid'];
								$sql = "SELECT * from IT where it_id=:aid";
								$query = $dbh -> prepare($sql);
								$query->bindParam(':aid',$aid,PDO::PARAM_STR);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								if($query->rowCount() > 0)
								{
									foreach($results as $result)
									{?>
										<p><?php echo htmlentities($result->UserName);?></p>
                                
										<?php 
									}
								}?>
                        </div>
                    </div>

                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">

  
                <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons" style="font-size:21px;"><b>add</b></i><b>Add</b><i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
					<div class="collapsible-body">
                        <ul>
                                <li><a href="addadmin.php"><i class="material-icons" style="font-size:21px;"><b>add_circle</b></i>Add Admin</a></li>
                                <li><a href="addlecturer.php"><i class="material-icons" style="font-size:21px;"><b>add_circle</b></i>Add Lecturer</a></li>
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
                <div class="footer" style="background-color:#000000; height:70px;">
                    <center><p class="copyright"><a href="https://newinti.edu.my/explore/academic-programmes/?utm_source=google_ug_brand&utm_medium=search&utm_campaign=2019c2google&kwclass=b&ds_rl=1146602&ds_rl=1152379&d" target = "_blank" ><font color="white" style="vertical-align:baseline;">@ INTI International College</font></a></p></center>
                </div>
                </div>
            </aside>

        
        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../assets/plugins/counter-up-master/jquery.counterup.min.js"></script>
        <script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="../assets/plugins/chart.js/chart.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="../assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="../assets/plugins/peity/jquery.peity.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/dashboard2.js"></script>
        
    </body>
</html>
<?php } ?>

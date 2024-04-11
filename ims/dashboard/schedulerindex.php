<?php
session_start();
include('includes/config.php');
if(isset($_POST['signin']))
{
$uname=$_POST['username'];

$password=md5($_POST['password']);
$sql ="SELECT * FROM scheduler WHERE UserName=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach ($results as $result) {
		$_SESSION['alogin']=$result->UserName;
		$_SESSION['aid']=$result->scheduler_id;
		
	}
echo "<script type='text/javascript'> document.location = 'dashboard/schedulerdashboard.php'; </script>";
} else{
  
  echo "<script>alert('Invalid Details');</script>";

}

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Title -->
        <title>Students Attendance System</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
		<link rel = "stylesheet" href="custom.css"

        <!-- Theme Styles -->
        <link href="assets/css/alpha.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    	
    	<style type="text/css">
		.auto-style1 {
			margin-left: 400px;
		}
		body{
		background: url(homepage.jpg);
		background-repeat: no-repeat; 
		background-size: cover;
		
	}
		</style>

    	
    </head>
    <body>
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
                <nav style="background-color:#000000;;">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
						
                            <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
						
                        <div class="header-title col s5">
                            <span class="chapter-title">Students Attendance System</span>
                        </div>


                        </form>


                    </div>
                </nav>
            </header>


            <aside id="slide-out" class="side-nav white fixed" style="width:280px;">
                <div class="side-nav-wrapper" style="background-color:#F7F7F7">
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion" style="">
				
					   <li class="no-padding">                          
                            <ul>
								
                                <li class="no-padding"><a class="waves-effect waves-grey" href="adminindex.php"><i class="material-icons";">face</i><b>Admin Login</b></a></li>
								<li class="no-padding"><a class="waves-effect waves-grey" href="lectindex.php"><i class="material-icons" ;">face</i><b>Lecturer Login</b></a></li>
								<li class="no-padding"><a class="waves-effect waves-grey" href="schedulerindex.php"><i class="material-icons" ;">face</i><b>Scheduler Login</b></a></li>
								<li class="no-padding"><a class="waves-effect waves-grey" href="itindex.php"><i class="material-icons";">face</i><b>IT Login</b></a></li>
                            </ul>                    
						</li>
					   
					   <!--li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons" style="font-size:17px;"><b>ðŸ“œ</b></i><b>CR Management</b><i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li class="no-padding"><a class="waves-effect waves-grey" href="index1.php"><i class="material-icons" style="font-size:21px;"><b>ðŸ‘¨</b></i>Employee Login</a></li>
								<li class="no-padding"><a class="waves-effect waves-grey" href="forgot-password1.php"><i class="material-icons" style="font-size:21px;"><b>ðŸ”“</b></i>Emp Password Recovery</a></li>
								<li class="no-padding"><a class="waves-effect waves-grey" href="admin/index1.php"><i class="material-icons" style="font-size:21px;"><b>ðŸ‘©â€</b></i>Admin Login</a></li>
                            </ul>
                        </div>
                    </li-->
					
					<!--li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons" style="font-size:17px;"><b>ðŸš¨</b></i><b>Task Notification Management</b><i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li class="no-padding"><a class="waves-effect waves-grey" href="indextn.php"><i class="material-icons" style="font-size:21px;"><b>ðŸ‘¨</b></i>Employee Login</a></li>
								<li class="no-padding"><a class="waves-effect waves-grey" href="forgot-password2.php"><i class="material-icons" style="font-size:21px;"><b>ðŸ”“</b></i>Emp Password Recovery</a></li>
								<li class="no-padding"><a class="waves-effect waves-grey" href="admin/indextn.php"><i class="material-icons" style="font-size:21px;"><b>ðŸ‘©â€</b></i>Admin Login</a></li>
                            </ul>
                        </div>
                    </li-->
                </ul>
				<div class="footer" style="background-color:#000000; height:70px;">
                    <center><p class="copyright"><a href="https://newinti.edu.my/explore/academic-programmes/?utm_source=google_ug_brand&utm_medium=search&utm_campaign=2019c2google&kwclass=b&ds_rl=1146602&ds_rl=1152379&d" target = "_blank" ><font color="white" style="vertical-align:baseline;">@ INTI International College</font></a></p></center>
                </div>
                </div>
            </aside>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
					<center><img src="logo.png" class="center" alt="login" width="600" height="150"></center>
						<h4 align="center" style="font-weight:500"><b>Students Attendance System | Scheduler Login</b></h4>

                          <div class="col s12 m6 l8 offset-l2 offset-m3">
                              <div class="card white darken-1">

                                  <div class="card-content ">
                                      <span class="card-title" style="font-size:20px;">Login</span>
                                         <//?php if($msg){?><!--div class="errorWrap"><strong>Error</strong-->  <//?php echo htmlentities($msg); ?> <!--/div--><//?php }?>
                                       <div class="row">
                                           <form class="col s12" name="signin" method="post">
                                               <div class="input-field col s12">
                                                   <input id="username" type="text" name="username" class="validate" autocomplete="off" required >
                                                   <label for="email">Username</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input id="password" type="password" class="validate" name="password" autocomplete="off" required>
                                                   <label for="password">Password</label>
                                               </div>
                                               <div class="col s12 right-align m-t-sm">

                                                   <input type="submit" name="signin" value="Sign in" class="waves-effect waves-light btn teal">
                                               </div>
                                           </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                    </div>
                </div>
            </main>

        </div>
        <div class="left-sidebar-hover"></div>

        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>

    </body>
</html>

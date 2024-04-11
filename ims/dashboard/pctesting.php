<?php

								mysql_connect("localhost","root","") or die("Error!");
								mysql_select_db("try_pie_chart");

								?>


								<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
								<html xmlns="http://www.w3.org/1999/xhtml">
								<head>
								<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
								<title>PIE CHART</title>
								</head>

								<body>

								<form name="count" action="piechart_post.php" method="post">


											<select name="month">

								 <option value="01">January</option>
								 <option value="02">February</option>
								 <option value="03">March</option>
								 <option value="04">April</option>
								 <option value="05">May</option>
								 <option value="06">June</option>
								 <option value="07">July</option>
								 <option value="08">August</option>
								 <option value="09">September</option>
								 <option value="10">October</option>
								 <option value="11">November</option>
								 <option value="12">December</option>
								 </select>
								 <input type="text" name="year" />
								 <input type="submit" name="submit" value="Send" onclick = "<?php $month=$_POST['month'] ?><?php $year=$_POST['year'] ?>"/>

								 </form>


								</body>
								</html>
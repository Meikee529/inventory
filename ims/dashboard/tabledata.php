<?php 
session_start();
error_reporting(0);
include('includes/config.php');
$eid=$_SESSION['empid'];
$ini=$_SESSION['initial'];

if(!empty($_POST['ttask']) && !empty($_POST['ppriority'])){
	$peic;
	$rows = array();
	$task=$_POST['ttask'];
	$priority=$_POST['ppriority'];
	$today=date('Y-m-d');
	
	if($task == 1 && $priority == "All"){
		$sql = "SELECT * from task order by t_duedate desc";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
		if($query->rowCount() > 0)
		{
		foreach($results as $result)
		{ 	$peic="";
			$myArray=explode(' ',$result->t_pic);
			foreach($myArray as $split){
				$sqlc = "SELECT * from tblemployees where Emp_initial='$split'";
				$queryc = $dbh -> prepare($sqlc);
				$queryc->execute();
				$resultsc=$queryc->fetchAll(PDO::FETCH_OBJ);
				if($queryc->rowCount() > 0)
				{
					foreach($resultsc as $resultc)
					{ 
						if($peic==""){
							$peic=$resultc->FirstName." ".$resultc->LastName;
						}else{
							$peic=$peic.", ".$resultc->FirstName." ".$resultc->LastName;
						}
					}
				}
			}
			$due = $result->t_duedate;
			$e = strtotime ( '-1 week' , strtotime ( $due ) ) ;  
			$e = date ( 'Y-m-d' , $e ); 
			$w = date("Y-m-d");
			$sign;
			if ($w < $due && $w >= $e) { 
				$sign='<i class="material-icons" style="font-size:30px;color:orange">warning</i>';  }
			elseif ($due == $w) {
				$sign='<i class="material-icons" style="font-size:30px;color:red">warning</i>'; }
			elseif ($due < $w) {		
				$sign='<i class="material-icons" style="font-size:30px;color:firebrick">warning</i>'; } 
				
			if ($result->t_complete == 0){
				$complete="Incomplete";
			
			}
			elseif ($result->t_complete == 1){
				$complete="Completed";
	
			}
			elseif ($result->t_complete == -1) {
				$complete='<a href="alltask.php?aid='.$result->t_id.'" onclick="return confirm(\'Approve this task?\');"" > <i class="material-icons" title="Approve">done</i>Approve<br>
				<a href="alltask.php?bid='.$result->t_id.'" onclick="return confirm(\'Not approve this task?\');"" ><i class="material-icons" title="NotApprove">clear</i>Not approve';
			
			}
			elseif ($result->t_complete == -2) {
				$complete="Not Approved, waiting for reschedule";
			}
			
			elseif ($result->t_complete == -3){
				$complete="Cancelled";
			}
			
			elseif ($result->t_complete == -4){
				$complete='Expired and not completed';
			}
			
			$rows[] = array("0" => $cnt,"1" => $result->p_title,"2" => $result->t_title,/*"3" => $result->t_details,*/"3" => $peic,"4" => '<div class="ho">'.$result->t_duedate.'</div><div class="oh">'.
					$sign.'</div>',"5" => $complete,"6" => '<a href="edittask.php?tid='.$result->t_id.'"><i class="material-icons" title="Edit">mode_edit</i></a>
					<a href="alltask.php?id='.$result->t_id.'" onclick="return confirm(\'Are you sure want to delete? The data is irreversible once you delete it!\');""><i class="material-icons" title="Delete">delete</i>',
					"7" => '<a href="taskdetails.php?tid='.$result->t_id.'" class="waves-effect waves-light btn blue m-b-xs" >View</a>');
			$cnt++;
			
		}}
	}
	else if($task == 1){
		$sql = "SELECT * from task where t_priority = '$priority' order by t_duedate desc";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
		if($query->rowCount() > 0)
		{
		foreach($results as $result)
		{ 	$peic="";
			$myArray=explode(' ',$result->t_pic);
			foreach($myArray as $split){
				$sqlc = "SELECT * from tblemployees where Emp_initial='$split'";
				$queryc = $dbh -> prepare($sqlc);
				$queryc->execute();
				$resultsc=$queryc->fetchAll(PDO::FETCH_OBJ);
				if($queryc->rowCount() > 0)
				{
					foreach($resultsc as $resultc)
					{ 
						if($peic==""){
							$peic=$resultc->FirstName." ".$resultc->LastName;
						}else{
							$peic=$peic.", ".$resultc->FirstName." ".$resultc->LastName;
						}
					}
				}
			}
			$due = $result->t_duedate;
			$e = strtotime ( '-1 week' , strtotime ( $due ) ) ;  
			$e = date ( 'Y-m-d' , $e ); 
			$w = date("Y-m-d");
			$sign;
			if ($w < $due && $w >= $e) { 
				$sign='<i class="material-icons" style="font-size:30px;color:orange">warning</i>';  }
			elseif ($due == $w) {
				$sign='<i class="material-icons" style="font-size:30px;color:red">warning</i>'; }
			elseif ($due < $w) {		
				$sign='<i class="material-icons" style="font-size:30px;color:firebrick">warning</i>'; } 
				
			if ($result->t_complete == 0){
				$complete="Incomplete";
			
			}
			elseif ($result->t_complete == 1){
				$complete="Completed";
	
			}
			elseif ($result->t_complete == -1) {
				$complete='<a href="alltask.php?aid='.$result->t_id.'" onclick="return confirm(\'Approve this task?\');"" > <i class="material-icons" title="Approve">done</i>Approve<br>
				<a href="alltask.php?bid='.$result->t_id.'" onclick="return confirm(\'Not approve this task?\');"" ><i class="material-icons" title="NotApprove">clear</i>Not approve';
			
			}
			elseif ($result->t_complete == -2) {
				$complete="Not Approved, waiting for reschedule";
			}
			
			elseif ($result->t_complete == -3){
				$complete="Cancelled";
			}
			
			elseif ($result->t_complete == -4){
				$complete='Expired and not completed';
			}
			
			$rows[] = array("0" => $cnt,"1" => $result->p_title,"2" => $result->t_title,/*"3" => $result->t_details,*/"3" => $peic,"4" => '<div class="ho">'.$result->t_duedate.'</div><div class="oh">'.
					$sign.'</div>',"5" => $complete,"6" => '<a href="edittask.php?tid='.$result->t_id.'"><i class="material-icons" title="Edit">mode_edit</i></a>
					<a href="alltask.php?id='.$result->t_id.'" onclick="return confirm(\'Are you sure want to delete? The data is irreversible once you delete it!\');""><i class="material-icons" title="Delete">delete</i>',
					"7" => '<a href="taskdetails.php?tid='.$result->t_id.'" class="waves-effect waves-light btn blue m-b-xs" >View</a>');
			$cnt++;
			
		}}
	}
	
	else if($task == 2 && $priority == "All"){
		$sql = "SELECT * from task where t_complete = 1 order by t_duedate desc";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
		if($query->rowCount() > 0)
		{
		foreach($results as $result)
		{ 	$peic="";
			$myArray=explode(' ',$result->t_pic);
			foreach($myArray as $split){
				$sqlc = "SELECT * from tblemployees where Emp_initial='$split'";
				$queryc = $dbh -> prepare($sqlc);
				$queryc->execute();
				$resultsc=$queryc->fetchAll(PDO::FETCH_OBJ);
				if($queryc->rowCount() > 0)
				{
					foreach($resultsc as $resultc)
					{ 
						if($peic==""){
							$peic=$resultc->FirstName." ".$resultc->LastName;
						}else{
							$peic=$peic.", ".$resultc->FirstName." ".$resultc->LastName;
						}
					}
				}
			}
			$due = $result->t_duedate;
			$e = strtotime ( '-1 week' , strtotime ( $due ) ) ;  
			$e = date ( 'Y-m-d' , $e ); 
			$w = date("Y-m-d");
			$sign;
			if ($w < $due && $w >= $e) { 
				$sign='<i class="material-icons" style="font-size:30px;color:orange">warning</i>';  }
			elseif ($due == $w) {
				$sign='<i class="material-icons" style="font-size:30px;color:red">warning</i>'; }
			elseif ($due < $w) {		
				$sign='<i class="material-icons" style="font-size:30px;color:firebrick">warning</i>'; } 
				
			if ($result->t_complete == 0){
				$complete="Incomplete";
			
			}
			elseif ($result->t_complete == 1){
				$complete="Completed";
	
			}
			elseif ($result->t_complete == -1) {
				$complete='<a href="alltask.php?aid='.$result->t_id.'" onclick="return confirm(\'Approve this task?\');"" > <i class="material-icons" title="Approve">done</i>Approve<br>
				<a href="alltask.php?bid='.$result->t_id.'" onclick="return confirm(\'Not approve this task?\');"" ><i class="material-icons" title="NotApprove">clear</i>Not approve';
			
			}
			elseif ($result->t_complete == -2) {
				$complete="Not Approved, waiting for reschedule";
			}
			
			elseif ($result->t_complete == -3){
				$complete="Cancelled";
			}
			
			elseif ($result->t_complete == -4){
				$complete='Expired and not completed';
			}
			
			$rows[] = array("0" => $cnt,"1" => $result->p_title,"2" => $result->t_title,/*"3" => $result->t_details,*/"3" => $peic,"4" => '<div class="ho">'.$result->t_duedate.'</div><div class="oh">'.
					$sign.'</div>',"5" => $complete,"6" => '<a href="edittask.php?tid='.$result->t_id.'"><i class="material-icons" title="Edit">mode_edit</i></a>
					<a href="alltask.php?id='.$result->t_id.'" onclick="return confirm(\'Are you sure want to delete? The data is irreversible once you delete it!\');""><i class="material-icons" title="Delete">delete</i>',
					"7" => '<a href="taskdetails.php?tid='.$result->t_id.'" class="waves-effect waves-light btn blue m-b-xs" >View</a>');
			$cnt++;
			
		}}
	}
	else if($task == 2){
		$sql = "SELECT * from task where t_priority = '$priority' and t_complete = 1  order by t_duedate desc";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
		if($query->rowCount() > 0)
		{
		foreach($results as $result)
		{ 	$peic="";
			$myArray=explode(' ',$result->t_pic);
			foreach($myArray as $split){
				$sqlc = "SELECT * from tblemployees where Emp_initial='$split'";
				$queryc = $dbh -> prepare($sqlc);
				$queryc->execute();
				$resultsc=$queryc->fetchAll(PDO::FETCH_OBJ);
				if($queryc->rowCount() > 0)
				{
					foreach($resultsc as $resultc)
					{ 
						if($peic==""){
							$peic=$resultc->FirstName." ".$resultc->LastName;
						}else{
							$peic=$peic.", ".$resultc->FirstName." ".$resultc->LastName;
						}
					}
				}
			}
			$due = $result->t_duedate;
			$e = strtotime ( '-1 week' , strtotime ( $due ) ) ;  
			$e = date ( 'Y-m-d' , $e ); 
			$w = date("Y-m-d");
			$sign;
			if ($w < $due && $w >= $e) { 
				$sign='<i class="material-icons" style="font-size:30px;color:orange">warning</i>';  }
			elseif ($due == $w) {
				$sign='<i class="material-icons" style="font-size:30px;color:red">warning</i>'; }
			elseif ($due < $w) {		
				$sign='<i class="material-icons" style="font-size:30px;color:firebrick">warning</i>'; } 
				
			if ($result->t_complete == 0){
				$complete="Incomplete";
			
			}
			elseif ($result->t_complete == 1){
				$complete="Completed";
	
			}
			elseif ($result->t_complete == -1) {
				$complete='<a href="alltask.php?aid='.$result->t_id.'" onclick="return confirm(\'Approve this task?\');"" > <i class="material-icons" title="Approve">done</i>Approve<br>
				<a href="alltask.php?bid='.$result->t_id.'" onclick="return confirm(\'Not approve this task?\');"" ><i class="material-icons" title="NotApprove">clear</i>Not approve';
			
			}
			elseif ($result->t_complete == -2) {
				$complete="Not Approved, waiting for reschedule";
			}
			
			elseif ($result->t_complete == -3){
				$complete="Cancelled";
			}
			
			elseif ($result->t_complete == -4){
				$complete='Expired and not completed';
			}
			
			$rows[] = array("0" => $cnt,"1" => $result->p_title,"2" => $result->t_title,/*"3" => $result->t_details,*/"3" => $peic,"4" => '<div class="ho">'.$result->t_duedate.'</div><div class="oh">'.
					$sign.'</div>',"5" => $complete,"6" => '<a href="edittask.php?tid='.$result->t_id.'"><i class="material-icons" title="Edit">mode_edit</i></a>
					<a href="alltask.php?id='.$result->t_id.'" onclick="return confirm(\'Are you sure want to delete? The data is irreversible once you delete it!\');""><i class="material-icons" title="Delete">delete</i>',
					"7" => '<a href="taskdetails.php?tid='.$result->t_id.'" class="waves-effect waves-light btn blue m-b-xs" >View</a>');
			$cnt++;
			
		}}
	}
	else if($task == 3 && $priority == "All"){
		$sql = "SELECT * from task where t_complete = 0 order by t_duedate asc";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
		if($query->rowCount() > 0)
		{
		foreach($results as $result)
		{ 	$peic="";
			$myArray=explode(' ',$result->t_pic);
			foreach($myArray as $split){
				$sqlc = "SELECT * from tblemployees where Emp_initial='$split'";
				$queryc = $dbh -> prepare($sqlc);
				$queryc->execute();
				$resultsc=$queryc->fetchAll(PDO::FETCH_OBJ);
				if($queryc->rowCount() > 0)
				{
					foreach($resultsc as $resultc)
					{ 
						if($peic==""){
							$peic=$resultc->FirstName." ".$resultc->LastName;
						}else{
							$peic=$peic.", ".$resultc->FirstName." ".$resultc->LastName;
						}
					}
				}
			}
			$due = $result->t_duedate;
			$e = strtotime ( '-1 week' , strtotime ( $due ) ) ;  
			$e = date ( 'Y-m-d' , $e ); 
			$w = date("Y-m-d");
			$sign;
			if ($w < $due && $w >= $e) { 
				$sign='<i class="material-icons" style="font-size:30px;color:orange">warning</i>';  }
			elseif ($due == $w) {
				$sign='<i class="material-icons" style="font-size:30px;color:red">warning</i>'; }
			elseif ($due < $w) {		
				$sign='<i class="material-icons" style="font-size:30px;color:firebrick">warning</i>'; } 
				
			if ($result->t_complete == 0){
				$complete="Incomplete";
			
			}
			elseif ($result->t_complete == 1){
				$complete="Completed";
	
			}
			elseif ($result->t_complete == -1) {
				$complete='<a href="alltask.php?aid='.$result->t_id.'" onclick="return confirm(\'Approve this task?\');"" > <i class="material-icons" title="Approve">done</i>Approve<br>
				<a href="alltask.php?bid='.$result->t_id.'" onclick="return confirm(\'Not approve this task?\');"" ><i class="material-icons" title="NotApprove">clear</i>Not approve';
			
			}
			elseif ($result->t_complete == -2) {
				$complete="Not Approved, waiting for reschedule";
			}
			
			elseif ($result->t_complete == -3){
				$complete="Cancelled";
			}
			
			elseif ($result->t_complete == -4){
				$complete='Expired and not completed';
			}
			
			$rows[] = array("0" => $cnt,"1" => $result->p_title,"2" => $result->t_title,/*"3" => $result->t_details,*/"3" => $peic,"4" => '<div class="ho">'.$result->t_duedate.'</div><div class="oh">'.
					$sign.'</div>',"5" => $complete,"6" => '<a href="edittask.php?tid='.$result->t_id.'"><i class="material-icons" title="Edit">mode_edit</i></a>
					<a href="alltask.php?id='.$result->t_id.'" onclick="return confirm(\'Are you sure want to delete? The data is irreversible once you delete it!\');""><i class="material-icons" title="Delete">delete</i>',
					"7" => '<a href="taskdetails.php?tid='.$result->t_id.'" class="waves-effect waves-light btn blue m-b-xs" >View</a>');
			$cnt++;
			
		}}
	}
	else if($task == 3){
	$sql = "SELECT * from task where t_priority = '$priority' and  t_complete = 0 order by t_duedate asc";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query->rowCount() > 0)
	{
	foreach($results as $result)
	{ 	$peic="";
		$myArray=explode(' ',$result->t_pic);
		foreach($myArray as $split){
			$sqlc = "SELECT * from tblemployees where Emp_initial='$split'";
			$queryc = $dbh -> prepare($sqlc);
			$queryc->execute();
			$resultsc=$queryc->fetchAll(PDO::FETCH_OBJ);
				if($queryc->rowCount() > 0)
				{
					foreach($resultsc as $resultc)
					{ 
						if($peic==""){
							$peic=$resultc->FirstName." ".$resultc->LastName;
						}else{
							$peic=$peic.", ".$resultc->FirstName." ".$resultc->LastName;
						}
					}
				}
			}
		$due = $result->t_duedate;
		$e = strtotime ( '-1 week' , strtotime ( $due ) ) ;  
		$e = date ( 'Y-m-d' , $e ); 
		$w = date("Y-m-d");
		$sign;
		if ($w < $due && $w >= $e) { 
			$sign='<i class="material-icons" style="font-size:30px;color:orange">warning</i>';  }
		elseif ($due == $w) {
			$sign='<i class="material-icons" style="font-size:30px;color:red">warning</i>'; }
		elseif ($due < $w) {		
			$sign='<i class="material-icons" style="font-size:30px;color:firebrick">warning</i>'; } 
				
		if ($result->t_complete == 0){
				$complete="Incomplete";
			
			}
			elseif ($result->t_complete == 1){
				$complete="Completed";
	
			}
			elseif ($result->t_complete == -1) {
				$complete='<a href="alltask.php?aid='.$result->t_id.'" onclick="return confirm(\'Approve this task?\');"" > <i class="material-icons" title="Approve">done</i>Approve<br>
				<a href="alltask.php?bid='.$result->t_id.'" onclick="return confirm(\'Not approve this task?\');"" ><i class="material-icons" title="NotApprove">clear</i>Not approve';
			
			}
			elseif ($result->t_complete == -2) {
				$complete="Not Approved, waiting for reschedule";
			}
			
			elseif ($result->t_complete == -3){
				$complete="Cancelled";
			}
			
			elseif ($result->t_complete == -4){
				$complete='Expired and not completed';
			}
			
		$rows[] = array("0" => $cnt,"1" => $result->p_title,"2" => $result->t_title,/*"3" => $result->t_details,*/"3" => $peic,"4" => '<div class="ho">'.$result->t_duedate.'</div><div class="oh">'.
		$sign.'</div>',"5" => $complete,"6" => '<a href="edittask.php?tid='.$result->t_id.'"><i class="material-icons" title="Edit">mode_edit</i></a>
		<a href="alltask.php?id='.$result->t_id.'" onclick="return confirm(\'Are you sure want to delete? The data is irreversible once you delete it!\');""><i class="material-icons" title="Delete">delete</i>',
		"7" => '<a href="taskdetails.php?tid='.$result->t_id.'" class="waves-effect waves-light btn blue m-b-xs" >View</a>');
		$cnt++;
			
		}}
	}
	else if($task == 4 && $priority == "All"){
		$sql = "SELECT * from task where t_complete = -1 order by t_duedate desc";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
		if($query->rowCount() > 0)
		{
		foreach($results as $result)
		{ 	$peic="";
			$myArray=explode(' ',$result->t_pic);
			foreach($myArray as $split){
				$sqlc = "SELECT * from tblemployees where Emp_initial='$split'";
				$queryc = $dbh -> prepare($sqlc);
				$queryc->execute();
				$resultsc=$queryc->fetchAll(PDO::FETCH_OBJ);
				if($queryc->rowCount() > 0)
				{
					foreach($resultsc as $resultc)
					{ 
						if($peic==""){
							$peic=$resultc->FirstName." ".$resultc->LastName;
						}else{
							$peic=$peic.", ".$resultc->FirstName." ".$resultc->LastName;
						}
					}
				}
			}
			$due = $result->t_duedate;
			$e = strtotime ( '-1 week' , strtotime ( $due ) ) ;  
			$e = date ( 'Y-m-d' , $e ); 
			$w = date("Y-m-d");
			$sign;
			if ($w < $due && $w >= $e) { 
				$sign='<i class="material-icons" style="font-size:30px;color:orange">warning</i>';  }
			elseif ($due == $w) {
				$sign='<i class="material-icons" style="font-size:30px;color:red">warning</i>'; }
			elseif ($due < $w) {		
				$sign='<i class="material-icons" style="font-size:30px;color:firebrick">warning</i>'; } 
				
			if ($result->t_complete == 0){
				$complete="Incomplete";
			
			}
			elseif ($result->t_complete == 1){
				$complete="Completed";
	
			}
			elseif ($result->t_complete == -1) {
				$complete='<a href="alltask.php?aid='.$result->t_id.'" onclick="return confirm(\'Approve this task?\');"" > <i class="material-icons" title="Approve">done</i>Approve<br>
				<a href="alltask.php?bid='.$result->t_id.'" onclick="return confirm(\'Not approve this task?\');"" ><i class="material-icons" title="NotApprove">clear</i>Not approve';
			
			}
			elseif ($result->t_complete == -2) {
				$complete="Not Approved, waiting for reschedule";
			}
			
			elseif ($result->t_complete == -3){
				$complete="Cancelled";
			}
			
			elseif ($result->t_complete == -4){
				$complete='Expired and not completed';
			}
			
			$rows[] = array("0" => $cnt,"1" => $result->p_title,"2" => $result->t_title,/*"3" => $result->t_details,*/"3" => $peic,"4" => '<div class="ho">'.$result->t_duedate.'</div><div class="oh">'.
					$sign.'</div>',"5" => $complete,"6" => '<a href="edittask.php?tid='.$result->t_id.'"><i class="material-icons" title="Edit">mode_edit</i></a>
					<a href="alltask.php?id='.$result->t_id.'" onclick="return confirm(\'Are you sure want to delete? The data is irreversible once you delete it!\');""><i class="material-icons" title="Delete">delete</i>',
					"7" => '<a href="taskdetails.php?tid='.$result->t_id.'" class="waves-effect waves-light btn blue m-b-xs" >View</a>');
			$cnt++;
			
		}}
	}
	else if($task == 4){
	$sql = "SELECT * from task where t_priority = '$priority' and  t_complete = -1 order by t_duedate desc";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query->rowCount() > 0)
	{
	foreach($results as $result)
	{ 	$peic="";
		$myArray=explode(' ',$result->t_pic);
		foreach($myArray as $split){
			$sqlc = "SELECT * from tblemployees where Emp_initial='$split'";
			$queryc = $dbh -> prepare($sqlc);
			$queryc->execute();
			$resultsc=$queryc->fetchAll(PDO::FETCH_OBJ);
				if($queryc->rowCount() > 0)
				{
					foreach($resultsc as $resultc)
					{ 
						if($peic==""){
							$peic=$resultc->FirstName." ".$resultc->LastName;
						}else{
							$peic=$peic.", ".$resultc->FirstName." ".$resultc->LastName;
						}
					}
				}
			}
		$due = $result->t_duedate;
		$e = strtotime ( '-1 week' , strtotime ( $due ) ) ;  
		$e = date ( 'Y-m-d' , $e ); 
		$w = date("Y-m-d");
		$sign;
		if ($w < $due && $w >= $e) { 
			$sign='<i class="material-icons" style="font-size:30px;color:orange">warning</i>';  }
		elseif ($due == $w) {
			$sign='<i class="material-icons" style="font-size:30px;color:red">warning</i>'; }
		elseif ($due < $w) {		
			$sign='<i class="material-icons" style="font-size:30px;color:firebrick">warning</i>'; } 
				
			if ($result->t_complete == 0){
				$complete="Incomplete";
			
			}
			elseif ($result->t_complete == 1){
				$complete="Completed";
	
			}
			elseif ($result->t_complete == -1) {
				$complete='<a href="alltask.php?aid='.$result->t_id.'" onclick="return confirm(\'Approve this task?\');"" > <i class="material-icons" title="Approve">done</i>Approve<br>
				<a href="alltask.php?bid='.$result->t_id.'" onclick="return confirm(\'Not approve this task?\');"" ><i class="material-icons" title="NotApprove">clear</i>Not approve';
			
			}
			elseif ($result->t_complete == -2) {
				$complete="Not Approved, waiting for reschedule";
			}
			
			elseif ($result->t_complete == -3){
				$complete="Cancelled";
			}
			
			elseif ($result->t_complete == -4){
				$complete='Expired and not completed';
			}
			
		$rows[] = array("0" => $cnt,"1" => $result->p_title,"2" => $result->t_title,/*"3" => $result->t_details,*/"3" => $peic,"4" => '<div class="ho">'.$result->t_duedate.'</div><div class="oh">'.
		$sign.'</div>',"5" => $complete,"6" => '<a href="edittask.php?tid='.$result->t_id.'"><i class="material-icons" title="Edit">mode_edit</i></a>
		<a href="alltask.php?id='.$result->t_id.'" onclick="return confirm(\'Are you sure want to delete? The data is irreversible once you delete it!\');""><i class="material-icons" title="Delete">delete</i>',
		"7" => '<a href="taskdetails.php?tid='.$result->t_id.'" class="waves-effect waves-light btn blue m-b-xs" >View</a>');
		$cnt++;
			
		}}
	}
	else if($task == 5 && $priority == "All"){
		$sql = "SELECT * from task where t_complete = -2 order by t_duedate desc";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
		if($query->rowCount() > 0)
		{
		foreach($results as $result)
		{ 	$peic="";
			$myArray=explode(' ',$result->t_pic);
			foreach($myArray as $split){
				$sqlc = "SELECT * from tblemployees where Emp_initial='$split'";
				$queryc = $dbh -> prepare($sqlc);
				$queryc->execute();
				$resultsc=$queryc->fetchAll(PDO::FETCH_OBJ);
				if($queryc->rowCount() > 0)
				{
					foreach($resultsc as $resultc)
					{ 
						if($peic==""){
							$peic=$resultc->FirstName." ".$resultc->LastName;
						}else{
							$peic=$peic.", ".$resultc->FirstName." ".$resultc->LastName;
						}
					}
				}
			}
			$due = $result->t_duedate;
			$e = strtotime ( '-1 week' , strtotime ( $due ) ) ;  
			$e = date ( 'Y-m-d' , $e ); 
			$w = date("Y-m-d");
			$sign;
			if ($w < $due && $w >= $e) { 
				$sign='<i class="material-icons" style="font-size:30px;color:orange">warning</i>';  }
			elseif ($due == $w) {
				$sign='<i class="material-icons" style="font-size:30px;color:red">warning</i>'; }
			elseif ($due < $w) {		
				$sign='<i class="material-icons" style="font-size:30px;color:firebrick">warning</i>'; } 
				
			if ($result->t_complete == 0){
				$complete="Incomplete";
			
			}
			elseif ($result->t_complete == 1){
				$complete="Completed";
	
			}
			elseif ($result->t_complete == -1) {
				$complete='<a href="alltask.php?aid='.$result->t_id.'" onclick="return confirm(\'Approve this task?\');"" > <i class="material-icons" title="Approve">done</i>Approve<br>
				<a href="alltask.php?bid='.$result->t_id.'" onclick="return confirm(\'Not approve this task?\');"" ><i class="material-icons" title="NotApprove">clear</i>Not approve';
			
			}
			elseif ($result->t_complete == -2) {
				$complete="Not Approved, waiting for reschedule";
			}
			
			elseif ($result->t_complete == -3){
				$complete="Cancelled";
			}
			
			elseif ($result->t_complete == -4){
				$complete='Expired and not completed';
			}
			
			$rows[] = array("0" => $cnt,"1" => $result->p_title,"2" => $result->t_title,/*"3" => $result->t_details,*/"3" => $peic,"4" => '<div class="ho">'.$result->t_duedate.'</div><div class="oh">'.
					$sign.'</div>',"5" => $complete,"6" => '<a href="edittask.php?tid='.$result->t_id.'"><i class="material-icons" title="Edit">mode_edit</i></a>
					<a href="alltask.php?id='.$result->t_id.'" onclick="return confirm(\'Are you sure want to delete? The data is irreversible once you delete it!\');""><i class="material-icons" title="Delete">delete</i>',
					"7" => '<a href="taskdetails.php?tid='.$result->t_id.'" class="waves-effect waves-light btn blue m-b-xs" >View</a>');
			$cnt++;
			
		}}
	}
	else if($task == 5){
	$sql = "SELECT * from task where t_priority = '$priority' and  t_complete = -2 order by t_duedate desc";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query->rowCount() > 0)
	{
	foreach($results as $result)
	{ 	$peic="";
		$myArray=explode(' ',$result->t_pic);
		foreach($myArray as $split){
			$sqlc = "SELECT * from tblemployees where Emp_initial='$split'";
			$queryc = $dbh -> prepare($sqlc);
			$queryc->execute();
			$resultsc=$queryc->fetchAll(PDO::FETCH_OBJ);
				if($queryc->rowCount() > 0)
				{
					foreach($resultsc as $resultc)
					{ 
						if($peic==""){
							$peic=$resultc->FirstName." ".$resultc->LastName;
						}else{
							$peic=$peic.", ".$resultc->FirstName." ".$resultc->LastName;
						}
					}
				}
			}
		$due = $result->t_duedate;
		$e = strtotime ( '-1 week' , strtotime ( $due ) ) ;  
		$e = date ( 'Y-m-d' , $e ); 
		$w = date("Y-m-d");
		$sign;
		if ($w < $due && $w >= $e) { 
			$sign='<i class="material-icons" style="font-size:30px;color:orange">warning</i>';  }
		elseif ($due == $w) {
			$sign='<i class="material-icons" style="font-size:30px;color:red">warning</i>'; }
		elseif ($due < $w) {		
			$sign='<i class="material-icons" style="font-size:30px;color:firebrick">warning</i>'; } 
				
		if ($result->t_complete == 0){
				$complete="Incomplete";
			
			}
			elseif ($result->t_complete == 1){
				$complete="Completed";
	
			}
			elseif ($result->t_complete == -1) {
				$complete='<a href="alltask.php?aid='.$result->t_id.'" onclick="return confirm(\'Approve this task?\');"" > <i class="material-icons" title="Approve">done</i>Approve<br>
				<a href="alltask.php?bid='.$result->t_id.'" onclick="return confirm(\'Not approve this task?\');"" ><i class="material-icons" title="NotApprove">clear</i>Not approve';
			
			}
			elseif ($result->t_complete == -2) {
				$complete="Not Approved, waiting for reschedule";
			}
			
			elseif ($result->t_complete == -3){
				$complete="Cancelled";
			}
			
			elseif ($result->t_complete == -4){
				$complete='Expired and not completed';
			}
			
		$rows[] = array("0" => $cnt,"1" => $result->p_title,"2" => $result->t_title,/*"3" => $result->t_details,*/"3" => $peic,"4" => '<div class="ho">'.$result->t_duedate.'</div><div class="oh">'.
		$sign.'</div>',"5" => $complete,"6" => '<a href="edittask.php?tid='.$result->t_id.'"><i class="material-icons" title="Edit">mode_edit</i></a>
		<a href="alltask.php?id='.$result->t_id.'" onclick="return confirm(\'Are you sure want to delete? The data is irreversible once you delete it!\');""><i class="material-icons" title="Delete">delete</i>',
		"7" => '<a href="taskdetails.php?tid='.$result->t_id.'" class="waves-effect waves-light btn blue m-b-xs" >View</a>');
		$cnt++;
			
		}}
	}
	else if($task == 6 && $priority == "All"){
		$sql = "SELECT * from task where t_complete = -3 order by t_duedate desc";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
		if($query->rowCount() > 0)
		{
		foreach($results as $result)
		{ 	$peic="";
			$myArray=explode(' ',$result->t_pic);
			foreach($myArray as $split){
				$sqlc = "SELECT * from tblemployees where Emp_initial='$split'";
				$queryc = $dbh -> prepare($sqlc);
				$queryc->execute();
				$resultsc=$queryc->fetchAll(PDO::FETCH_OBJ);
				if($queryc->rowCount() > 0)
				{
					foreach($resultsc as $resultc)
					{ 
						if($peic==""){
							$peic=$resultc->FirstName." ".$resultc->LastName;
						}else{
							$peic=$peic.", ".$resultc->FirstName." ".$resultc->LastName;
						}
					}
				}
			}
			$due = $result->t_duedate;
			$e = strtotime ( '-1 week' , strtotime ( $due ) ) ;  
			$e = date ( 'Y-m-d' , $e ); 
			$w = date("Y-m-d");
			$sign;
			if ($w < $due && $w >= $e) { 
				$sign='<i class="material-icons" style="font-size:30px;color:orange">warning</i>';  }
			elseif ($due == $w) {
				$sign='<i class="material-icons" style="font-size:30px;color:red">warning</i>'; }
			elseif ($due < $w) {		
				$sign='<i class="material-icons" style="font-size:30px;color:firebrick">warning</i>'; } 
				
			if ($result->t_complete == 0){
				$complete="Incomplete";
			
			}
			elseif ($result->t_complete == 1){
				$complete="Completed";
	
			}
			elseif ($result->t_complete == -1) {
				$complete='<a href="alltask.php?aid='.$result->t_id.'" onclick="return confirm(\'Approve this task?\');"" > <i class="material-icons" title="Approve">done</i>Approve<br>
				<a href="alltask.php?bid='.$result->t_id.'" onclick="return confirm(\'Not approve this task?\');"" ><i class="material-icons" title="NotApprove">clear</i>Not approve';
			
			}
			elseif ($result->t_complete == -2) {
				$complete="Not Approved, waiting for reschedule";
			}
			
			elseif ($result->t_complete == -3){
				$complete="Cancelled";
			}
			
			elseif ($result->t_complete == -4){
				$complete='Expired and not completed';
			}
			
			$rows[] = array("0" => $cnt,"1" => $result->p_title,"2" => $result->t_title,/*"3" => $result->t_details,*/"3" => $peic,"4" => '<div class="ho">'.$result->t_duedate.'</div><div class="oh">'.
					$sign.'</div>',"5" => $complete,"6" => '<a href="edittask.php?tid='.$result->t_id.'"><i class="material-icons" title="Edit">mode_edit</i></a>
					<a href="alltask.php?id='.$result->t_id.'" onclick="return confirm(\'Are you sure want to delete? The data is irreversible once you delete it!\');""><i class="material-icons" title="Delete">delete</i>',
					"7" => '<a href="taskdetails.php?tid='.$result->t_id.'" class="waves-effect waves-light btn blue m-b-xs" >View</a>');
			$cnt++;
			
		}}
	}
	else if($task == 6){
	$sql = "SELECT * from task where t_priority = '$priority' and  t_complete = -3 order by t_duedate desc";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query->rowCount() > 0)
	{
	foreach($results as $result)
	{ 	$peic="";
		$myArray=explode(' ',$result->t_pic);
		foreach($myArray as $split){
			$sqlc = "SELECT * from tblemployees where Emp_initial='$split'";
			$queryc = $dbh -> prepare($sqlc);
			$queryc->execute();
			$resultsc=$queryc->fetchAll(PDO::FETCH_OBJ);
				if($queryc->rowCount() > 0)
				{
					foreach($resultsc as $resultc)
					{ 
						if($peic==""){
							$peic=$resultc->FirstName." ".$resultc->LastName;
						}else{
							$peic=$peic.", ".$resultc->FirstName." ".$resultc->LastName;
						}
					}
				}
			}
		$due = $result->t_duedate;
		$e = strtotime ( '-1 week' , strtotime ( $due ) ) ;  
		$e = date ( 'Y-m-d' , $e ); 
		$w = date("Y-m-d");
		$sign;
		if ($w < $due && $w >= $e) { 
			$sign='<i class="material-icons" style="font-size:30px;color:orange">warning</i>';  }
		elseif ($due == $w) {
			$sign='<i class="material-icons" style="font-size:30px;color:red">warning</i>'; }
		elseif ($due < $w) {		
			$sign='<i class="material-icons" style="font-size:30px;color:firebrick">warning</i>'; } 
				
		if ($result->t_complete == 0){
				$complete="Incomplete";
			
			}
			elseif ($result->t_complete == 1){
				$complete="Completed";
	
			}
			elseif ($result->t_complete == -1) {
				$complete='<a href="alltask.php?aid='.$result->t_id.'" onclick="return confirm(\'Approve this task?\');"" > <i class="material-icons" title="Approve">done</i>Approve<br>
				<a href="alltask.php?bid='.$result->t_id.'" onclick="return confirm(\'Not approve this task?\');"" ><i class="material-icons" title="NotApprove">clear</i>Not approve';
			
			}
			elseif ($result->t_complete == -2) {
				$complete="Not Approved, waiting for reschedule";
			}
			
			elseif ($result->t_complete == -3){
				$complete="Cancelled";
			}
			
			elseif ($result->t_complete == -4){
				$complete='Expired and not completed';
			}
			
		$rows[] = array("0" => $cnt,"1" => $result->p_title,"2" => $result->t_title,/*"3" => $result->t_details,*/"3" => $peic,"4" => '<div class="ho">'.$result->t_duedate.'</div><div class="oh">'.
		$sign.'</div>',"5" => $complete,"6" => '<a href="edittask.php?tid='.$result->t_id.'"><i class="material-icons" title="Edit">mode_edit</i></a>
		<a href="alltask.php?id='.$result->t_id.'" onclick="return confirm(\'Are you sure want to delete? The data is irreversible once you delete it!\');""><i class="material-icons" title="Delete">delete</i>',
		"7" => '<a href="taskdetails.php?tid='.$result->t_id.'" class="waves-effect waves-light btn blue m-b-xs" >View</a>');
		$cnt++;
			
		}}
	}
	echo json_encode($rows);
}
		?>  

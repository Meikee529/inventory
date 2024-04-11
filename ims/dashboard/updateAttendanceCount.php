<?php

$con=mysqli_connect("localhost","root","","attendance_system");

$data = array();

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to phpmyadmin: " . mysqli_connect_error();
}

$start_date = $_POST["start_date"];  /// method:'POST'
$end_date = $_POST["end_date"];
$sub_id = $_POST["sub_id"];

$countPresent = 0;
$countLate = 0;
$countAbsentLate = 0;
$countAbsent = 0;


$sql="SELECT * FROM attendance_record WHERE sub_id = '$sub_id' AND Date BETWEEN '$start_date' AND '$end_date'";
$result = mysqli_query($con,$sql);
if (mysqli_num_rows ($result) > 0){
	while($row = mysqli_fetch_array($result)){
		$status = $row['status'];

		$data['status'] = 'ok';

		if ($status == "Present"){
			$countPresent++;	
		}
		elseif ($status == "Late"){
			$countLate++;
		}
		elseif ($status == "Absent(Late)"){
			$countAbsentLate++;	
		}
		elseif ($status == "Absent"){
			$countAbsent++;
		}
	}
}

$data['presentCount'] = $countPresent;
$data['lateCount'] = $countLate;
$data['absentLateCount'] = $countAbsentLate;
$data['absentCount'] = $countAbsent;


echo json_encode($data);

?>
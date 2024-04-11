<?php
//fetch.php

$connect = mysqli_connect("localhost","root","","attendance_system");
$columns = array('id', 'Name', 'Date', 'Time', 'status');                     //use this array for sorting table columns


$query = "SELECT * FROM attendance_record WHERE ";

if($_POST["is_date_search"] == "yes")                                 //receive request from Ajax, execute if yes
{
 $query .= 'sub_id = "'.$_POST["sub_id"].'" AND Date BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';    
}

if(isset($_POST["search"]["value"]))  //the variables has been passed by the datatable plugin when we write something in the search box
{
 $query .= '
  (id LIKE "%'.$_POST["search"]["value"].'%" 
  OR Name LIKE "%'.$_POST["search"]["value"].'%" 
  OR Date LIKE "%'.$_POST["search"]["value"].'%" 
  OR Time LIKE "%'.$_POST["search"]["value"].'%" 
  OR status LIKE "%'.$_POST["search"]["value"].'%")
';
}

if(isset($_POST["order"])) //sort table column
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';  //store a query with fetched limit data

if($_POST["length"] != -1)  
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["id"];
 $sub_array[] = $row["Name"];
 $sub_array[] = $row["Date"];
 $sub_array[] = $row["Time"];
 $sub_array[] = $row["status"];
 $data[] = $sub_array;
 
}

function get_all_data($connect)
{
	$id = $_POST["sub_id"];
 $query = "SELECT * FROM attendance_record WHERE sub_id = $id";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);



echo json_encode($output);///format

?>
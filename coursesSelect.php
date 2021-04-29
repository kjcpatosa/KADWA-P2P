<?php

session_start();
$connect = mysqli_connect("localhost", "root", "", "kadwa");

$col= 0;

if(isset($_POST['college'])){
   $col = mysqli_real_escape_string($connect,$_POST['college']); 
}

$users_arr = array();	

if($col > 0)
{
	$query = "
	SELECT * FROM courses
	WHERE college_ID = '$col'
	";
	
	$result = mysqli_query($connect,$query);
	
	while($row = mysqli_fetch_array($result)){
		$id = $row['crs_ID'];
		$name = $row['crsName'];
	
		$users_arr[] = array("id" => $id, "name" => $name);
	}
}

echo json_encode($users_arr);
?>
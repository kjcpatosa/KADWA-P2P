<?php
$connect = mysqli_connect("localhost", "root", "", "kadwa");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM user_information
	WHERE email = '$search'
	";
}
else
{
	#$query = "SELECT * FROM user_information ORDER BY user_ID";
	return false;
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	echo "1";
}
else
{
	echo "0";
}
?>
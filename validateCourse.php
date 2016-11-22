<?php 
	session_start();
	include('connect.php');
	

	$sql = "SELECT * FROM `course` WHERE id ='". $_POST['courseID']."'";
	
	$result = mysql_query($sql);
	$num_rows = mysql_num_rows($result);

	echo $num_rows;
	
?>
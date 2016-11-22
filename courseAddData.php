<?php
	session_start();
	include('connect.php');

		
		$box = $_POST['boxes'];
  
		$max = sizeof($box);
		
		for($i = 0; $i < $max;$i=$i+4){
			$sql="INSERT INTO  `course` (`id` ,`title` ,`teacher` ,`year`)VALUES ('".$box[$i]."',  '".$box[$i+1]."',  '".$box[$i+2]."',  '".$box[$i+3]."');";
			$result = mysql_query($sql);
		}
		if($result){
			header("location:course.php");
		}
				
		

?>
<?php
	session_start();
	include('connect.php');

				
		$box = $_POST['boxes'];
  
		$max = sizeof($box);
		
		for($i = 0; $i < $max;$i=$i+2){
			$sql="INSERT INTO `question` (`id` ,`qa` ,`type`)VALUES (NULL ,  '".$box[$i]."',  '".$box[$i+1]."');";
			$result = mysql_query($sql);
		}
		if($result){
			header("location:qa.php");
		}
				
		


?>
<?php
	session_start();
	include('connect.php');
		
		$courseID = $_POST["coID"];
		$box = $_POST['boxes'];
		$max = sizeof($box);
		for($i = 0; $i < $max;$i = $i +2){
			$sql="INSERT INTO  `answer` (`id` ,`student_id` ,`question_id`,`course_id` ,`answer` ,`date`)
		VALUES (NULL ,'".$_SESSION['studentID']."','".$box[$i+1]."','".$courseID."',  '".$box[$i]."', NOW());";
			$result = mysql_query($sql);
		}
		if($result){
		header("location:evaluate.php");
		}
?>
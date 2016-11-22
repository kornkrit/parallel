<?php 
	session_start();
	include('connect.php');
	
	$stat = $_POST['status'];
	
	//check the connection, if it can't connect, show "Cannot connect to DB"
	if($stat=='student'){
		$sql = " SELECT * FROM student WHERE id ='". $_POST['user']."'AND password = '" . $_POST['pass']."'";
		$passportStatus = 1;
	}
	else{
		$sql = " SELECT * FROM staff WHERE id ='". $_POST['user']."'AND password = '" . $_POST['pass']."'";
		$passportStatus = 2;
	}
	$query =  mysql_query($sql);
	while($result = mysql_fetch_array($query)){
		$id = $result[0];
		$pass = $result[3];
		$name = $result[1];
		$last = $result[2];
		$year = $result[4];
		
	}
	
	if(($id == $_POST['user'] && $pass == $_POST['pass'])){
		$auth = true;
	}
	
			if($auth){
				$_SESSION['passport'] = true;
				$_SESSION['studentID'] = $id;
				$_SESSION['username'] = $_POST['user'];
				$_SESSION['passport'] = $passportStatus;
				$_SESSION['firstname'] = $name;
				$_SESSION['lastname'] = $last;
				$_SESSION['year'] = $year;
				
				
				if($_POST['status']="student")
					header("location:shome.php");
				else
					header("location:ahome.php");
			}
			else{	
				echo "<script type='text/javascript'>alert('ERROR LOGIN')</script>";
				header("location:index.php");
			}
		?>
		
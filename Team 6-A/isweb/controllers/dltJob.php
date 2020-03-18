<?php

include('../model/config.php');
   session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$jid=$_POST['jid'];

	$query="DELETE from jobs where jobid='$jid'";
	if ($conn->query($query) === TRUE) {
		   echo "<script> 
   				alert('Deleted Successfully');
   				window.location.href = '../EmployerHome.php';
   				</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
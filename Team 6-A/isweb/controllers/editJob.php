<?php

include('../model/config.php');
   session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$jname=$_POST['jname'];
	$jdesc=$_POST['jdesc'];
	$jsal=$_POST['jsal'];
	$jqual=$_POST['jqual'];
	$jnic=$_SESSION['nic'];
	// var_dump($jnic);
	// die();
	$query="insert into jobs (joname,jobdescription,jobsalary,jobqualifications,jobtypejobtypeid,employernic) values ('$jname','$jdesc','$jsal','$jqual','1','$jnic')";
	if ($db->query($query) === TRUE) {
		   echo "<script> 
   				alert('Added Successfully');
   				window.location.href = '../EmployerHome.php';
   				</script>";
	} else {
		echo "Error:<br>" . $conn->error;
	}
}
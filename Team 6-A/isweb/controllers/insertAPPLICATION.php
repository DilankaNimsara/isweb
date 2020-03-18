<?php

include('../model/config.php');
   session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$first_name=$_POST['first_name'];
	$middle_name=$_POST['middle_name'];
	$last_name=$_POST['last_name'];
	$address=$_POST['address'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$telephone=$_POST['telephone'];
	$jsnic=$_POST['nic'];
	$jsid=$_POST['jsid'];

	$query="insert into application (fname,mname,lname,address,gender,email,tp,jobseekernic,jobsjobid) values ('$first_name','$middle_name','$last_name','$address','gender','$email','$telephone','$jsnic','$jsid')";
	// var_dump($query);die;
	if ($db->query($query) === TRUE) {
		   echo "<script> 
   				alert('Applied Successfully');
   				window.location.href = '../JobseekerHome.php';
   				</script>";
	} else {
		echo "<script> 
   				alert('Check your NIC');
   				window.location.href = '../JobseekerHome.php';
   				</script>";
	}
}
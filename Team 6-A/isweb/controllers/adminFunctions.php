<?php
include('../model/config.php');
// var_dump($db);
session_start();

if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case 'addAdmin':
		addAdmin($_POST['nic'],$_POST['email'],$_POST['name'],$_POST['address'],$_POST['tp'],md5($_POST['pw']),$db);
		break;

		case 'editAdmin':
		editAdmin($_POST['nic'],$_POST['email'],$_POST['name'],$_POST['address'],$_POST['tp'],$db);
		break;

		case 'deleteAdmin':
		deleteAdmin($_POST['nic'],$conn);
		break;

		case 'deleteJobSeeker':
		deleteJobSeeker($_POST['nic'],$conn);
		break;

		case 'deleteEmployer':
		deleteEmployer($_POST['nic'],$conn);
		break;

		default:
		break;
	}
}
function addAdmin($nic,$email,$name,$address,$tp,$password,$db){

	$query="insert into admin (nic,email,name,address,tp,password) values ('$nic','$email','$name','$address','$tp','$password')";
	if ($db->query($query) === TRUE) {
		echo "<script> 
		alert('Added Successfully');

		window.location.href = '../AdminHome.php';
		</script>";
	} else {
		echo "Error: <br>" . $conn->error;
	}
}

function editAdmin($nic,$email,$name,$address,$tp,$db){
	$query="UPDATE admin set email='$email',name='$name',address='$address',tp='$tp' where nic='$nic'";
	if ($db->query($query) === TRUE) {
		echo "<script> 
		alert('Updated Successfully');
		window.location.href = '../AdminHome.php';
		</script>";
	} else {
		echo "Error: <br>" . $db->error;
	}
}

function deleteAdmin($nic,$conn){
	$query="DELETE from admin where nic='$nic'";
	if ($conn->query($query) === TRUE) {
		echo "<script> 
		alert('Deleted Successfully');
		window.location.href = '../AdminHome.php';
		</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

function deleteJobSeeker($nic,$conn){
	$query="DELETE from jobseeker where nic='$nic'";
	if ($conn->query($query) === TRUE) {
		echo "<script> 
		alert('Deleted Successfully');
		window.location.href = '../AdminHome.php';
		</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

function deleteEmployer($nic,$conn){
	$query="DELETE from employer where nic='$nic'";
	if ($conn->query($query) === TRUE) {
		echo "<script> 
		alert('Deleted Successfully');
		window.location.href = '../AdminHome.php';
		</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>
<html>
<head>

	<?php
		include("controllers/sessionAdmin.php");	
		include("header.php");
		include("footer.php");
		// include("controllers/adminFunctions.php");
		// var_dump($_SESSION);
	?>
	<title>Online Job Recruitment System</title>
	<link rel="stylesheet" type="text/css" href="pop.css">
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="tble.css">
</head>
<body background="img/10.jpg">

	<input type="button" name="addadmin" value="Add Admin" style="width:200px; margin-left:100px;" onclick="document.getElementById('modal-wrapper').style.display='block'">
	<input type="button" name="editadmin" value="Edit Admin" style="width:200px; margin-left:100px;" onclick="document.getElementById('modal-wrapper2').style.display='block'">
	<input type="button" name="dltadmin" value="Delete Admin" style="width:200px; margin-left:100px;" onclick="document.getElementById('modal-wrapper3').style.display='block'">
	<input type="button" name="dltjs" value="Delete Job Seeker" style="width:200px; margin-left:100px;" onclick="document.getElementById('modal-wrapper4').style.display='block'">
	<input type="button" name="dltemp" value="Delete Employer" style="width:200px; margin-left:100px;" onclick="document.getElementById('modal-wrapper5').style.display='block'">
	<br/><br/><br/>
	<table id="tble">
		<tr>
			<th>NIC</th>
			<th>Email</th>
			<th>Name</th>
			<th>Address</th>
			<th>Telephone</th>
		</tr>
		<?php

		echo "<h2>Current Admins<h2>";
		$sql = "SELECT * FROM admin";
		$result = $conn->query($sql);

		if (mysqli_num_rows($result) > 0) {

			while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row["nic"]."</td><td>".$row["email"]."</td><td>".$row["name"]."</td><td> ".$row["address"]."</td><td> ".$row["tp"]."</td></tr>";
			}
		} else {
			echo "0 results";
		}
		?>
	</table>

	<!-- Add admin Popup -->
	<div id="modal-wrapper" class="modal">

		<form class="modal-content animate" action="controllers/adminFunctions.php" method="post">
			<input type="hidden" name="action" value="addAdmin" />
			<div class="imgcontainer">
				<span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
				<h1 style="text-align:center">Add an admin</h1>
			</div>

			<div class="container">
				<input type="text" placeholder="Enter NIC" name="nic">
				<input type="text" placeholder="Enter Email" name="email">
				<input type="text" placeholder="Enter Name" name="name">
				<input type="text" placeholder="Enter Address" name="address">
				<input type="text" placeholder="Enter Telephone Number" name="tp">
				<input type="password" placeholder="Enter a password" name="pw">	
				       
				<button type="submit">add an Admin</button>
			</div>

		</form>

	</div>
    
    <!-- Edit admin popup -->
	<div id="modal-wrapper2" class="modal2">

		<form class="modal-content animate" action="controllers/adminFunctions.php" method="post">
			<input type="hidden" name="action" value="editAdmin" />
			<div class="imgcontainer">
				<span onclick="document.getElementById('modal-wrapper2').style.display='none'" class="close" title="Close PopUp">&times;</span>
				<h1 style="text-align:center">Edit admin details</h1>
			</div>

			<div class="container">

				<input type="text" value="<?php echo $_SESSION['login_user'] ?>" name="email"> 
				<input type="text" value="<?php echo $_SESSION['login_name'] ?>" name="name">
				<input type="text" value="<?php echo $_SESSION['login_user_tp'] ?>" name="tp">
				<input type="text" value="<?php echo $_SESSION['login_user_add'] ?>" name="address">     
				<input type="hidden" value="<?php echo $_SESSION['login_user_nic'] ?>" name="nic">
				<button type="submit">Update</button>

			</div>
		</form>
	</div>

	<!-- Delete admin popup -->
	<div id="modal-wrapper3" class="modal3">

		<form class="modal-content animate" action="controllers/adminFunctions.php" method="post">
			<input type="hidden" name="action" value="deleteAdmin" />
			<div class="imgcontainer">
				<span onclick="document.getElementById('modal-wrapper3').style.display='none'" class="close" title="Close PopUp">&times;</span>
				<h1 style="text-align:center">Delete an admin</h1>
			</div>

			<div class="container">
				<input type="text" placeholder="Enter Admin NIC" name="nic">      
				<button type="submit">Delete</button>

			</div>
		</form>
	</div>

    <!-- Delete Job Seeker popup -->
	<div id="modal-wrapper4" class="modal4">

		<form class="modal-content animate" action="controllers/adminFunctions.php" method="post">
			<input type="hidden" name="action" value="deleteJobSeeker" />
			<div class="imgcontainer">
				<span onclick="document.getElementById('modal-wrapper4').style.display='none'" class="close" title="Close PopUp">&times;</span>
				<h1 style="text-align:center">Delete a Job Seeker</h1>
			</div>

			<div class="container">
				<input type="text" placeholder="Enter Job Seeker's NIC" name="nic">      
				<button type="submit">Delete</button>

			</div>
		</form>
	</div>

    <!-- Delete Employer popup -->
	<div id="modal-wrapper5" class="modal5">

		<form class="modal-content animate" action="controllers/adminFunctions.php" method="post">
			<input type="hidden" name="action" value="deleteEmployer" />
			<div class="imgcontainer">
				<span onclick="document.getElementById('modal-wrapper5').style.display='none'" class="close" title="Close PopUp">&times;</span>
				<h1 style="text-align:center">Delete an Employer</h1>
			</div>

			<div class="container">
				<input type="text" placeholder="Enter Employer's NIC" name="nic">      
				<button type="submit">Delete</button>

			</div>
		</form>
	</div>

</body>    	

<script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
}


var modal2 = document.getElementById('modal_wrapper2');
window.onclick = function(event2) {
	if (event2.target == modal2) {
		modal2.style.display = "none";
	}
}

var modal3 = document.getElementById('modal_wrapper3');
window.onclick = function(event3) {
	if (event3.target == modal3) {
		modal3.style.display = "none";
	}
}

var modal4 = document.getElementById('modal_wrapper4');
window.onclick = function(event4) {
	if (event4.target == modal4) {
		modal4.style.display = "none";
	}
}

var modal5 = document.getElementById('modal_wrapper5');
window.onclick = function(event5) {
	if (event5.target == modal5) {
		modal5.style.display = "none";
	}
}

</script>

</html>